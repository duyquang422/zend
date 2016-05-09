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

    public function countProductsSold($arrParam = null, $option = null){
        return $this->tableGateway->select(function (Select $select) use ($arrParam,$option) {
            $select->columns(array(new \Zend\Db\Sql\Expression('SUM(`total_product`) as total_product')))->where->equalTo('status',4);
            if($option['task'] == 'monthly')
                $select->where(new Expression('month(time_order) = ? AND YEAR(NOW())',$arrParam['month']));
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
            case 'pending':
                $data['status'] = 2;
                $where['status'] = 0;
                break;
            case 'process':
                $data['status'] = 3;
                $where = ['id' => $id,'status' => 1];
                break;
            case 'shipping':
                $data['status'] = 4;
                $where['id'] = $id;
                break;
            case 'complete':
                $data['status'] = 5;
                $where['id'] = $id;
                break;
            case 'canceled':
                $data['status'] = 6;
                $where['id'] = $id;
                break;
        }
        $this->tableGateway->update($data,$where);
    }

    public function countStatusOrder($option = null){
        return $this->tableGateway->select(function (Select $select) use ($option){
            switch($option) {
                case 'new':
                    $select->where->equalTo('status', 1);
                    break;
                case 'pending':
                    $select->where->equalTo('status', 2);
                    break;
                case 'process':
                    $select->where->equalTo('status', 3);
                    break;
                case 'shipped':
                    $select->where->equalTo('status', 4);
                    break;
                case 'complete':
                    $select->where->equalTo('status', 5);
                    break;
                case 'canceled':
                    $select->where->equalTo('status', 6);
                    break;
            }
        })->count();
    }
}
