<?php

namespace Block\Bartop;

use Zend\View\Helper\AbstractHelper;

class Bartop extends AbstractHelper{

    protected $_postsCategory;

    public function __invoke(){
        require_once 'views/bartop.phtml';
    }

    public function getPostsCategory($table){
        return $this->_postsCategory = $table;
    }

    public function getListPostCategory(){
    	return $this->_postsCategory->getCategories('','news-on-homepage');
    }
}