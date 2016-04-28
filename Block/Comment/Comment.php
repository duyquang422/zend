<?php

namespace Block\Comment;

use Zend\View\Helper\AbstractHelper;

class Comment extends AbstractHelper{

    protected $_commentTable;

    public function __invoke($productId){
        require_once 'views/default.phtml';
    }

    public function setData($table){
        return $this->_commentTable = $table;
    }

    public function getComments($productId){
        return $this->_commentTable->getComments($productId);
    }
}