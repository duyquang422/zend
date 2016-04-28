<?php

namespace Block\Policy;

use Zend\View\Helper\AbstractHelper;

class Policy extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}