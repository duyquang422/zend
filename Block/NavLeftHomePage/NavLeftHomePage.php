<?php

namespace Block\NavLeftHomePage;

use Zend\View\Helper\AbstractHelper;

class NavLeftHomePage extends AbstractHelper{
    protected $_data;
    protected $_table;

    public function __invoke(){	
        require_once 'views/default.phtml';
    }

    public function setData($table){
    	$this->_table = $table;
        $this->_data = $this->_table->listItem(null,['task'=>'category-frontend']);
        return $this->_data;
    }
}