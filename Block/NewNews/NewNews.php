<?php

namespace Block\NewNews;

use Zend\View\Helper\AbstractHelper;

class NewNews extends AbstractHelper
{
    public function __invoke()
    {
        require_once 'views/default.phtml';
    }
}