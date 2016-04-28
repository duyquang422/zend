<?php

namespace Block\BuySuccess;

use Zend\View\Helper\AbstractHelper;

class BuySuccess extends AbstractHelper{

    public function __invoke(){
        require 'views/default.phtml';
    }
}