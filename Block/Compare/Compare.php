<?php

namespace Block\Bartop;

use Zend\View\Helper\AbstractHelper;

class Compare extends AbstractHelper{
    public function __invoke(){
        require 'views/default.phtml';
    }
}