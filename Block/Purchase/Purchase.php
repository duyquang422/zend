<?php

namespace Block\Purchase;

use Zend\View\Helper\AbstractHelper;

class Purchase extends AbstractHelper{

    public function __invoke(){
        require 'views/default.phtml';
    }
}