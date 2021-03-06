<?php
namespace Home;

use Block\Bartop\Bartop;
use Block\Criteria\Criteria;
use Block\FilterManufacturer\FilterManufacturer;
use Block\Header\Header;
use Block\History\History;
use Block\HorizontalMenu\HorizontalMenu;
use Block\HotDealProducts\HotDealProducts;
use Block\MenuCategories\MenuCategories;
use Block\MenuMobile\MenuMobile;
use Block\NavLeftHomePage\NavLeftHomePage;
use Block\MiniBarMenu\MiniBarMenu;
use Block\NominationProducts\NominationProducts;
use Block\ProductsByCategory\ProductsByCategory;
use Block\ProductHomeTabs\ProductHomeTabs;
use Block\SlideHomeTop\SlideHomeTop;
use Block\Vocation\Vocation;
use Block\ProductDescription\ProductDescription;
use Home\Model\CartTable;
use Home\Model\CategoryTable;
use Home\Model\PostsCategoryTable;
use Admin\Model\Entity\Category;
use Admin\Model\Entity\Products;
use Home\Model\CommentTable;
use Home\Model\GroupTable;
use Home\Model\HistoryTable;
use Home\Model\PermissionTable;
use Home\Model\ProductAttributesProductTable;
use Home\Model\ProductsTable;
use Home\Model\UserTable;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Db\TableGateway\TableGateway;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Block\AddToCart\AddToCart;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $adapter = $e->getApplication()->getServiceManager()->get('dbConfig');
        GlobalAdapterFeature::setStaticAdapter($adapter);

        $eventManager->attach('dispatch', array($this, 'loadConfig'));
    }

    public function loadConfig(MvcEvent $e){}

    public function getConfig()
    {
        return array_merge(
            require_once __DIR__ . '/config/module.config.php',
            require_once __DIR__ . '/config/router.config.php'
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'AuthenticateService' => function ($sm) {
                    $dbTableAdapter = new \Zend\Authentication\Adapter\DbTable($sm->get('dbConfig'), 'user' , 'email', 'password', 'MD5(?)');
                    $dbTableAdapter->getDbSelect()->where->equalTo('status', 1)
                        ->where->equalTo('active_code', 1);
                    $authenticateServiceObj = new \Zend\Authentication\AuthenticationService(null, $dbTableAdapter);
                    return $authenticateServiceObj;
                },
                'authentication' => function ($sm) {
                    return new \Zendvn\System\Authenticate($sm->get('AuthenticateService'));
                },
                'Home\Model\CategoryTable' => function ($sm) {
                    $tableGateway = $sm->get('CategoryTableGateway');
                    return new CategoryTable($tableGateway);
                },
                'Home\Model\ProductsTable' => function ($sm) {
                    $tableGateway = $sm->get('ProductsTableGateway');
                    return new ProductsTable($tableGateway);
                },
                'Home\Model\UserTable'  => function ($sm) {
                    $tableGateway   = $sm->get('UserTableGateway');
                    return new UserTable($tableGateway);
                },
                'Home\Model\GroupTable' => function ($sm) {
                    $tableGateway   = $sm->get('GroupTableGateway');
                    return new GroupTable($tableGateway);
                },
                'Home\Model\PermissionTable'    => function ($sm) {
                    $tableGateway   = $sm->get('PermissionTableGateway');
                    return new PermissionTable($tableGateway);
                },
                'Home\Model\HistoryTable'    => function ($sm) {
                    $tableGateway   = $sm->get('HistoryTableGateway');
                    return new HistoryTable($tableGateway);
                },
                'Home\Model\CommentTable'    => function ($sm) {
                    $tableGateway   = $sm->get('CommentTableGateway');
                    return new CommentTable($tableGateway);
                },
                'Home\Model\CartTable'  => function ($sm) {
                    $tableGateway   = $sm->get('CartTableGateway');
                    return new CartTable($tableGateway);
                },
                'Home\Model\PostsCategoryTable'  => function ($sm) {
                    $tableGateway   = $sm->get('PostsCategoryTableGateway');
                    return new PostsCategoryTable($tableGateway);
                },
                'Home\Model\ProductAttributesProductTable'  => function ($sm) {
                    $tableGateway   = $sm->get('ProductAttributesProductTableGateway');
                    return new ProductAttributesProductTable($tableGateway);
                }

            ),
            'invokables' => array(
                'Zend\Authentication\AuthenticationService' => 'Zend\Authentication\AuthenticationService',
            ),
        );
    }

    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
                'collectionProducts'    => 'Block\CollectionProducts\CollectionProducts',
                'news'                  => 'Block\News\News',
                'policy'                => 'Block\Policy\Policy',
                'support'               => 'Block\Support\Support',
                'purchase'              => 'Block\Purchase\Purchase',
                'facebookComment'       => 'Block\FacebookComment\FacebookComment',
                'buysuccess'            => 'Block\BuySuccess\BuySuccess',
                'signUp'                => 'Block\SignUp\SignUp',
                'leftProfileUser'       => 'Block\LeftProfileUser\LeftProfileUser',
                'stickyBar'             => 'Block\StickyBar\StickyBar',
                'filterPrice'           => 'Block\FilterPrice\FilterPrice',
                'filterRate'            => 'Block\FilterRate\FilterRate',
                'filterAttr'            => 'Block\FilterAttr\FilterAttr',
                'showModal'            => 'Block\Modal\Modal'
            ),
            'factories' => array(
                'menuMobile' => function($sm){
                    $helper = new MenuMobile();
                    $helper->getCategoryTable($sm->getServiceLocator()->get('Home\Model\categoryTable'));
                    return $helper;
                },
                'hotDealProducts' => function($sm){
                    $helper = new HotDealProducts();
                    $helper->getProductTable($sm->getServiceLocator()->get('Home\Model\ProductsTable'));
                    return $helper;
                },
                'bartop' => function($sm){
                    $helper = new Bartop();
                    $helper->getPostsCategory($sm->getServiceLocator()->get('Home\Model\PostsCategoryTable'));
                    return $helper;
                },
                'slideHomeTop' => function($sm){
                    $helper = new SlideHomeTop();
                    $helper->getConfig($sm->getServiceLocator()->get('Admin\Model\ConfigurationTable'));
                    return $helper;
                },
                'horizontalMenu' => function($sm){
                    $helper = new HorizontalMenu();
                    $helper->getConfig($sm->getServiceLocator()->get('Admin\Model\ConfigurationTable'));
                    return $helper;
                },
                'header' => function($sm){
                    $helper = new Header();
                    $helper->getConfig($sm->getServiceLocator()->get('Admin\Model\ConfigurationTable'));
                    return $helper;
                },
                'navLeftHomePage' => function($sm){
                    $helper = new NavLeftHomePage();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\CategoryTable'));
                    $helper->getConfig($sm->getServiceLocator()->get('Admin\Model\ConfigurationTable'));
                    return $helper;
                },
                'vocation' => function($sm){
                    $helper = new Vocation();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\CategoryTable'));
                    return $helper;
                },
                'productsByCategory' => function($sm){
                    $helper = new ProductsByCategory();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\CategoryTable'));
                    return $helper;
                },
                'nominationProducts' => function($sm){
                    $helper = new NominationProducts();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\ProductsTable'));
                    $helper->category($sm->getServiceLocator()->get('Home\Model\CategoryTable'));
                    return $helper;
                },
                'addToCart' => function($sm){
                    $helper = new AddToCart();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\ProductsTable'));
                    return $helper;
                },
                'productDescription' => function($sm){
                    $helper = new ProductDescription();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\ProductsTable'));
                    return $helper;
                },
                'productHometabs' => function($sm){
                    $helper = new ProductHomeTabs();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\ProductsTable'));
                    return $helper;
                },
                'history' => function($sm){
                    $helper = new History();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\HistoryTable'));
                    $helper->getProductTable($sm->getServiceLocator()->get('Home\Model\ProductsTable'));
                    return $helper;
                },
                'comment' => function($sm){
                    $helper = new \Block\Comment\Comment();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\CommentTable'));
                    return $helper;
                },
                'miniBarMenu' => function($sm){
                    $helper = new MiniBarMenu();
                    $helper->setProductData($sm->getServiceLocator()->get('Home\Model\ProductsTable'));
                    $helper->setCartData($sm->getServiceLocator()->get('Home\Model\CartTable'));
                    return $helper;
                },
                'menuCategories' => function($sm){
                    $helper = new MenuCategories();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\CategoryTable'));
                    return $helper;
                },
                'filterManufacturer' => function($sm){
                    $helper = new FilterManufacturer();
                    $helper->setData($sm->getServiceLocator()->get('Home\Model\CategoryTable'));
                    return $helper;
                },
                'criteria' => function($sm){
                    $helper = new Criteria();
                    $helper->setDataConfigTable($sm->getServiceLocator()->get('Admin\Model\ConfigurationTable'));
                    $helper->setDataCartTable($sm->getServiceLocator()->get('Admin\Model\CartTable'));
                    return $helper;
                }
            )
        );
    }
}