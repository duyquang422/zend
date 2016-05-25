<?php

namespace Block\NewNews;

use Zend\View\Helper\AbstractHelper;

class NewNews extends AbstractHelper
{
    protected $_postsTable;

    public function __invoke($attr)
    {
        $posts = $this->getPosts($attr);
        require 'views/new-news.phtml';
    }

    public function getPostsTable($table){
        return $this->_postsTable = $table;
    }

    public function getPosts($attr){
        return $this->_postsTable->getPosts(array('limit' => 5),$attr);
    }
}