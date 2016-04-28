<?php

namespace Block\HeaderNews;

use Zend\View\Helper\AbstractHelper;

class HeaderNews extends AbstractHelper
{
    public function __invoke()
    {
        require_once 'views/default.phtml';
    }
}