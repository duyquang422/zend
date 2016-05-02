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
        return $this->tableGateway->select(function (Select $select) use ($name) {
            $select->columns(array('value'))->where->equalTo('name',$name);
        })->current();
    }
    public function update($arrParam = null,$option = null){
        if($option == 'multi')
            foreach($arrParam as $key => $val){
                if($this->getConfig($key))
                    $this->tableGateway->update(array('value' => $val),array('name' => $key));
                else
                    $this->tableGateway->insert(array('value' => $val,'name' => $key));
            }
        else
            if($this->getConfig($arrParam['name']))
                $this->tableGateway->update(array('value' => $arrParam['value']), array('name' => $arrParam['name']));
            else
                $this->tableGateway->insert(array('value' => $arrParam['value'],'name' => $arrParam['name']));
    }
}
