<?php
return array(
	'db' => array(
			'driver' 	=> 'Pdo_Mysql',
			'database' 	=> 'zend',
			'charset' 	=> 'utf8',
                        'host' => 'localhost'
	),
	
	'service_manager'	=> array(
			'factories'	=> array(
				'Zend\Db\Adapter\Adapter'	=> 'Zend\Db\Adapter\AdapterServiceFactory',
			),
			'aliases' => array(
				'dbConfig'					=> 'Zend\Db\Adapter\Adapter',
			),
	)
);
