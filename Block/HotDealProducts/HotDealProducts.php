<?php

namespace Block\HotDealProducts;

use Zend\View\Helper\AbstractHelper;

class HotDealProducts extends AbstractHelper{
    public function __invoke(){
        require_once 'views/hotdealproducts.phtml';
    }
}