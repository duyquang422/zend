<?php

namespace Admin\Model;
use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class CartTable extends NestedTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function countProductsSold(){
        return $this->tableGateway->select(function (Select $select) {
            $select->columns([new \Zend\Db\Sql\Expression('SUM(`total_product`) as total_product')])->where->equalTo('status',4);
        })->toArray();
    }

    public function countOrders($arrParam = null, $options = null){
        return $this->tableGateway->select(function (Select $select) use ($arrParam,$options) {
            switch($options['task']){
                case 'weekly':
                    $select->where(new Expression('DATE(time_order) = ? AND month(time_order) = MONTH(NOW()) AND year(time_order) = YEAR(NOW())',$arrParam['day']));
                    break;
                case 'monthly':
                    $select->where(new Expression('month(time_order) = ? AND YEAR(NOW())',$arrParam['month']));
                    break;
                case 'yearly':
                    $select->where(new Expression('year(time_order) = ?',$arrParam['year']));
                    break;
            }
        })->count();
    }

    public function income($arrParam = null, $options = null){
        return $this->tableGateway->select(function (Select $select) use ($arrParam,$options) {
            $select->columns(['income' => new Expression('SUM(total_money)')]);
            switch($options['task']){
                case 'weekly':
                    $select->where(new Expression('DATE(time_order) = ? AND month(time_order) = MONTH(NOW()) AND year(time_order) = YEAR(NOW())',$arrParam['day']));
                    $select->group(new Expression('DATE(time_order)'));
                    break;
                case 'monthly':
                    $select->where(new Expression('month(time_order) = ?  AND year(time_order) = YEAR(NOW())',$arrParam['month']));
                    $select->group(new Expression('month(time_order)'));
                    break;
                case 'yearly':
                    $select->where(new Expression('year(time_order) = ?',$arrParam['year']));
                    $select->group(new Expression('year(time_order)'));
                    break;
            }
        })->toArray();
    }

    //lấy tất cả các năm theo đơn hàng
    public function getAllYear(){
        return $this->tableGateway->select(function (Select $select){
            $select->columns(['year' => new Expression('DISTINCT year(`time_order`)')])->group('time_order');
        })->toArray();
    }

    public function getOrder($id){
        return $this->tableGateway->select(function (Select $select) use ($id) {
            $select->where->equalTo('id', $id);
        })->current();
    }

    public function updateStatus($id = null,$option){
        $data = $where = array();
        switch($option){
            case 'process':
                $data['status'] = 1;
                $where['status'] = 0;
                break;
            case 'pending':
                $data['status'] = 2;
                $where = ['id' => $id,'status' => 1];
                break;
            case 'shipping':
                $data['status'] = 3;
                $where['id'] = $id;
                break;
            case 'complete':
                $data['status'] = 4;
                $where['id'] = $id;
                break;
            case 'canceled':
                $data['status'] = 5;
                $where['id'] = $id;
                break;
        }
        $this->tableGateway->update($data,$where);
    }

    public function countNew(){
        return $this->tableGateway->select(function (Select $select){
            $select->where->equalTo('status', 0);
        })->count();
    }
    public function countInProcess(){
        return $this->tableGateway->select(function (Select $select){
            $select->where->equalTo('status', 1);
        })->count();
    }
    public function countPending(){
        return $this->tableGateway->select(function (Select $select){
            $select->where->equalTo('status', 2);
        })->count();
    }
    public function countShipped(){
        return $this->tableGateway->select(function (Select $select){
            $select->where->equalTo('status', 3);
        })->count();
    }
    public function countComplete(){
        return $this->tableGateway->select(function (Select $select){
            $select->where->equalTo('status', 4);
        })->count();
    }
    public function countCanceled(){
        return $this->tableGateway->select(function (Select $select){
            $select->where->equalTo('status', 5);
        })->count();
    }
}
