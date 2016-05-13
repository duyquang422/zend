<?php

namespace Admin\Model;

use Zend\Db\Sql\Where;
use Zendvn\File\Image;
use Zendvn\File\Upload;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class CategoryTable extends NestedTable {

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

    public function itemInSelectbox($arrParam = null, $options = null) {
        if ($options['task'] == 'list-level') {
            $items = $this->tableGateway->select(function (Select $select) use ($arrParam) {
                        $select->columns(array('id', 'level'))
                                ->order('level DESC')
                                ->limit(1);
                        ;
                    })->current();
            $result = array();
            if (!empty($items)) {
                for ($i = 1; $i <= $items->level; $i++)
                    $result[$i] = 'Level ' . $i;
            }
        }

        if ($options['task'] == 'form-category') {
            $items = $this->tableGateway->select(function (Select $select) use ($arrParam) {
                $select->columns(array('id', 'name', 'level'))
                        ->order('left ASC')
                ;
            });

            $result = array();
            if (!empty($items)) {
                foreach ($items as $item) {
                    $result[$item->id] = str_repeat('------|', $item->level) . ' ' . $item->name;
                }
            }
        }
        return $result;
    }

    public function countItem($arrParam = null, $options = null) {
        if ($options['task'] == 'list-item') {

            $result = $this->tableGateway->select(function (Select $select) use ($arrParam) {
                        $ssFilter = $arrParam['ssFilter'];

                        if (!empty($ssFilter['filter_status'])) {
                            $status = ($ssFilter['filter_status'] == 'active') ? 1 : 0;
                            $select->where->equalTo('category.status', $status);
                        }

                        if (!empty($ssFilter['filter_level'])) {
                            $select->where->lessThanOrEqualTo('category.level', $ssFilter['filter_level']);
                        }

                        if (!empty($ssFilter['filter_keyword_type']) && !empty($ssFilter['filter_keyword_value'])) {
                            if ($ssFilter['filter_keyword_type'] != 'all') {
                                $select->where->like('category.' . $ssFilter['filter_keyword_type'], '%' . $ssFilter['filter_keyword_value'] . '%');
                            } else {
                                $select->where->NEST
                                                ->like('name', '%' . $ssFilter['filter_keyword_value'] . '%')
                                                ->or
                                                ->equalTo('category.id', $ssFilter['filter_keyword_value'])
                                        ->UNNEST;
                            }
                        }
                    })->count();
        }
        return $result;
    }

    public function listItem($arrParam = null, $options = null) {
        return $this->tableGateway->select(function (Select $select) use ($arrParam,$options) {
                $select->columns(array('id', 'name', 'status', 'level', 'parent', 'left', 'right'))
						->join(
							array('c' => 'category'),
							'category.parent = c.id',
							array('pleft' => 'left', 'pright' => 'right'),
							$select::JOIN_LEFT		
						);
                    $select->where->greaterThan('category.level', 0);
                $select->order(array('left ASC'));
            })->toArray();
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

    public function moveItem($arrParam = null, $options = null) {
        if ($options == null) {
            if ($arrParam['id'] > 0) {
                if ($arrParam['type'] == 'up')
                    $this->moveUp($arrParam['id']);
                if ($arrParam['type'] == 'down')
                    $this->moveDown($arrParam['id']);
            }
        }
    }

    public function getCategories($arrParam = null, $options = null) {
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam) {
            $select->columns(array(
                                'id', 'name'
                            ))->where->NEST
                            ->where->greaterThan('category.level', 0)
                            ->equalTo('parent', $arrParam['parent'])
                            ->equalTo('level', $arrParam['level'])
                            ->notEqualTo('id', $arrParam['id'])
                    ->UNNEST;
        });
        return $result;
    }

    public function getItem($arrParam = null, $options = null) {
        if ($options == null) {
            $result = $this->tableGateway->select(function (Select $select) use ($arrParam) {
                        $select->where->equalTo('id', $arrParam['id']);
                    })->current();
        }

        return $result;
    }

    public function ordering($arrParam = null, $options = null) {

        if ($options == null) {
            if (!empty($arrParam['cid'])) {
                foreach ($arrParam['cid'] as $id) {
                    $data = array('ordering' => $arrParam['ordering'][$id]);
                    $where = array('id' => $id);
                    $this->tableGateway->update($data, $where);
                }
                return true;
            }
        }

        return false;
    }

    public function deleteItem($arrParam = null) {

        if ($arrParam['task'] == 'multi-delete') {
            if (!empty($arrParam['cid'])) {
                foreach ($arrParam['cid'] as $id) {
                    $filename = $this->getImage($id)->image;
                    if($filename){
                        $imageObj = new Image();
                        $imageObj->removeImage($filename,array('task' => 'category'));
                    }
                    $this->removeNode($id, array('type' => 'only'));
                }
            }
        }else{
            $filename = $this->getImage($arrParam['id'])->image;
            if($filename){
                $imageObj = new Image();
                $imageObj->removeImage($filename,array('task' => 'category'));
            }
            $this->removeNode($arrParam['id'], array('type' => 'only'));
        }
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
    public function saveItem($arrParam = null, $options = null) {
        $data = array(
            'name' => $arrParam['name'],
            'alias' => $arrParam['alias'],
            'parent' => $arrParam['parent'],
            'meta_description' => isset($arrParam['meta_description']) ? $arrParam['meta_description'] : '',
            'meta_keyword' => isset($arrParam['meta_keyword']) ? $arrParam['meta_keyword'] : '',
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

        if ($options['task'] == 'add-item') {
            $data = array_merge($data,array(
                'status' => 1,
                'created_date' => date('Y-m-d H:i:s'),
                'image' => isset($arrParam['imageName']) ? $arrParam['imageName'] : '',
                'created_by' => $arrParam['created_by']
            ));

            $this->insertNode($data, $arrParam['parent'], array('position' => 'right'));
            return $this->tableGateway->getLastInsertValue();
        }
        if ($options['task'] == 'edit-item') {
            $data = array_merge($data,array(
                'modified_date' => date('Y-m-d H:i:s'),
                'modified_by' => $arrParam['modified_by']
            ));

            if ($arrParam['parent'] == $arrParam['id'])
                $arrParam['parent'] = null;
            $this->updateNode($data, $arrParam['id'], $arrParam['parent']);
            return $arrParam['id'];
        }
    }

}
