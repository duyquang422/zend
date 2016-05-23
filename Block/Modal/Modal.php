<?php

namespace Block\Modal;

use Zend\View\Helper\AbstractHelper;

class Modal extends AbstractHelper{

    public function __invoke($id){
        require 'views/default.phtml';
    }
}