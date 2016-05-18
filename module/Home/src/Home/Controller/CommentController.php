<?php
namespace Home\Controller;

use Zend\Validator\StringLength;
use Zendvn\Controller\ActionController;

use Zend\Mvc\Controller\AbstractActionController;

class CommentController extends ActionController
{
	public function init(){
        $this->_options['tableName'] = 'Home\Model\CommentTable';
    }

    public function addAction(){
        if($this->getRequest()->isPost()){
            $arrParam = array();
            $arrParam = $this->params()->fromPost();
            $arrParam['user_id'] = isset($this->identity()->id) ? $this->identity()->id : '';
            $this->getTable()->addItem($arrParam);

            $productId = $this->params()->fromPost('product-id');

            //cập nhật số lần mua cho 1 sản phẩm
            $history = $this->getServiceLocator()->get('Home\Model\HistoryTable');
            if($history->isProductId($productId)){
                $history->deleteItem($productId);
                $history->addItem($productId,array('task' => 'comment'));
            }else{
                $history->addItem($productId,array('task' => 'comment'));
            }
                return $this->redirect()->toUrl($this->getRequest()->getHeader('Referer')->getUri());
            }
        return $this->response;
    }
}
