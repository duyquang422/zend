<?php

namespace Block\News;

use Zend\View\Helper\AbstractHelper;

class News extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}