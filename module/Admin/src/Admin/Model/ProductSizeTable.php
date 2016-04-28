<?php

namespace Admin\Model;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class ProductSizeTable extends NestedTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function search($arrParam = null, $option = null){
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam,$option) {
            $select->columns(array('id','size'));
            if($option['task'] == 'search') {
                $select->where->like('size', '%' . $arrParam['value'] . '%')->and->equalTo('status', 1);
            }elseif($option['task'] == 'check-exits'){
                $select->where->like('size',$arrParam['value']);
            }
        });
        return $result->toArray();
    }

    public function saveData($arrParam = null, $option = null)
    {
        $data = [
            'size' => $arrParam['value'],
            'status' => 1
        ];
        $this->tableGateway->insert($data);
        return $this->tableGateway->getLastInsertValue('id');
    }
}
