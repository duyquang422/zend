<?php
namespace Admin\Model;

use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class PermissionTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}

    public function getAll($arrParam = null, $options = null){
        return $this->tableGateway->select(function (Select $select) use ($arrParam){
            $select->where(new Expression('id > 0'));
        });
    }
}