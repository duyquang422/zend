<?php

namespace News\Controller;

use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;
use Zendvn\System\Info;

class PostsCategoryController extends ActionController{

	public function init(){
		$this->_options['tableName']	= 'News\Model\PostsCategoryTable';
	}

    public function indexAction(){
       	return new ViewModel(array(
       		'category' => $this->getTable()->getCategory($this->params()->fromRoute('id'))
       	));
    }

}