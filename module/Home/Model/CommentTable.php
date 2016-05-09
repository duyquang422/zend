<?php
namespace Home\Model;

use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class CommentTable extends AbstractTableGateway {

	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}

	public function addItem($arrParams = null){
        $data = [
            'product_id' => $arrParams['product-id'],
            'username' => isset($arrParams['objectName']) ? $arrParams['objectName'] : '',
            'content' => $arrParams['content'],
            'email' => isset($arrParams['objectEmail']) ? $arrParams['objectEmail'] : '',
            'user_id' => isset($arrParams['user_id']) ? $arrParams['user_id'] : '',
            'parent_id' => $arrParams['comment-parent'],
            'status' => 0,
            'date' => date('Y-m-d H:i:s')
        ];
        $this->tableGateway->insert($data);
    }

    public function getComments($productId){
        return $this->tableGateway->select(function (Select $select) use ($productId){
            $select->columns(array('product_id','username','user_id','parent_id','content','status','date'))
                ->join(
                    ['u' => 'user'],
                    'comment.user_id = u.id',
                    ['uusername' => 'username'],
                    $select::JOIN_LEFT
                )->join(
                    ['p' => 'products'],
                    'comment.product_id = p.id',
                    ['productName' => 'name'],
                    $select::JOIN_INNER
                )
                ->where->equalTo('comment.status',1)->equalTo('p.id',$productId);
            $select->order('comment.id DESC');
        });
    }
}