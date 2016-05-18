<?php

namespace Block\History;

use Zend\View\Helper\AbstractHelper;

class History extends AbstractHelper{

    protected $_historyTable;
    protected $_productsTable;

    public function __invoke(){
        require_once 'views/default.phtml';
    }

    public function setData($table){
        return $this->_historyTable = $table;
    }

    public function getProductTable($table){
    	return $this->_productsTable = $table;
    }
}