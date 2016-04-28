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
            'username' => $arrParams['objectName'],
            'content' => $arrParams['content'],
            'email' => $arrParams['objectEmail'],
            'user_id' => isset($arrParams['user_id']) ? $arrParams['user_id'] : '',
            'parent_id' => $arrParams['comment-parent'],
            'status' => 1,
            'date' => date('Y-m-d H:i:s')
        ];
        $this->tableGateway->insert($data);
    }

    public function getComments($productId){
        return $this->tableGateway->select(function (Select $select) use ($productId){
            $select->columns(array('product_id','username','user_id','parent_id','content','status','date'))
                ->join(
                    ['u' => 'user'],
                    'u.id = comment.user_id',
                    ['uusername' => 'username'],
                    $select::JOIN_LEFT
                )
                ->where(new Expression('status = 1 AND product_id = ?',$productId));
            $select->order('comment.id DESC');
        });
    }
}