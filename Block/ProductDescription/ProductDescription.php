<?php

namespace Block\ProductDescription;

use Zend\View\Helper\AbstractHelper;

class ProductDescription extends AbstractHelper{
    protected $_data;
    protected $_table;
    public function __invoke($id){
        $this->getData($id);
        // var_dump($this->_data);
        require 'views/default.phtml';
    }
    public function setData($table){
        return $this->_table = $table;
    }
    public function getData($id){
        return $this->_data = $this->_table->getProduct(array('id' => $id));
    }
}