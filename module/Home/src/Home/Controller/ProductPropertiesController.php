<?php

namespace Home\Controller;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;

class ProductPropertiesController extends ActionController{

    protected  $_options;
    protected $_params;
    protected $_paginationParams = array(
        'itemCountPerPage' => 15,
        'pageRange' => 3
    );

    public function init(){
        $this->_options['tableName'] = 'Home\Model\ProductsTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->params()->fromRoute()
        );
        $this->_getHelper('HeadLink',$this->getServiceLocator())
            ->appendStylesheet($this->basePath . '/public/template/frontend/css/productproperties.css');
        $this->_getHelper('HeadScript',$this->getServiceLocator())
            ->appendFile($this->basePath . '/public/template/frontend/js/productproperties.js');
    }

    public function sanPhamBanChayAction(){
        $this->_getHelper('HeadTitle',$this->getServiceLocator())->append('Sản phẩm bán chạy');

        $category = $this->getServiceLocator()->get('Home\Model\CategoryTable');
        $countProduct = $this->getTable()->countProduct('selling-product');
        $this->_paginationParams['currentPageNumber'] = 1;

        if($this->getRequest()->isXmlHttpRequest()){
            $this->_paginationParams['currentPageNumber'] = $this->params()->fromQuery('page');
        }

        $viewModel =  new ViewModel(array(
            'category' => $category->getCategory(0),
            'products' => $this->getTable()->getProducts($this->_paginationParams,array('task' => 'selling-product')),
            'action' => 'selling-product'
        ));
        $viewModel->setTemplate('home/product-properties/san-pham-khuyen-mai');
        return $viewModel;
    }

    public function sanPhamKhuyenMaiAction(){
        $this->_getHelper('HeadTitle',$this->getServiceLocator())->append('Sản phẩm khuyến mãi');

        $category = $this->getServiceLocator()->get('Home\Model\CategoryTable');
        $countProduct = $this->getTable()->countProduct('promotional-product');
        $this->_paginationParams['currentPageNumber'] = 1;

        if($this->getRequest()->isXmlHttpRequest()){
            $this->_paginationParams['currentPageNumber'] = $this->params()->fromQuery('page');
        }
        return new ViewModel(array(
            'category' => $category->getCategory(0),
            'products' => $this->getTable()->getProducts($this->_paginationParams,array('task' => 'promotional-product')),
            'action' => 'promotional-product'
        ));
    }

    public function loadProductWithAjaxAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->_paginationParams['currentPageNumber'] = $this->params()->fromQuery('page');
            $viewModel = new ViewModel();
            $viewModel->setTerminal(true);
            if(count($this->getTable()->getProducts($this->_paginationParams,array('task' => $this->params()->fromQuery('action')))) < $this->_paginationParams['itemCountPerPage'])
                echo '<script language="javascript">stopped = true; </script>';
            $viewModel->setVariable(
                'products', $this->getTable()->getProducts($this->_paginationParams,array('task' => $this->params()->fromQuery('action')))
            );
            return $viewModel;
        }
        return $this->response;
    }
}