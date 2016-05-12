<?php

namespace Block\HorizontalMenu;

use Zend\View\Helper\AbstractHelper;

class HorizontalMenu extends AbstractHelper{

    protected $config;

    public function __invoke(){
        require_once 'views/horizontal-menu.phtml';
    }

    public function getConfig($table){
        return $this->config = $table;
    }
}