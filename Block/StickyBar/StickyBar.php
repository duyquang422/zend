<?php

namespace Block\StickyBar;

use Zend\View\Helper\AbstractHelper;

class StickyBar extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}