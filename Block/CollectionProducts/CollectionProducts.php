<?php
namespace Block\CollectionProducts;

use Zend\View\Helper\AbstractHelper;

class CollectionProducts extends AbstractHelper{
    public function __invoke(){
        require_once 'views/default.phtml';
    }
}

