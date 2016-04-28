<?php

namespace Block\FilterAttr;

use Zend\View\Helper\AbstractHelper;

class FilterAttr extends AbstractHelper{

    public function __invoke($categoryId){
        require_once 'views/default.phtml';
    }
}