<?php

namespace Block\ProductsByCategory;

use Zend\View\Helper\AbstractHelper;

class ProductsByCategory extends AbstractHelper{
    protected $_data;
    protected $_table;
    public function __invoke($id){
        $this->getData($id);
        require 'views/default.phtml';
    }
    public function setData($table){
        return $this->_table = $table;
    }
    public function getData($id){
        $arrData = array();
        $arrData['category'] = $this->_table->getChildCategory($id);
        $arrData['productInCategory'] = $this->_table->getProductByCategory($id,array('task' => 'home'));
        $arrData['manufacturer'] = $this->_table->getManufacturerByCategory($id,['task' => 'index']);
        return $this->_data = $arrData;
    }
}