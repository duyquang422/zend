<?php

namespace Home\Model;

use Zend\Db\Sql\Predicate\Expression;
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

    public function getProductAttr($idProduct){
        return $this->tableGateway->select(function (Select $select) use ($idProduct){
            $select->join(
                        array('p'=> 'products'),
                        'p.id = product_attributes_product.product_id',
                        array('productName' => 'name'),
                        $select::JOIN_LEFT
                    )->join(
                        array('pa'=> 'product_attributes'),
                        'pa.id = product_attributes_product.attributes_id',
                        array('attrName' => 'attributes'),
                        $select::JOIN_LEFT
                    )
                    ->where(new Expression('product_attributes_product.status = 1 AND p.id = ?',$idProduct));
        })->toArray();
    }
}
