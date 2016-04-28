<?php

namespace Block\SlideHomeTop;

use Zend\View\Helper\AbstractHelper;

class SlideHomeTop extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}