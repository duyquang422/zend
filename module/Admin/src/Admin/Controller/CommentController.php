<?php
namespace Admin\Controller;

use Zend\Validator\StringLength;
use Zendvn\Controller\ActionController;

use Zend\Mvc\Controller\AbstractActionController;

class CommentController extends ActionController
{
	public function init(){
        $this->_options['tableName'] = 'Admin\Model\CommentTable';
    }

    public function indexAction()
    {

    }
    
    public function loadConfigDataTablesAction() {
        $joinQuery = "FROM `hz_comment` AS `c`
                    LEFT JOIN `hz_products` AS `p` ON (`c`.`product_id` = `p`.`id`)
                    LEFT JOIN `hz_user` AS `u` ON (`c`.`user_id` = `u`.`id`)";
        $columns = array(
            array('db' => 'c.id', 'dt' => 'id','field' => 'id'),
            array('db' => 'c.product_id', 'dt' => 'product_id','field' => 'product_id'),
            array('db' => 'c.username', 'dt' => 'username','field' => 'username'),
            array('db' => 'c.content', 'dt' => 'content','field' => 'content'),
            array('db' => 'c.user_id', 'dt' => 'user_id','field' => 'user_id'),
            array('db' => 'c.email', 'dt' => 'email','field' => 'email'),
            array('db' => 'c.parent_id', 'dt' => 'parent_id','field' => 'parent_id'),
            array('db' => 'c.status', 'dt' => 'status','field' => 'status'),
            array('db' => 'c.date', 'dt' => 'date','field' => 'date'),
            array('db' => 'p.name', 'dt' => 'pname','field' => 'pname', 'as' => 'pname'),
            array('db' => 'u.username', 'dt' => 'uusername','field' => 'uusername', 'as' => 'uusername')
        );
        $this->datatables('hz_comment', 'id', $columns, $joinQuery ,'c.id > 0');
        return $this->response;
    }
}
