<?php

namespace Block\FilterPrice;

use Zend\View\Helper\AbstractHelper;

class FilterPrice extends AbstractHelper{

    public function __invoke(){
        require_once 'views/default.phtml';
    }
}