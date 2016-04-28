<?php

namespace Admin\Model;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zendvn\File\Image;

class ProductsTable extends AbstractTableGateway {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function countProduct(){
        return $this->tableGateway->select(function (Select $select){})->count();
    }

    public function getProduct($id){
            $result = $this->tableGateway->select(function (Select $select) use ($id) {
                $select->join(
                    array('c' => 'category'),
                    'products.category_id = c.id',
                    array('category_name' => 'name'),
                    $select::JOIN_LEFT
                )->where->equalTo('products.id', $id);
            });
            return $result->toArray();
    }
    public function getProductFromOder($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->where->equalTo('id', $id);
        })->current();
        return $result;
    }
    public function saveImage($id, $filename){
        if($id > 0) {
            $this->tableGateway->update(['image' => $filename], array('id' => $id));
        }
    }

    public function getZoomImage($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('zoom_image'))->where->equalTo('id', $id);
        })->current();
        return $result;
    }

    public function getImage($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('image'))->where->equalTo('id', $id);
        })->current();
        return $result;
    }

    public function update($arrParam = null, $options = null) {
        if($options['task'] == 'update-picture') {
            if ($arrParam['id'] > 0) {
                $data = array('picture' => $arrParam['picture']);
                $where = array('id' => $arrParam['id']);
                $this->tableGateway->update($data, $where);
            }
        }else if($options['task'] == 'update-zoom-image') {
            if ($arrParam['id'] > 0) {
                $data = array('zoom_image' => $arrParam['zoom_image']);
                $where = array('id' => $arrParam['id']);
                $this->tableGateway->update($data, $where);
            }
        }
    }

    public function saveItem($arrParam = null, $options = null){
            $data = array(
                'name' => $arrParam['name'],
                'alias' => $arrParam['alias'],
                'category_id' => $arrParam['parent'],
                'code' => $arrParam['code'],
                'trademark' => $arrParam['trademark'],
                'price' => str_replace('.','',$arrParam['price']),
                'sale_off' =>  str_replace('.','',$arrParam['sale_off']),
                'percent_discount' => $arrParam['percent_discount'],
                'hits' => $arrParam['hits'],
                'deal_time' => $arrParam['deal_time'],
                'deal' => $arrParam['deal_time'] ? 1 : 0,
                'meta_description' => $arrParam['meta_description'],
                'meta_keyword' => $arrParam['meta_keyword']
            );

            $config = array(
                array('HTML.AllowedElements', 'p,s,u,em,strong,span'),
                array('HTML.AllowedAttributes', 'style'),
            );
            $filter = new \Zendvn\Filter\Purifier($config);
            $data['description'] = $filter->filter($arrParam['description']);

            if ($options['task'] == 'edit-item') {
                $data = array_merge($data,[
                    'modified' => date('Y-m-d H:i:s'),
                    'modified_by' => $arrParam['modified_by']
                ]);
                $this->tableGateway->update($data, array('id' => $arrParam['id']));
            }else{
                $data = array_merge($data,[
                   'created' => date('Y-m-d H:i:s'),
                    'created_by' => $arrParam['created_by'],
                    'status' => 1,
                    'image' => isset($arrParam['imageName']) ? $arrParam['imageName'] : ''
                ]);
                $this->tableGateway->insert($data);
            }
    }

    public function deleteItem($arrParam = null, $option = null){
        if ($arrParam['task'] == 'multi-delete') {
            if (!empty($arrParam['cid'])) {
                foreach ($arrParam['cid'] as $id) {
                    $filename = $this->getImage($id)->image;
                    if($filename){
                        $imageObj = new Image();
                        $imageObj->removeImage($filename,['task' => 'product']);
                    }
                    $this->tableGateway->delete(array('id' => $id));
                }
            }
        }else{
            $filename = $this->getImage($arrParam['id'])->image;
            if($filename){
                $imageObj = new Image();
                $imageObj->removeImage($filename,['task' => 'product']);
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

    public function changeSpecialStatus($arrParam = null){
        if ($arrParam['id'] > 0) {
            $data = array('special' => $arrParam['special']);
            $where = array('id' => $arrParam['id']);
            $this->tableGateway->update($data, $where);
            return true;
        }
        return false;
    }

    public function changeHot($arrParam = null){
        if ($arrParam['id'] > 0) {
            $data = array('hot' => $arrParam['hot']);
            $where = array('id' => $arrParam['id']);
            $this->tableGateway->update($data, $where);
            return true;
        }
        return false;
    }
}
