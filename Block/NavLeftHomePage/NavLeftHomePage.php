<?php

namespace Block\NavLeftHomePage;

use Zend\View\Helper\AbstractHelper;

class NavLeftHomePage extends AbstractHelper{
    protected $_data;
    protected $_table;
    protected $_configuration;

    public function __invoke($view){
        $imgBanner = json_decode($this->_configuration->getConfig('image_nav_left_homepage'),true);
        if($view == 'config')	
            require_once 'views/config.phtml';
        else
            require_once 'views/nav-left-home-page.phtml';
    }

    public function setData($table){
    	$this->_table = $table;
        $this->_data = $this->_table->listItem(null,array('task'=>'category-frontend'));
        return $this->_data;
    }

    public function getConfig($table){
        return $this->_configuration = $table;
    }
}