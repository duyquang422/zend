<?php

namespace Block\MenuCategories;

use Zend\View\Helper\AbstractHelper;

class MenuCategories extends AbstractHelper{

    protected $_categoryTable;

    public function __invoke($id = null,$parentId = null){
        require_once 'views/menu-categories.phtml';
    }

    public function setData($table){
        return $this->_categoryTable = $table;
    }

    //lấy tất cả các category có cùng cha
    public function getCategoriesSameParent($parentId){
        return $this->_categoryTable->getCategoriesSameParent($parentId);
    }

    public function getAllCategory(){
        return $this->_categoryTable->listItem();
    }
}