<?php

namespace Block\Vocation;

use Zend\View\Helper\AbstractHelper;

class Vocation extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
    public function setData($table){
        $this->_data = $table->getSpecialCategories();
        return $this->_data;
    }
}