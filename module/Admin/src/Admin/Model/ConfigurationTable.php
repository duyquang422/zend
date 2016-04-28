<?php

namespace Admin\Model;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class ConfigurationTable extends AbstractTableGateway
{
    protected $tableGateway;
    static $staticTableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
        self::$staticTableGateway = $tableGateway;
    }

    public function getConfig($name){
        $result = $this->tableGateway->select(function (Select $select) use ($name) {
            $select->where->equalTo('name',$name);
        })->current();
        return $result;
    }
    public function saveHostingConfig($arrParam = null,$options = null){
        if ($arrParam) {
            $where = array('name' => 'HOSTING_CONFIGURATION');
            $this->tableGateway->update(['value' => json_encode($arrParam)], $where);
        }
    }
}
