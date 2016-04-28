<?php

namespace Block\ProductsFilter;

use Zend\View\Helper\AbstractHelper;

class ProductsFilter extends AbstractHelper{

    protected $_productsTable;

    public function __invoke(){
        require_once 'views/default.phtml';
    }

    public function setData($table){
        return $this->_productsTable = $table;
    }

    public function getDealProducts(){
        return $this->_productsTable->getProducts('',['task' => 'deal']);
    }

}