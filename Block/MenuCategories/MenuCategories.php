<?php

namespace Block\MenuCategories;

use Zend\View\Helper\AbstractHelper;

class MenuCategories extends AbstractHelper{

    protected $_categoryTable;

    public function __invoke($id,$parentId){
        require_once 'views/default.phtml';
    }

    public function setData($table){
        return $this->_categoryTable = $table;
    }

    public function getCategoriesSameParent($parentId){
        return $this->_categoryTable->getCategoriesSameParent($parentId);
    }
}