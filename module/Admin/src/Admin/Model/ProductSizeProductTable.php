<?php

namespace Admin\Model;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class ProductSizeProductTable extends NestedTable
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function saveData($arrParam = null, $option = null)
    {
        $data = [
            'size_id' => $arrParam['sizeId'],
            'product_id' => $arrParam['productId'],
            'price' => $arrParam['price'],
            'status' => 1
        ];
        $this->tableGateway->insert($data);
        return $this->tableGateway->getLastInsertValue('id');
    }

    public function getProductSize($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('id','size_id','product_id','price','status'))
                    ->join(
                        array('ps' => 'product_size'),
                        'product_size_product.size_id = ps.id',
                        array('sizeName' => 'size'),
                        $select::JOIN_LEFT
                    )->where->equalTo('product_size_product.product_id', $id);
        });
        return $result->toArray();
    }

    public function deleteItem($arrParam = null, $option = null){
            $this->tableGateway->delete(['id' => $arrParam['id']]);
    }

    public function changeStatus($arrParam = null, $option = null){
        $data = array('status' => $arrParam['status'] ? 0 : 1);
        $this->tableGateway->update($data, ['id' => $arrParam['id']]);
    }
}
