<?php

namespace Block\Header;
use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;

class Header extends AbstractHelper{
    protected $_config;
    public function __invoke(){
        $cart = new Container(SECURITY_KEY . '_cart');
        $userSession = new Container(SECURITY_KEY . '_user');
        $getLogoConfig = $this->_config->getConfig('logo_image');
        require_once 'views/default.phtml';
    }

    public function getConfig($table){
        return $this->_config = $table;
    }
}