<?php

namespace Admin\Controller;

use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zendvn\Paginator\Paginator as ZendvnPaginator;

class HomeController extends ActionController {
    public function indexAction(){
        $this->_getHelper('HeadLink',$this->getServiceLocator())
            ->appendStylesheet($this->basePath . '/public/template/backend/css/home.css');
    }
}