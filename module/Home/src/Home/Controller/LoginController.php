<?php
namespace Home\Controller;

use Zendvn\Controller\ActionController;

class LoginController extends ActionController{
    public function indexAction(){
        $basePath = $this->getRequest()->getBasePath();
        $this->_getHelper('HeadLink',$this->getServiceLocator())
            ->appendStylesheet($basePath . '/public/template/frontend/css/login.css');
    }
}