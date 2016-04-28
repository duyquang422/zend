<?php

namespace Home\Model;

use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class ProductsTable{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function updateView($arrParam){
        $this->tableGateway->update(['hits' => $arrParam->hits + 1], array('id' => $arrParam->id));
    }
    public function getProductsFromSurveyUser($categoryId){
        return $this->tableGateway->select(function (Select $select) use ($categoryId){
            $select->columns(array('id','name','alias','image','price','sale_off','category_id'))
                    ->join(
                        array('c'=> 'category'),
                        'c.id = products.category_id',
                        $select::JOIN_LEFT
                    )
                    ->where(new Expression('products.status = 1 AND products.category_id = ?',$categoryId));
        })->toArray();
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
                $select->columns(['id', 'name', 'alias', 'description', 'image', 'sale_off', 'price','hits','picture','code','trademark','meta_description','meta_keyword','category_id'])
                        ->join(
                            ['c' => 'category'],
                            'c.id = products.category_id',
                            ['categoryName' => 'name','categoryId' => 'id','categoryAlias' => 'alias','parentId' => 'parent'],
                            $select::JOIN_LEFT
                        )->where->equalTo('products.id',$arrParam['id']);
        })->current();
        return $result;
    }

    public function getProducts($arrParam = null, $options = null) {
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam,$options) {
             $select->columns(array('id', 'name','alias','description','image','sale_off','price','deal_time'));
            switch($options['task']){
                case 'nomination-product':
                    $select->where(new Expression('status = 1 AND special = 1'))
                        ->order('id DESC')
                        ->limit(11);
                    break;
                case 'page-product':
                    $select->where->equalTo('status',1);
                    $select->order('id DESC')
                        ->limit(4);
                    break;
                case 'nomination-category':
                    $select->where(new Expression('status = 1 AND special = 1'))
                        ->order('id DESC')
                        ->limit(5);
                    break;
                case 'deal':
                    $select->where(new Expression('status = 1 AND deal = 1'))
                        ->order('id DESC')
                        ->limit(5);
                    break;
                case 'miniBarMenu':
                    $cid = implode(',', $arrParam);
                    $select->where(new Expression('id IN (' . $cid . ')'));
                    break;
            }
        });
        return $result->toArray();
    }

    public function getProductsByCategory($arrParam,$options = null){
        $result = $this->tableGateway->select(function (Select $select) use ($arrParam,$options) {
            $select->columns(array('id', 'name','alias','description','image','sale_off','price','percent_discount','hits','zoom_image'))
                ->join(
                    array('c'=> 'category'),
                    'c.id = products.category_id',
                    $select::JOIN_LEFT
                )->join(
                    array('r' => 'ratings'),
                    'r.id = products.id',
                    ['total_votes','total_value'],
                    $select::JOIN_LEFT
                );
            if(isset($arrParam['idCategory']))
                $select->where(new Expression('products.status = 1 AND (c.id = ? OR c.parent = ?)',[$arrParam['idCategory'],$arrParam['idCategory']]));
            else
                $select->where(new Expression('products.status = 1 AND (c.id = ? OR c.parent = ?)',[$arrParam['id'],$arrParam['id']]));
//            $select->order('id DESC');
            if($options['task'] == 'filter') {
                if ($arrParam['attr'] == 'id' || $arrParam['attr'] == 'hits' ||
                    $arrParam['attr'] == 'percent_discount' || $arrParam['attr'] == 'point' ||
                    $arrParam['attr'] == 'rate' || $arrParam['attr'] == 'bought' || $arrParam['attr'] == 'sale_off'
                )
                    $select->order('products.' . $arrParam['attr'] . ' DESC');
                else if ($arrParam['attr'] == 'hot' || $arrParam['attr'] == 'special')
                    $select->where('products.' . $arrParam['attr'], 1);

                if($arrParam['star']){
                    $select->where(new Expression('total_value / 2 / total_votes >= ? AND total_value / 2 / total_votes < ? + 1',[$arrParam['star'],$arrParam['star']]));
                }

                if($arrParam['manuId']) {
                    $select->where->equalTo('trademark', $arrParam['manuId']);
                }

                if($arrParam['fromPrice']){
                    $select->where->between('sale_off',$arrParam['fromPrice'],$arrParam['toPrice']);
                }

                if (isset($arrParam['limit'])) {
                    $select->limit($arrParam['limit']);
                }
            }
//            $select->group('cm.product_id');
        });
        return $result->toArray();
    }
}
