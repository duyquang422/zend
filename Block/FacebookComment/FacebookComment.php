<?php

namespace Block\FacebookComment;

use Zend\View\Helper\AbstractHelper;

class FacebookComment extends AbstractHelper{
    public function __invoke($product){
        require 'views/default.phtml';
    }
}