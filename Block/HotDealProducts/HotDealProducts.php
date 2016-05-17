<?php

namespace Block\HotDealProducts;

use Zend\View\Helper\AbstractHelper;

class HotDealProducts extends AbstractHelper{
    public function __invoke($view = null){
        if($view == 'config')
            require_once 'views/config.phtml';
        else
            require_once 'views/hotdealproducts.phtml';
    }
}