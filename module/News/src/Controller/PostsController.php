<?php

namespace News\Controller;

use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;
use Zendvn\System\Info;

class PostsController extends ActionController{

    public function index(){
        var_dump('index');
        return $this->response;
    }

}