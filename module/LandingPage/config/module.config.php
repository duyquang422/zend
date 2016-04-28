<?php
return array(
	'controllers'	=> array(
			'invokables' => array (
                'LandingPage\Controller\Index' 	        => 'LandingPage\Controller\IndexController',
				'LandingPage\Controller\Posts' 	        => 'LandingPage\Controller\PostsController',
                'LandingPage\Controller\CategoryPosts' 	=> 'LandingPage\Controller\CategoryPostsController'
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
					'layout/landing-page'   => PATH_TEMPLATE . '/landing-page/index.phtml',
					'layout/error'		=> PATH_TEMPLATE . '/error/layout.phtml',
					'error/404'			=> PATH_TEMPLATE . '/error/404.phtml',
					'error/index'		=> PATH_TEMPLATE . '/error/index.phtml'
					
			),
			'default_template_suffix'  	=> 'phtml',
			'layout'					=> 'layout/landing-page'
	),
    'strategies' => array(
        'ViewJsonStrategy',
    )
); 