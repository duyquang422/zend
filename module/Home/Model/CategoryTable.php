<?php

namespace Home\Model;

use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class CategoryTable{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function getChildCategory($id){
        $items = $this->tableGateway->select(function (Select $select) use ($id){
            $select->columns(array('id','name','alias','image'))
                ->where(new Expression('(parent = ? OR id = ?) AND image != ""',array($id,$id)));
            $select->limit(13);
        });
        return $items->toArray();
    }

    public function getCategoriesSameParent($parentId){
        return $this->tableGateway->select(function (Select $select) use ($parentId){
            $select->columns(array('id','name','alias'))
                ->where->equalTo('parent',$parentId);
        });
    }

    public function getCategory($id){
        return $this->tableGateway->select(function (Select $select) use ($id){
            $select->columns(array('id','name','alias','image','parent'))
                ->where->equalTo('id',$id);
        })->current();
    }

    public function search($value){
        $items = $this->tableGateway->select(function (Select $select) use ($value){
            $select->columns(array('id','name','alias'))
                ->where->like('name','%'. $value . '%');
            $select->limit(10);
        });
        return $items->toArray();
    }

    public function getParentCategory($parentId){
        $items = $this->tableGateway->select(function (Select $select) use ($parentId){
            $select->columns(array('id','name','alias','image'))
                ->where->equalTo('id',$parentId);
        })->current();
        return $items;
    }

    public function getManufacturerByCategory($id,$options){
        $items = $this->tableGateway->select(function (Select $select) use ($id,$options){
            $select->columns(array('id'));
            $select->join(
                array('p'=> 'products'),
                'category.id = p.category_id',
                array('productName' => 'name'),
                $select::JOIN_LEFT
            )->join(
                array('m' => 'manufacturer'),
                'p.trademark = m.id',
                array('manufacturerName' => new Expression('max(m.name)'),'manufacturerImage' => 'picture','manufacturerAlias' => 'alias','manuname'=>'name','manuId' => 'id'),
                $select::JOIN_LEFT
            )
                ->group('m.name');
                if($options['task'] == 'index')
                    $select->where(new Expression('category.parent = ? AND m.picture IS NOT NULL',$id));
                else if($options['task'] == 'category')
                    $select->where(new Expression('(category.id = ? or category.parent = ?) AND m.name IS NOT NULL',[$id,$id]));
            $select->order('m.name','asc')->limit(6);
        });
        return $items->toArray();
    }

    public function getProductByCategory($id,$options = null){
        $items = $this->tableGateway->select(function (Select $select) use ($id,$options){
            $select->columns(array('id','name','alias','image'));
            $select->join(
                array('p'=> 'products'),
                'category.id = p.category_id',
                array(
                        'productId'   =>'id',
                        'productName'   =>'name',
                        'productImage'  => 'image',
                        'price','sale_off',
                        'productAlias'  => 'alias'
                    ),
                $select::JOIN_LEFT
            );
            if($options['task'] == 'home') {
                $select->where(new Expression('(category.parent = ? OR category.id = ?) AND p.image != ""', [$id, $id]))
                        ->order('category.id', 'asc')->limit(6);
            }
            if($options['task'] == 'category'){
                $select->where(new Expression('category.id = ? AND p.image != ""', $id))
                ->order('category.id','asc');
            }
        });
        return $items->toArray();
    }

    public function getSpecialCategories(){
        $items = $this->tableGateway->select(function (Select $select){
            $select->columns(array('id', 'name','alias','image'))
                    ->where->equalTo('special',1);
            $select->limit(4);
            ;
        });
        return $items->toArray();
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
                $select->columns(array(
                    'id', 'name', 'status', 'level', 'parent', 'left', 'right','alias'
                ));
                
            if ($options['task'] == 'category-frontend')
                $select->where->greaterThan('category.level', 0);  
            $select->where->equalTo('status',1);
            $select->order(array('left ASC'));
        })->toArray();
    }
    public function getCategories($arrParam = null, $options = null) {
        return $this->tableGateway->select(function (Select $select) use ($arrParam) {
            $select->columns(array(
                                'id', 'name'
                            ))->where->NEST
                            ->where->greaterThan('category.level', 0)
                            ->equalTo('parent', $arrParam['parent'])
                            ->equalTo('level', $arrParam['level'])
                            ->equalTo('status',1)
                            ->notEqualTo('id', $arrParam['id'])
                    ->UNNEST;
        });
    }
}
