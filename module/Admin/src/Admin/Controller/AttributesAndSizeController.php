<?php
namespace Admin\Controller;

use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

use Zendvn\Paginator\Paginator as ZendvnPaginator;

class AttributesAndSizeController extends ActionController
{
	public function init(){
		$this->_options['tableName']	= 'Admin\Model\ProductSizeTable';
	}

    public function indexAction(){
        $slbGroup	= $this->getServiceLocator()->get('Admin\Model\GroupTable')->itemInSelectbox('',array('task' => 'form-user'));
        return new ViewModel(array('slbGroup' => $slbGroup));
    }

    public function loadSizeDataTablesAction() {
        $columns = array(
            array('db' => 'id', 'dt' => 'id','field' => 'id'),
            array('db' => 'size', 'dt' => 'size','field' => 'size'),
            array('db' => 'status', 'dt' => 'status','field' => 'status'),
        );
        $this->datatables('product_size', 'id', $columns);
        return $this->response;
    }

    public function loadAttributesDataTablesAction() {
        $columns = array(
            array('db' => 'id', 'dt' => 'id','field' => 'id'),
            array('db' => 'attributes', 'dt' => 'attributes','field' => 'attributes'),
            array('db' => 'status', 'dt' => 'status','field' => 'status'),
        );
        $this->datatables('product_attributes', 'id', $columns);
        return $this->response;
    }

    public function statusAction()
    {
    	if($this->getRequest()->isXmlHttpRequest())
    		echo json_encode($this->getTable()->changeStatus($this->params()->fromQuery(), array('task' => 'change-status')));
        return $this->response;
    }

    public function deleteSizeAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->deleteItem($this->params()->fromQuery());
            $this->getServiceLocator()->get('Admin\Model\ProductSizeProductTable')->deleteBySize($this->params()->fromQuery());
        }
        return $this->response;
    }
    public function multiStatusAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->changeStatus($this->params()->fromQuery(), array('task' => 'change-multi-status'));
        }
        return $this->response;
    }
}
