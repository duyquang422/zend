<?php

namespace Block\HotDealProducts;

use Zend\View\Helper\AbstractHelper;

class HotDealProducts extends AbstractHelper{

	protected $_productTable;

    public function __invoke(){
        require_once 'views/hot-deal-products.phtml';
    }

    public function getProductTable($table){
    	return $this->_productTable = $table;
    }

    public function getHotDealProduct(){
    	$arrParams['limit'] = 2;
    	return $this->_productTable->getProducts($arrParams,array('task' => 'selling-deal'));
    }
}