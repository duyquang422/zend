<?php

namespace Block\SlideHomeTop;

use Zend\View\Helper\AbstractHelper;

class SlideHomeTop extends AbstractHelper{

    protected $_config;

    public function __invoke($view){

        $imgSlide = json_decode($this->_config->getConfig('images_slide_hometop'),true);

        if($view == 'config')
            require_once 'views/config.phtml';
        else
            require_once 'views/default.phtml';
    }

    public function getConfig($table){
        return $this->_config = $table;
    }
}