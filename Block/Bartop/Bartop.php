<?php

namespace Block\Bartop;

use Zend\View\Helper\AbstractHelper;

class Bartop extends AbstractHelper{

    protected $postsCategory;

    public function __invoke(){
        require_once 'views/bartop.phtml';
    }

    public function getPostsCategory($table){
        $this->postsCategory = $table;
    }
}