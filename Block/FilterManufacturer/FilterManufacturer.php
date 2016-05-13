<?php

namespace Block\FilterManufacturer;

use Zend\View\Helper\AbstractHelper;

class FilterManufacturer extends AbstractHelper{

    protected $_categoryTable;

    public function __invoke($categoryId){
        require_once 'views/default.phtml';
    }

    public function setData($table){
        return $this->_categoryTable = $table;
    }

    public function getManufacturer($categoryId){
        return $this->_categoryTable->getManufacturerByCategory($categoryId,array('task'=> 'category'));
    }
}