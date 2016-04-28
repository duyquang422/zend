<?php
$homeRoute	= array(
		'type' => 'Zend\Mvc\Router\Http\Literal',
		'options' => array (
				'route' => '/',
				'defaults' => array (
						'__NAMESPACE__' => 'LandingPage\Controller',
						'controller' 	=> 'index',
						'action' 		=> 'index' 
				) 
		) 
);

$RouteChild	= array(
		'type' => 'Literal',
		'options' => array (
				'route' => '/home',
				'defaults' => array (
						'__NAMESPACE__' => 'Home\Controller',
						'controller' 	=> 'Index',
						'action' 		=> 'index' 
				)
		),
		'may_terminate' => true,
		'child_routes' => array (
				'default' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/[:controller[/:action[/:id]]][/]',
								'constraints' => array (
										'controller' 	=> '[a-zA-Z][a-zA-Z0-9_-]*',
										'action' 		=> '[a-zA-Z][a-zA-Z0-9_-]*',
										'id' 			=> '[0-9]*',
								)
						)
				),
				'paginator' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/:controller/index/page[/:page][/]',
								'constraints' => array (
										'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
										'page' 		=> '[0-9]*'
								),
								'defaults' => array ()
						)
				),
				'active' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/user/active/:id/code/:code[/]',
								'constraints' => array (
										'id' 			=> '[0-9]*',
								),
								'defaults' => array (
										'__NAMESPACE__' => 'Shop\Controller',
										'controller' 	=> 'User',
										'action' 		=> 'active'
								)
						)
				)
		)
);
$categoryRoute = array(
	'type' 		=> 'Regex',
	'options' 	=> array(
		'regex' 	=> '/(?<name>[a-zA-Z][a-zA-Z0-9-_]+)-(?<id>[0-9]+)',
		'defaults' 	=> array(
			'__NAMESPACE__' 	=> 'Home\Controller',
			'controller' 		=> 'category',
			'action' 			=> 'index'
		),
		'spec' 		=> '/%name%-%id%',
	),
);
$productRoute = array(
	'type' 		=> 'Regex',
	'options' 	=> array(
		'regex' 	=> '/((?<name>[a-zA-Z][a-zA-Z0-9-_]+)-(?<id>[0-9]+).(?<extension>(html)))?',
		'defaults' 	=> array(
			'__NAMESPACE__' 	=> 'Home\Controller',
			'controller' 		=> 'product',
			'action' 			=> 'index'
		),
		'spec' 		=> '/%name%-%id%.%extension%',
	),
);
return array(
	'router'		=> array(
			'routes' => array(
					'frontendRoute'	=> $RouteChild,
					'category'		=> $categoryRoute,
                    'product'       => $productRoute,
                    'home'			=> $homeRoute
			),
	)
		
); 