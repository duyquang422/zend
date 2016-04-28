<?php

namespace News\Controller;

use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;
use Zendvn\System\Info;

class IndexController extends ActionController{

    public function indexAction(){
        return $this->response;
    }

}