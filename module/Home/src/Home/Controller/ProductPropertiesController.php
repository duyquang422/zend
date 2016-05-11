<?php

namespace Home\Controller;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;

class ProductPropertiesController extends ActionController{

    protected  $_options;
    protected $_params;

    public function init(){
        $this->_options['tableName'] = 'Home\Model\ProductsTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->params()->fromRoute()
        );
    }

    public function sanPhamKhuyenMaiAction(){
        $category = $this->getServiceLocator()->get('Home\Model\CategoryTable');

        return new ViewModel(array(
            'category' => $category->getCategory(0),
            'products' => $this->getTable()->getProducts('',array('task' => 'selling-product'))
        ));
    }
}