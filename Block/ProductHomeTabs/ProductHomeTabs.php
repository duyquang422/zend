<?php

namespace Block\ProductHomeTabs;

use Zend\View\Helper\AbstractHelper;

class ProductHomeTabs extends AbstractHelper{

    protected $_productsTable;

    public function __invoke(){
        require_once 'views/producthometabs.phtml';
    }

    public function setData($table){
        return $this->_productsTable = $table;
    }

    public function getDealProducts(){
        return $this->_productsTable->getProducts('',array('task' => 'deal'));
    }

}