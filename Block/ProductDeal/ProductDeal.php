<?php

namespace Block\ProductDeal;

use Zend\View\Helper\AbstractHelper;

class ProductDeal extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}