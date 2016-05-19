<?php

namespace Home\Controller;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;

class ProductController extends ActionController{
    public function init(){
        $this->_options['tableName'] = 'Home\Model\ProductsTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->params()->fromRoute()
        );
        $this->_getHelper('HeadLink',$this->getServiceLocator())
            ->appendStylesheet($this->basePath . '/public/template/frontend/css/product.css')
            ->appendStylesheet($this->basePath . '/public/template/frontend/css/product.responsive.css')
            ->appendStylesheet($this->basePath . '/public/template/frontend/css/rating.css');
        $this->_getHelper('HeadScript',$this->getServiceLocator())
            ->appendFile($this->basePath . '/public/template/frontend/js/product.js')
            ->appendFile($this->basePath . '/public/template/frontend/js/behavior.js')
            ->appendFile($this->basePath . '/public/template/frontend/js/rating.js');
    }

    public function indexAction(){
        $product = $this->getTable()->getProduct($this->_params);
        $this->getTable()->updateView($product);
        $productSession = new Container(SECURITY_KEY . '_product');
        $productSession->setExpirationSeconds(365*24*60*60);
        $productSession->offsetSet('productId',$this->_params['id']);

        //thiết lập lưu các id sản phẩm mà user đã xem vào cookie
        $arrCookie = array();
        $arrCookie = isset($_COOKIE['arrViewedId']) ? json_decode($_COOKIE['arrViewedId'],true) : '';
        if(!$arrCookie) {
            $arrCookie = array($this->_params['id']);
            setcookie('arrViewedId',json_encode(array($this->_params['id'])), time() + 60 * 60 * 24 * 365);
        }
        else{
            if(!in_array($this->_params['id'],$arrCookie))
                array_push($arrCookie,$this->_params['id']);
        }
        setcookie('arrViewedId',json_encode($arrCookie), time() + 60 * 60 * 24 * 365);
        setcookie('arrViewedId', json_encode($arrCookie), time() + 60 * 60 * 24 * 365, '/', $this->getRequest()->getUri()->getHost());


        $this->_getHelper('HeadTitle',$this->getServiceLocator())->prepend($product->name);
        return new ViewModel(array(
            'product' => $product,
            'size' => $this->getServiceLocator()->get('Admin\Model\ProductSizeProductTable')->getProductSize($this->_params['id']),
            'categoryParent' =>  $this->getServiceLocator()->get('Home\Model\CategoryTable')->getParentCategory($product->parentId)
        ));
    }

    public function loginAction(){
        $authentication = $this->getServiceLocator()->get('authentication');
        if($authentication->login($this->params()->fromPost())){
            echo json_encode(array('success' => 1));
        }else{
            echo json_encode($authentication->getError());
        }
        return $this->response;
    }

    public function getProductAction(){
        echo json_encode($this->getTable()->getProduct($this->_params));
        return $this->response;
    }

    public function quickViewAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $viewModel = new ViewModel();
            $viewModel->setTerminal(true);
            $viewModel->setVariables(array(
                'product' => $this->getTable()->getProduct($this->params()->fromPost())
            ));
            return $viewModel;
        }
        return $this->response;
    }

    public function searchAction(){
        if($this->getRequest()->isGet()){
            $products = $this->getServiceLocator()->get('Home\Model\ProductsTable');
            return new ViewModel(array(
                'products' => $products->search($this->params()->fromQuery('q'))
            ));
        }
        return $this->redirect()->toRoute('home');
    }

    public function ratingAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $history = $this->getServiceLocator()->get('Home\Model\HistoryTable');
            $productId = $this->params()->fromQuery('id');
            if($history->isProductId($productId)){
                $history->deleteItem($productId);
                $history->addItem($productId,array('task' => 'rate'));
            }else{
                $history->addItem($productId,array('task' => 'rate'));
            }
        }
        return $this->response;
    }
}