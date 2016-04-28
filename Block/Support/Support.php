<?php

namespace Block\Support;

use Zend\View\Helper\AbstractHelper;

class Support extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}