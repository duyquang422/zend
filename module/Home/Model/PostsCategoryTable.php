<?php

namespace Home\Model;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class PostsCategoryTable{
	protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function getCategories($arrParam = null, $task = null) {
        return $this->tableGateway->select(function (Select $select) use ($arrParam,$task) {
                $select->columns(array(
                    'id', 'name', 'status', 'level', 'parent', 'left', 'right','alias'
                ));
                
            if ($task == 'news-on-homepage')
                $select->where->equalTo('level', 1);
            $select->where->equalTo('status',1);
            $select->order(array('left ASC'));
        })->toArray();
    }
}