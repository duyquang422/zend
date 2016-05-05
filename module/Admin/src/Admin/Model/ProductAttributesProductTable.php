<?php

namespace Admin\Model;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;

class ProductAttributesProductTable extends AbstractTableGateway
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function saveData($arrParam = null, $option = null)
    {
        $data = [
            'attributes_id' => $arrParam['attributesId'],
            'product_id' => $arrParam['productId'],
            'value' => $arrParam['value'],
            'status' => 1
        ];
        $this->tableGateway->insert($data);
        return $this->tableGateway->getLastInsertValue('id');
    }

    public function getProductattributes($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('id','attributes_id','product_id','value','status'))
                    ->join(
                        array('ps' => 'product_attributes'),
                        'product_attributes_product.attributes_id = ps.id',
                        array('attributesName' => 'attributes'),
                        $select::JOIN_LEFT
                    )->where->equalTo('product_attributes_product.product_id', $id)->equalTo('ps.status',1);
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

    public function deleteByattributes($arrParam = null, $option = null){
        if ($arrParam['task'] == 'multi-delete')
            if (!empty($arrParam['cid']))
                foreach ($arrParam['cid'] as $id)
                    $this->tableGateway->delete(array('attributes_id' => $id));
            else
                $this->tableGateway->delete(array('attributes_id' => $arrParam['id']));
    }
}
