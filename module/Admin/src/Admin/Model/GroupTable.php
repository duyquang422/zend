<?php

namespace Admin\Model;

use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class GroupTable extends AbstractTableGateway {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    
    public function itemInSelectbox($arrParam = null, $options = null){
		if($options == null) {
			$items	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name'))
					   ->order('ordering DESC');	
			});
			$result = array();
			if(!empty($items)){
				foreach ($items as $item){
					$result[$item->id] = $item->name;
				}
			}
		}
		if($options['task'] == 'form-user') {
			$items	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name'))
				->order('ordering DESC')
				->where->equalTo('status', 1);
			});
			$result = array();
			if(!empty($items)){
				foreach ($items as $item){
					$result[$item->id] = $item->name;
				}
			}
		}
		return $result;
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
                $cid = implode(',', $arrParam['cid']);
                $where = array('id IN (' . $cid . ')');
                $this->tableGateway->update($data, $where);
                return true;
            }
        }
        return false;
    }

    public function updateName($arrParam = null, $options = null) {
        if ($arrParam['id'] > 0) {
            $data = array('name' => $arrParam['group_name']);
            $where = array('id' => $arrParam['id']);
            $this->tableGateway->update($data, $where);
            return $arrParam['group_name'];
        }
    }

    public function getGroup($id){
        return $this->tableGateway->select(function (Select $select) use ($id){
            $select->where->equalTo('id',$id);
        })->toArray();
    }

    public function saveItem($arrParam = null, $options = null){
        $data = array(
            'name' => $arrParam['name'],
            'permission_id' => json_encode($arrParam['permissionId'])
        );
        if ($options['task'] == 'edit-item') {
            $data = array_merge($data,array(
                'modified' => date('Y-m-d H:i:s'),
                'modified_by' => $arrParam['modified_by']
            ));
            $this->tableGateway->update($data, array('id' => $arrParam['id']));
        }else{
            $data = array_merge($data,array(
                'created' => date('Y-m-d H:i:s'),
                'created_by' => $arrParam['created_by'],
                'status' => 1,
            ));
            $this->tableGateway->insert($data);
        }
    }

    public function deleteItem($arrParam = null, $option = null){
        if ($arrParam['task'] == 'multi-delete') {
            if (!empty($arrParam['cid'])) {
                foreach ($arrParam['cid'] as $id) {
                    $this->tableGateway->delete(array('id' => $id));
                }
            }
        }else{
            $this->tableGateway->delete(array('id' => $arrParam['id']));
        }
    }
}
