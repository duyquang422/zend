<?php
namespace Admin\Controller;

use Admin\Form\Tags;
use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

use Zendvn\Paginator\Paginator as ZendvnPaginator;

class TagsController extends ActionController
{
	public function init(){
		$this->_options['tableName']	= 'Admin\Model\TagsTable';
	}

    public function indexAction(){
        $form = new Tags();
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function loadConfigDataTablesAction() {
        $columns = array(
            array('db' => 'id', 'dt' => 'id','field' => 'id'),
            array('db' => 'name', 'dt' => 'tname','field' => 'tname','as' => 'tname'),
            array('db' => 'alias', 'dt' => 'alias','field' => 'alias','as' => 'alias'),
            array('db' => 'hits', 'dt' => 'hits','field' => 'hits','as' => 'hits'),
            array('db' => 'description', 'dt' => 'description','field' => 'description','as' => 'description'),
            array('db' => 'create_by', 'dt' => 'create_by','field' => 'create_by','as' => 'create_by'),
            array('db' => 'status', 'dt' => 'status','field' => 'status','as' =>'status')
        );
        $this->datatables('tags', 'id', $columns);
        return $this->response;
    }
    public function getItemAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            echo json_encode($this->getTable()->getItem($this->params()->fromPost('id')));
        }
        return $this->response;
    }

    public function editAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $arrParams = $_GET;
            $arrParams['description'] = $_POST['description'];
            $this->getTable()->saveItem($arrParams,array('task' => 'edit-item'));
        }
        return $this->response;
    }

    public function statusAction()
    {
    	if($this->getRequest()->isPost())
    		echo json_encode($this->getTable()->changeStatus($this->_params['data'], array('task' => 'change-status')));
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
   
    public function addAction()
    {
    	if($this->getRequest()->isXmlHttpRequest()){
            $arrParam = array();
            $arrParam = $this->params()->fromPost();
            $arrParam['create_by'] = $this->identity()->username;
            $this->getTable()->saveItem($arrParam, array('task' => 'add-item'));
    	}
    	return $this->response;
    }
    public function deleteAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->deleteItem($this->params()->fromPost());
        }
        return $this->response;
    }
}
