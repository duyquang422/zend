<?php

namespace Admin\Model;

use Zend\Db\Sql\Where;
use Zendvn\File\Image;
use PHPImageWorkshop\ImageWorkshop;
use Zendvn\File\Upload;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class PostsTable extends AbstractTableGateway {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function saveImage($id, $filename){
        if($id > 0) {
            $this->tableGateway->update(array('image' => $filename), array('id' => $id));
        }
    }

    public function getImage($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('image'))->where->equalTo('id', $id);
        })->current();
        return $result;
    }

    public function getPosts($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->join(
                array('c' => 'posts_category'),
                'posts.category_id = c.id',
                array('category_name' => 'name'),
                $select::JOIN_LEFT
            )->where->equalTo('posts.id', $id);
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
        }
    }

    public function saveItem($arrParam = null, $options = null){
            $data = array(
                'name' => $arrParam['name'],
                'alias' => $arrParam['alias'],
                'category_id' => $arrParam['parent'],
                'meta_description' => $arrParam['meta_description'],
                'meta_keyword' => $arrParam['meta_keyword'],
                'description' => $arrParam['description']
            );
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
                    'image' => isset($arrParam['imageName']) ? $arrParam['imageName'] : ''
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

    public function getTag($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->join(
                array('pt' => 'post_tag'),
                'posts.id = pt.post_id',
                array('pt_id' => 'id'),
                $select::JOIN_INNER
            )->join(
                array('t' => 'tags'),
                'pt.tag_id = t.id',
                array('tag_name' => 'name'),
                $select::JOIN_INNER
            )->where->equalTo('posts.id', $id);
        })->toArray();
        return $result;
    }
}
