<?php
namespace News\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;

class PostsCategoryTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}

	public function getCategory($id){
        return $this->tableGateway->select(function (Select $select) use ($id){
            $select->columns(array('id','name','alias','image','parent','description','created_date','created_by'))
                ->where->equalTo('id',$id);
        })->current();
    }
}