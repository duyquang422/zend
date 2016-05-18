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

    //kiểm tra xem id của product có tồn tại trong bảng history hay chưa
    public function isProductId($productId){
        if($this->tableGateway->select(function (Select $select) use ($productId) {
            $select->where->equalTo('product_id',$productId);
        })->current())
            return true;
        else
            return false;
    }

    public function deleteItem($id){
        $this->tableGateway->delete(array('product_id' => $id));
    }

    public function addItem($productId, $option = null){
        $data = array(
            'product_id' => $productId,
            'date' => date("Y-m-d H:i:s"),
            'status' => 1
        );
        switch($option['task']){
            case 'buy':
                $data = array_merge($data,array(
                    'buy' => 1
                ));
                break;
            case 'rate':
                $data = array_merge($data,array(
                    'rate' => 1
                ));
                break;
            case 'comment':
                $data = array_merge($data,array(
                    'comment' => 1
                ));
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