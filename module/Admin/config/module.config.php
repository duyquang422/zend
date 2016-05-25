<?php
return array(
	'controllers'	=> array(
			'invokables' => array (
					'Admin\Controller\Index' 	=> 'Admin\Controller\IndexController',
					'Admin\Controller\Group' 	=> 'Admin\Controller\GroupController',
					'Admin\Controller\Config' 	=> 'Admin\Controller\ConfigController',
					'Admin\Controller\User' 	=> 'Admin\Controller\UserController',
					'Admin\Controller\Category' => 'Admin\Controller\CategoryController',
					'Admin\Controller\Product' 	=> 'Admin\Controller\ProductController',
					'Admin\Controller\Cart' 	=> 'Admin\Controller\CartController',
					'Admin\Controller\Nested' 	=> 'Admin\Controller\NestedController',
					'Admin\Controller\Facebook' 	=> 'Admin\Controller\FacebookController',
                    'Admin\Controller\Vchat' 	=> 'Admin\Controller\VchatController',
                    'Admin\Controller\PostsCategory' 	=> 'Admin\Controller\PostsCategoryController',
                    'Admin\Controller\Posts' 	=> 'Admin\Controller\PostsController',
                    'Admin\Controller\Manufacturer' 	=> 'Admin\Controller\ManufacturerController',
					'Admin\Controller\AttributesAndSize' => 'Admin\Controller\AttributesAndSizeController',
					'Admin\Controller\Comment' => 'Admin\Controller\CommentController',
					'Admin\Controller\Tags' => 'Admin\Controller\TagsController',
                    'Admin\Controller\Google' => 'Admin\Controller\GoogleController',
                    'Admin\Controller\Pages' => 'Admin\Controller\PagesController',
					'Admin\Controller\Home' => 'Admin\Controller\HomeController',
					'Admin\Controller\ProductInStock' => 'Admin\Controller\ProductInStockController'
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
                    'layout/reload'   	=> PATH_TEMPLATE . '/backend/reload.phtml',
					'layout/backend'    => PATH_TEMPLATE . '/backend/index.phtml',
			),
			'default_template_suffix'  	=> 'phtml',
			'layout'					=> 'layout/backend'
	),

    'view_helpers' => array(
        'invokables' => array(
            'fancybox' => 'Zendvn\View\Helper\Fancybox',
            'modal' => 'Zendvn\View\Helper\Modal',
            'fck' => 'Zendvn\View\Helper\Fckeditor',
            'datatable' => 'Zendvn\View\Helper\Datatable',
            'btnFunction' => 'Zendvn\View\Helper\BtnFunction',
			'uploadImg' => 'Zendvn\View\Helper\UploadImage'
        )
	),

    'strategies' => array(
        'ViewJsonStrategy',
    ),

	'view_helper_config' => array(
			'flashmessenger' => array(
					'message_open_format'      => '<div class="row"><div class="alert alert-success alert-dismissable ">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
					'message_close_string'     => '</div></div>',
					'message_separator_string' => ''
			)
	),
	'controller_plugins' => array(
		'invokables' => array(
			'datatables' => 'Admin\Controller\Plugin\Datatables'
		)
	)
); 