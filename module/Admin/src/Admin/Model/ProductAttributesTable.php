<?php

namespace Admin\Model;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class ProductAttributesTable extends AbstractTableGateway {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function search($arrParam = null, $option = null){
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam,$option) {
            $select->columns(array('id','attributes'));
            if($option['task'] == 'search') {
                $select->where->like('attributes', '%' . $arrParam['value'] . '%')->and->equalTo('status', 1);
            }elseif($option['task'] == 'check-exits'){
                $select->where->like('attributes',$arrParam['value']);
            }
        });
        return $result->toArray();
    }

    public function saveData($arrParam = null, $option = null)
    {
        $data = [
            'attributes' => $arrParam['value'],
            'status' => 1
        ];
        $this->tableGateway->insert($data);
        return $this->tableGateway->getLastInsertValue('id');
    }

    public function deleteItem($arrParam = null, $option = null){
        if ($arrParam['task'] == 'multi-delete')
            if (!empty($arrParam['cid']))
                foreach ($arrParam['cid'] as $id)
                    $this->tableGateway->delete(array('id' => $id));
        else
            $this->tableGateway->delete(array('id' => $arrParam['id']));
    }

    public function changeStatus($arrParam = null, $options = null) {
        if ($options['task'] == 'change-status') {
            if ($arrParam['id'] > 0) {
                $data = array('status' => $arrParam['status']);
                $where = array('id' => $arrParam['id']);
                $this->tableGateway->update($data, $where);
                return true;
            }
        }

        if ($options['task'] == 'change-multi-status') {
            if (!empty($arrParam['cid'])) {
                $data = array('status' => $arrParam['status']);
                var_dump($arrParam['cid']);
                $cid = implode(',', $arrParam['cid']);
                $where = array('id IN (' . $cid . ')');
                var_dump($where);
                $this->tableGateway->update($data, $where);
                return true;
            }
        }
        return false;
    }
}
