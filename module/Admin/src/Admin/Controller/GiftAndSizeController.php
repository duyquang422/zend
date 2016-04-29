<?php
namespace Admin\Controller;

use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

use Zendvn\Paginator\Paginator as ZendvnPaginator;

class GiftAndSizeController extends ActionController
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
        $this->datatables('hz_product_size', 'id', $columns);
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
}
