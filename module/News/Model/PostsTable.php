<?php

namespace News\Model;

use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class PostsTable{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function updateView($arrParam){
        $this->tableGateway->update(array('hits' => $arrParam->hits + 1), array('id' => $arrParam->id));
    }

    public function search($value){
        $items = $this->tableGateway->select(function (Select $select) use ($value){
            $select->columns(array('id','name','alias','image','price','sale_off','description'))
                ->where->like('name','%'. $value . '%');
            $select->limit(10);
        });
        return $items->toArray();
    }
    public function getProduct($arrParam = null,$options = null){
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam,$options) {
                $select->columns(array('id', 'name', 'alias', 'description', 'image', 'sale_off', 'price','hits','picture','code','trademark','meta_description','meta_keyword','category_id','percent_discount','bought'))
                        ->join(
                            array('c' => 'category'),
                            'c.id = posts.category_id',
                            array('categoryName' => 'name','categoryId' => 'id','categoryAlias' => 'alias','parentId' => 'parent'),
                            $select::JOIN_LEFT
                        )->where->equalTo('posts.id',$arrParam['id']);
        })->current();
        return $result;
    }

    public function countProduct($options = null){
        return $this->tableGateway->select(function (Select $select) use ($options) {
            switch ($options) {
                case 'selling-product':
                    $select->where(new Expression('sale_off > 0 AND status = 1'));
                    break;
            }
        })->count();
    }

    public function getPosts($arrParam = null, $task = null) {
        return $this->tableGateway->select(function (Select $select) use ($arrParam,$task) {
             $select->columns(array('id', 'name','alias','description','image','created_date'));
            switch($task){
                case 'new':
                    $select->where(new Expression('status = 1'))
                        ->order('id DESC');
                    break;
                case 'special':
                    $select->where(new Expression('special = 1'))
                        ->order('id DESC');
            }
            if(isset($arrParam['limit']))
                $select->limit($arrParam['limit']);
        })->toArray();
    }

    public function getpostsByCategory($arrParam,$options = null){
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam,$options) {
            $select->columns(array('id', 'name','alias','description','image','sale_off','price','percent_discount','hits','zoom_image'))
                ->join(
                    array('c'=> 'category'),
                    'c.id = posts.category_id',
                    $select::JOIN_LEFT
                )->join(
                    array('r' => 'ratings'),
                    'r.id = posts.id',
                    array('total_votes','total_value'),
                    $select::JOIN_LEFT
                );
            if(isset($arrParam['idCategory']))
                $select->where(new Expression('posts.status = 1 AND (c.id = ? OR c.parent = ?)',array($arrParam['idCategory'],$arrParam['idCategory'])));
            else
                $select->where(new Expression('posts.status = 1 AND (c.id = ? OR c.parent = ?)',array($arrParam['id'],$arrParam['id'])));
                $select->where(new Expression('posts.status = 1 AND (c.id = ? OR c.parent = ?)',array($arrParam['id'],$arrParam['id'])));
        });
        return $result->toArray();
    }
}
