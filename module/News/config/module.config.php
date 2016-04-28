<?php
return array(
	'controllers'	=> array(
			'invokables' => array (
                'News\Controller\Index' 	        => 'News\Controller\IndexController',
				'News\Controller\Posts' 	        => 'News\Controller\PostsController',
                'News\Controller\CategoryPosts' 	=> 'News\Controller\CategoryPostsController'
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
					'layout/news'   => PATH_TEMPLATE . '/news/index.phtml',
					'layout/error'		=> PATH_TEMPLATE . '/error/layout.phtml',
					'error/404'			=> PATH_TEMPLATE . '/error/404.phtml',
					'error/index'		=> PATH_TEMPLATE . '/error/index.phtml'
					
			),
			'default_template_suffix'  	=> 'phtml',
			'layout'					=> 'layout/news'
	),
    'strategies' => array(
        'ViewJsonStrategy',
    ),
    'controller_plugins' => array(
        'invokables' => array(

        )
    )
); 