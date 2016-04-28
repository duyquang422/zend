<?php

namespace Block\Header;
use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

class Header extends AbstractHelper{
    public function __invoke(){
        $cart = new Container(SECURITY_KEY . '_cart');
        $userSession = new Container(SECURITY_KEY . '_user');
        require_once 'views/default.phtml';
    }
}