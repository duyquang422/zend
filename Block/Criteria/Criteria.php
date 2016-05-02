<?php

namespace Block\Criteria;

use Zend\View\Helper\AbstractHelper;

class Criteria extends AbstractHelper{

    protected $_configurationTable;
    protected $_cartTable;

    public function __invoke(){
        $income = $this->_cartTable->income(['month' => (int)date('m')],['task' => 'monthly']);
        $income = $income && $income[0]['income'] ? (int)$income[0]['income'] : 0;
        $numSalesCriteria = (int)$this->_configurationTable->getConfig('num_sales_criteria')->value;
        $salesCriteria = floatval($income * 100 / $numSalesCriteria);
        require 'views/default.phtml';
    }

    public function setDataConfigTable($table){
        return $this->_configurationTable = $table;
    }

    public function setDataCartTable($table){
        return $this->_cartTable = $table;
    }
}