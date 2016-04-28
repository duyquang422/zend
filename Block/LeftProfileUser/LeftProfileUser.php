<?php

namespace Block\LeftProfileUser;

use Zend\View\Helper\AbstractHelper;

class LeftProfileUser extends AbstractHelper{
    protected $_data;
    protected $_table;

    public function __invoke($active){	
        require_once 'views/default.phtml';
    }
}