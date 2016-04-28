<?php

namespace Block\NominationProducts;

use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

class NominationProducts extends AbstractHelper{
    protected $_data;
    protected $_productTable;
    protected $_categoryTable;
    public function __invoke($option){
        /*$productSession = new Container(SECURITY_KEY . '_product');
        $product = $surveyProduct = $productByCategory = '';
        if($productSession->offsetExists('productId') && $productSession->offsetGet('productId')){
            $product = $this->getProduct($productSession->offsetGet('productId'));
            $surveyProduct = $this->getProductsFromSurveyUser($product->category_id);
            $productSameCategory = $this->getProductSameCategory($product->category_id);
        }*/
        $this->getProductsDefault($option);
        require 'views/default.phtml';
    }
    public function setData($table){
        return $this->_productTable = $table;
    }
    public function getProductsDefault($option){
        return $this->_data = $this->_productTable->getProducts('',['task' => $option]);
    }

    public function getProductsFromSurveyUser($categoryId){
        return $this->_productTable->getProductsFromSurveyUser($categoryId);
    }

    public function getProduct($productId){
        return $this->_productTable->getProduct(['id'=> $productId]);
    }

    public function category($table){
        return $this->_categoryTable = $table;
    }

    public function getProductSameCategory($categoryId){
        $category = $this->_categoryTable->getCategory($categoryId);
        $parentCategory = $this->_categoryTable->getParentCategory($category->parent);
        return $this->_categoryTable->getProductByCategory($parentCategory->id);
    }
}