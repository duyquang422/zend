<?php
namespace Admin\Controller;

use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

use Zendvn\Paginator\Paginator as ZendvnPaginator;

class UserController extends ActionController
{
	public function init(){
		$this->_options['tableName']	= 'Admin\Model\UserTable';
	}

    public function indexAction(){
        $slbGroup	= $this->getServiceLocator()->get('Admin\Model\GroupTable')->itemInSelectbox('',array('task' => 'form-user'));
        return new ViewModel(array('slbGroup' => $slbGroup));
    }
    
    public function loadConfigDataTablesAction() {
        $joinQuery = "FROM `user` AS `u` LEFT JOIN `group` AS `ug` ON (`ug`.`id` = `u`.`group_id`)";
        $columns = array(
            array('db' => 'u.id', 'dt' => 'id','field' => 'id'),
            array('db' => 'u.username', 'dt' => 'username','field' => 'username'),
            array('db' => 'u.email', 'dt' => 'email','field' => 'email'),
            array('db' => 'u.last_sign', 'dt' => 'last_sign','field' => 'last_sign'),
            array('db' => 'u.created', 'dt' => 'created','field' => 'created'),
            array('db' => 'u.modified_by', 'dt' => 'modified_by','field' => 'modified_by'),
            array('db' => 'u.register_ip', 'dt' => 'register_ip','field' => 'register_ip'),
            array('db' => 'u.status', 'dt' => 'status','field' => 'status'),
            array('db' => 'ug.name', 'dt' => 'name','field' => 'name')
        );
        $this->datatables('user', 'id', $columns ,$joinQuery);
        return $this->response;
    }
    
    public function statusAction()
    {
    	if($this->getRequest()->isXmlHttpRequest())
            echo json_encode($this->getTable()->changeStatus($this->params()->fromQuery(), array('task' => 'change-status')));
        return $this->response;
    }
    
    public function multiStatusAction()
    {
    	$message	= 'Vui lòng chọn vào phần tử mà bạn muốn thay đổi trạng thái!';
    	if($this->getRequest()->isPost()){
    		$flagAction = $this->getTable()->changeStatus($this->_params['data'], array('task' => 'change-multi-status'));
    		if($flagAction == true) $message	= 'Trạng thái của phần tử đã được cập nhật thành công!';
    	}
    	$this->flashMessenger()->addMessage($message);
    	$this->goAction();
    }
   
    public function updateGroupAction()
    {
    	if($this->getRequest()->isPost()){
            $this->getTable()->saveItem($this->params()->fromPost(), array('task' => 'edit-item'));
    	}
    	return $this->response;
    }
}
