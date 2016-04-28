<?php
return array(
	'controllers'	=> array(
			'invokables' => array (
                'Home\Controller\Index' 	=> 'Home\Controller\IndexController',
				'Home\Controller\Category' 	=> 'Home\Controller\CategoryController',
				'Home\Controller\Product' 	=> 'Home\Controller\ProductController',
				'Home\Controller\User' 		=> 'Home\Controller\UserController',
				'Home\Controller\Notice'    => 'Home\Controller\NoticeController',
				'Home\Controller\Comment'   => 'Home\Controller\CommentController',
				'Home\Controller\Login'     => 'Home\Controller\LoginController'
			)
	),
	'view_manager'	=> array(
			'doctype'					=> 'HTML5',
			'display_not_found_reason' 	=> true,
			'not_found_template'       	=> 'error/404',
				
			'display_exceptions'       	=> true,
			'exception_template'       	=> 'error/index',
			
			'template_path_stack'		=> array(__DIR__ . '/../view'),
			'template_map' 				=> array(
					'layout/frontend'   => PATH_TEMPLATE . '/frontend/index.phtml',
					'layout/error'		=> PATH_TEMPLATE . '/error/layout.phtml',
					'error/404'			=> PATH_TEMPLATE . '/error/404.phtml',
					'error/index'		=> PATH_TEMPLATE . '/error/index.phtml'
					
			),
			'default_template_suffix'  	=> 'phtml',
			'layout'					=> 'layout/frontend'
	),
    'strategies' => array(
        'ViewJsonStrategy',
    ),
    'controller_plugins' => array(
        'invokables' => array(

        )
    )
); 