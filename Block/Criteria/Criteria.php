<?php

namespace Block\Criteria;

use Zend\View\Helper\AbstractHelper;

class Criteria extends AbstractHelper{

    protected $_configurationTable;
    protected $_cartTable;

    public function __invoke(){
        $income = $this->_cartTable->income(array('month' => date('m')),array('task' => 'monthly'));
        $income = $income && $income[0]['income'] ? (int)$income[0]['income'] : 0;
        $numSalesCriteria = $this->_configurationTable->getConfig('num_sales_criteria')->value;
        $salesCriteria = floatval($income * 100 / $numSalesCriteria);

        $order = $this->_cartTable->countOrders(array('month' => date('m')),array('task' => 'monthly'));
        $numOrderCriteria = $this->_configurationTable->getConfig('num_order_criteria')->value;
        $orderCriteria = floatval($order * 100 / $numOrderCriteria);

        $productSold = $this->_cartTable->countProductsSold(array('month' => date('m')),array('task' => 'monthly'));
        $productSold = $productSold && $productSold[0]['total_product'] ? $productSold[0]['total_product'] : 0;
        $numSoldCriteria = $this->_configurationTable->getConfig('num_sold_criteria')->value;
        $soldCriteria = floatval($productSold * 100 / $numSoldCriteria);
        require 'views/default.phtml';
    }

    public function setDataConfigTable($table){
        return $this->_configurationTable = $table;
    }

    public function setDataCartTable($table){
        return $this->_cartTable = $table;
    }
}