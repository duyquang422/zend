<?php

namespace Admin\Model;

use Zend\Db\Sql\Where;
use Zendvn\File\Image;
use Zendvn\File\Upload;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class ManufacturerTable extends AbstractTableGateway {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function getManufacturer($id){
            $result = $this->tableGateway->select(function (Select $select) use ($id) {
                $select->where->equalTo('id', $id);
            })->current();
            return $result;
    }

    public function slbManufacturer($arrParam = null, $options = null){
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam) {
            $select->columns(array('id', 'name'))
                ->order('id DESC');
        });
        return $result;
    }

    public function update($arrParam = null, $options = null) {
        if($options['task'] == 'update-picture') {
            if ($arrParam['id'] > 0) {
                $data = array('picture' => $arrParam['picture']);
                $where = array('id' => $arrParam['id']);
                $this->tableGateway->update($data, $where);
            }
        }
    }

    public function savePicture($id, $filename){
        if($id > 0) {
            $this->tableGateway->update(array('picture' => $filename), array('id' => $id));
        }
    }

    public function saveItem($arrParam = null, $options = null){
            $data = array(
                'name' => $arrParam['name'],
                'alias' => $arrParam['alias'],
                'meta_description' => $arrParam['meta_description'],
                'meta_keyword' => $arrParam['meta_keyword']
            );

            if (!empty($arrParam['description'])) {
                $config = array(
                    array('HTML.AllowedElements', 'p,s,u,em,strong,span'),
                    array('HTML.AllowedAttributes', 'style'),
                );
                $filter = new \Zendvn\Filter\Purifier($config);
                $data['description'] = $filter->filter($arrParam['description']);
            }else{
                $data['description'] = '';
            }

            if ($options['task'] == 'edit-item') {
                $data = array_merge($data,array(
                    'modified_date' => date('Y-m-d H:i:s'),
                    'modified_by' => $arrParam['modified_by']
                ));
                $this->tableGateway->update($data, array('id' => $arrParam['id']));
            }else{
                $data = array_merge($data,array(
                   'created_date' => date('Y-m-d H:i:s'),
                    'created_by' => $arrParam['created_by'],
                    'status' => 1,
                    'picture' => isset($arrParam['picture']) ? $arrParam['picture'] : ''
                ));
                $this->tableGateway->insert($data);
            }
    }
    public function getPicture($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('picture'))->where->equalTo('id', $id);
        })->current();
        return $result;
    }

    public function deleteItem($arrParam = null, $option = null){
        if ($arrParam['task'] == 'multi-delete') {
            if (!empty($arrParam['cid'])) {
                foreach ($arrParam['cid'] as $id) {
                    $filename = $this->getPicture($id)->picture;
                    if($filename){
                        $imageObj = new Image();
                        $imageObj->removeImage($filename,array('task' => 'manufacturer'));
                    }
                    $this->tableGateway->delete(array('id' => $id));
                }
            }
        }else{
            $filename = $this->getPicture($arrParam['id'])->picture;
            if($filename){
                $imageObj = new Image();
                $imageObj->removeImage($filename,array('task' => 'manufacturer'));
            }
            $this->tableGateway->delete(array('id' => $arrParam['id']));
        }
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
}
