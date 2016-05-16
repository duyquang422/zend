<?php
$RouteChild	= array(
		'type' => 'Literal',
		'options' => array (
				'route' => '/news',
				'defaults' => array (
						'__NAMESPACE__' => 'News\Controller',
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
				)
		)
);
$categoryRoute = array(
	'type' 		=> 'Regex',
	'options' 	=> array(
		'regex' 	=> '/tin-tuc/((?<name>[a-zA-Z][a-zA-Z0-9-_]+)-(?<id>[0-9]+).(?<extension>(html)))?',
		'defaults' 	=> array(
			'__NAMESPACE__' 	=> 'News\Controller',
			'controller' 		=> 'posts-category',
			'action' 			=> 'index'
		),
		'spec' 		=> '/tin-tuc/%name%-%id%',
	),
);
$productRoute = array(
	'type' 		=> 'Regex',
	'options' 	=> array(
		'regex' 	=> '/((?<name>[a-zA-Z][a-zA-Z0-9-_]+)-(?<id>[0-9]+).(?<extension>(html)))?',
		'defaults' 	=> array(
			'__NAMESPACE__' 	=> 'News\Controller',
			'controller' 		=> 'posts',
			'action' 			=> 'index'
		),
		'spec' 		=> '/%name%-%id%.%extension%',
	),
);
return array(
	'router'		=> array(
			'routes' => array(
					'news'	=> $RouteChild,
					'category-posts'		=> $categoryRoute,
                    'posts'       => $productRoute
			),
	)
		
); 