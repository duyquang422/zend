<?php

namespace Admin\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zendvn\Datatables\SSP;

class Datatables extends AbstractPlugin{
    public function __invoke($table, $primaryKey, $columns = array(), $joinQuery = null, $extraWhere = null, $groupBy = null) {
        $config = $this->controller->getServiceLocator()->get('config');
        echo json_encode(
                SSP::simple($_GET,$config['db'], $table, $primaryKey, $columns, $joinQuery , $extraWhere, $groupBy)
        );
    }
}