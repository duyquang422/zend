<?php

namespace Block\Bartop;

use Zend\View\Helper\AbstractHelper;

class Bartop extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}