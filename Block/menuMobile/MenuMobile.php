<?php

namespace Block\MenuMobile;

use Zend\View\Helper\AbstractHelper;

class MenuMobile extends AbstractHelper
{
    protected $_categoryTable;
    public function __invoke()
    {
        require_once 'views/menu-mobile.phtml';
    }

    public function getCategoryTable($table){
        return $this->_categoryTable = $table;
    }
}