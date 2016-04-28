<?php

namespace Block\AddToCart;

use Zend\View\Helper\AbstractHelper;

class AddToCart extends AbstractHelper{
	protected $_data;

    public function __invoke($productId){
        $product = $this->getProduct($productId);
        $productsByCategory = $this->getProductsByCategory($product->categoryId);
        require_once 'views/default.phtml';
    }

    public function setData($table){
        return $this->_table = $table;
    }
    
    public function getData($option){
        return $this->_data = $this->_table->getProducts('',['task' => $option]);
    }

    public function getProduct($productId){
        return $this->_data = $this->_table->getProduct(['id' => $productId]);
    }

    public function getProductsByCategory($categoryId){
        return $this->_data = $this->_table->getProductsByCategory(['id' => $categoryId, 'limit' => 10],['task' => 'category']);
    }
}