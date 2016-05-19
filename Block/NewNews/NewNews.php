<?php

namespace Block\NewNews;

use Zend\View\Helper\AbstractHelper;

class NewNews extends AbstractHelper
{
    protected $_postsTable;

    public function __invoke()
    {
        require_once 'views/new-news.phtml';
    }

    public function getPostsTable($table){
        return $this->_postsTable = $table;
    }

    public function getNewPosts(){
        return $this->_postsTable->getPosts(array('limit' => 5),'new-posts');
    }
}