<?php

namespace Block\FilterRate;

use Zend\View\Helper\AbstractHelper;

class FilterRate extends AbstractHelper{

    public function __invoke(){
        require_once 'views/default.phtml';
    }
}