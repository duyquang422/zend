<?php

namespace Block\MenuNews;

use Zend\View\Helper\AbstractHelper;

class MenuNews extends AbstractHelper
{
    public function __invoke()
    {
        require_once 'views/default.phtml';
    }
}