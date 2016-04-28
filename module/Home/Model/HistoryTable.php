<?php
namespace Home\Model;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class HistoryTable extends AbstractTableGateway
{

	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

    //lấy số lần mua 1 sản phẩm trong ngày hiện tại
    public function getBought($productId){
        return $this->tableGateway->select(function (Select $select) use ($productId) {
            $select->where->equalTo('product_id',$productId)
                    ->and->greaterThan('buy',0);
            $select->where('DATE(date) = CURDATE()');
        })->toArray();
    }

	public function updateBought($productId){
            $this->tableGateway->update(['buy' => $this->getBought($productId)[0]['buy'] + 1 ], ['product_id' => $productId]);
	}

    public function addItem($productId, $option = null){
        $data = [
            'product_id' => $productId,
            'date' => date("Y-m-d H:i:s"),
            'status' => 1
        ];
        switch($option['task']){
            case 'buy':
                $data = array_merge($data,[
                    'buy' => 1
                ]);
                break;
            case 'rate':
                $data = array_merge($data,[
                    'rate' => 1
                ]);
                break;
            case 'comment':
                $data = array_merge($data,[
                    'comment' => 1
                ]);
                break;
        }
        $this->tableGateway->insert($data);
    }

    public function getHistorys(){
        return $this->tableGateway->select(function (Select $select){
            $select->join(
                array('p'=> 'products'),
                'history.product_id = p.id',
                array(
                    'productName'   =>'name',
                    'productImage'  => 'image',
                    'productAlias'  => 'alias'
                ),
                $select::JOIN_LEFT
            )->where->equalTo('history.status','1');
            $select->order('id DESC');
        });
    }
}