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

    public function indexAction(){
        var_dump($this->_params);
        return $this->response;
    }

    public function sanPhamKhuyenMaiAction(){
        return $this->response;
    }
}