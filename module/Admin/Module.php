<?php
namespace Admin;

use Admin\Model\Entity\MonthlyStatistics;
use Admin\Model\Entity\WeeklyStatistics;
use Admin\Model\MonthlyStatisticsTable;
use Admin\Model\WeeklyStatisticsTable;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;
use Zend\Session\Container;

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

    public function loadConfig(MvcEvent $e)
    {
        $routeMatch = $e->getRouteMatch();
        $controllerArray = explode('\\', $routeMatch->getParam('controller'));

                /*$viewModel = $e->getApplication()->getMvcEvent()->getViewModel();

                $viewModel->module = strtolower($controllerArray[0]);
                $viewModel->controller = strtolower($controllerArray[2]);
                $viewModel->action = $routeMatch->getParam('action');*/

                /*$config = $e->getApplication()->getServiceManager()->get('config');
                $controller = $e->getTarget();
                $controller->layout($config['module_layouts'][$controllerArray[0]]);*/
    }

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
                'GroupTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Admin\Model\Entity\Group());
                    return new TableGateway('group', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\GroupTable' => function ($sm) {
                    $tableGateway = $sm->get('GroupTableGateway');
                    return new \Admin\Model\GroupTable($tableGateway);
                },
                'UserTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\User());
                    return new TableGateway('user', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\UserTable' => function ($sm) {
                    $tableGateway = $sm->get('UserTableGateway');
                    return new \Admin\Model\UserTable($tableGateway);
                },
                'ProductsTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Products());
                    return new TableGateway('products', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductsTable' => function ($sm) {
                    $tableGateway = $sm->get('ProductsTableGateway');
                    return new \Admin\Model\ProductsTable($tableGateway);
                },
                'NestedTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Nested());
                    return new TableGateway('nested', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\NestedTable' => function ($sm) {
                    $tableGateway = $sm->get('NestedTableGateway');
                    return new \Admin\Model\NestedTable($tableGateway);
                },

                'CategoryTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Category());
                    return new TableGateway('category', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\CategoryTable' => function ($sm) {
                    $tableGateway = $sm->get('CategoryTableGateway');
                    return new \Admin\Model\CategoryTable($tableGateway);
                },

                'PostsCategoryTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\PostsCategory());
                    return new TableGateway('posts_category', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\PostsCategoryTable' => function ($sm) {
                    $tableGateway = $sm->get('PostsCategoryTableGateway');
                    return new \Admin\Model\PostsCategoryTable($tableGateway);
                },

                'PostsTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Posts());
                    return new TableGateway('posts', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\PostsTable' => function ($sm) {
                    $tableGateway = $sm->get('PostsTableGateway');
                    return new \Admin\Model\PostsTable($tableGateway);
                },

                'ManufacturerTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Manufacturer());
                    return new TableGateway('manufacturer', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ManufacturerTable' => function ($sm) {
                    $tableGateway = $sm->get('ManufacturerTableGateway');
                    return new \Admin\Model\ManufacturerTable($tableGateway);
                },
                'ProductSizeTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\ProductSize());
                    return new TableGateway('product_size', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductSizeTable' => function ($sm) {
                    $tableGateway = $sm->get('ProductSizeTableGateway');
                    return new \Admin\Model\ProductSizeTable($tableGateway);
                },
                'ProductSizeProductTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\ProductSizeProduct());
                    return new TableGateway('product_size_product', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductSizeProductTable' => function ($sm) {
                    $tableGateway = $sm->get('ProductSizeProductTableGateway');
                    return new \Admin\Model\ProductSizeProductTable($tableGateway);
                },
                'ProductAttributesTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\ProductAttributes());
                    return new TableGateway('product_attributes', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductAttributesTable' => function ($sm) {
                    $tableGateway = $sm->get('ProductAttributesTableGateway');
                    return new \Admin\Model\ProductAttributesTable($tableGateway);
                },
                'ProductAttributesProductTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\ProductAttributesProduct());
                    return new TableGateway('product_attributes_product', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductAttributesProductTable' => function ($sm) {
                    $tableGateway = $sm->get('ProductAttributesProductTableGateway');
                    return new \Admin\Model\ProductAttributesProductTable($tableGateway);
                },
                'CartTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Cart());
                    return new TableGateway('cart', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\CartTable' => function ($sm) {
                    $tableGateway = $sm->get('CartTableGateway');
                    return new \Admin\Model\CartTable($tableGateway);
                },
                'ConfigurationTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Configuration());
                    return new TableGateway('configuration', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ConfigurationTable' => function ($sm) {
                    $tableGateway = $sm->get('ConfigurationTableGateway');
                    return new \Admin\Model\ConfigurationTable($tableGateway);
                },
                'CommentTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Comment());
                    return new TableGateway('comment', $adapter, null, $resultSetPrototype);
                },
                'HistoryTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\History());
                    return new TableGateway('history', $adapter, null, $resultSetPrototype);
                },
                'PermissionTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Permission());
                    return new TableGateway('permission', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\PermissionTable' => function ($sm) {
                    $tableGateway = $sm->get('PermissionTableGateway');
                    return new \Admin\Model\PermissionTable($tableGateway);
                },
                'ImagePositionTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\ImagePosition());
                    return new TableGateway('image_position', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\CommentTable' => function ($sm) {
                    $tableGateway = $sm->get('CommentTableGateway');
                    return new \Admin\Model\CommentTable($tableGateway);
                },
                'TagsTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Tags());
                    return new TableGateway('tags', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\TagsTable' => function ($sm) {
                    $tableGateway = $sm->get('TagsTableGateway');
                    return new \Admin\Model\TagsTable($tableGateway);
                },
                'PagesTableGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\Pages());
                    return new TableGateway('pages', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\PagesTable' => function ($sm) {
                    $tableGateway = $sm->get('PagesTableGateway');
                    return new \Admin\Model\PagesTable($tableGateway);
                },
                'PostTagGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\PostTag());
                    return new TableGateway('post_tag', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\PostTagTable' => function ($sm) {
                    $tableGateway = $sm->get('PostTagGateway');
                    return new \Admin\Model\PostTagTable($tableGateway);
                },
                'ProductTagGateway' => function ($sm) {
                    $adapter = $sm->get('dbConfig');
                    $resultSetPrototype = new HydratingResultSet();
                    $resultSetPrototype->setHydrator(new ObjectProperty());
                    $resultSetPrototype->setObjectPrototype(new \Admin\Model\Entity\ProductTag());
                    return new TableGateway('product_tag', $adapter, null, $resultSetPrototype);
                },
                'Admin\Model\ProductTagTable' => function ($sm) {
                    $tableGateway = $sm->get('ProductTagGateway');
                    return new \Admin\Model\ProductTagTable($tableGateway);
                }
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'cmsLinkSort' => '\Zendvn\View\Helper\CmsLinkSort',
                'cmsInfoUser' => '\Zendvn\View\Helper\CmsInfoUser',
                'cmsInfoAuthor' => '\Zendvn\View\Helper\CmsInfoAuthor',
                'cmsLinkAdmin' => '\Zendvn\View\Helper\CmsLinkAdmin',
                'cmsButtonStatus' => '\Zendvn\View\Helper\CmsButtonStatus',
                'cmsButtonMove' => '\Zendvn\View\Helper\CmsButtonMove',
                'cmsButtonToolbar' => '\Zendvn\View\Helper\CmsButtonToolbar',
                'zvnFormHidden' => '\Zendvn\Form\View\Helper\FormHidden',
                'zvnFormSelect' => '\Zendvn\Form\View\Helper\FormSelect',
                'zvnFormInput' => '\Zendvn\Form\View\Helper\FormInput',
                'zvnFormButton' => '\Zendvn\Form\View\Helper\FormButton',
            )
        );
    }

    public function bootstrapSession($e)
    {
        $session = $e->getApplication()
            ->getServiceManager()
            ->get('Zend\Session\SessionManager');
        $session->start();

        $container = new Container('initialized');
        if (!isset($container->init)) {
            $serviceManager = $e->getApplication()->getServiceManager();
            $request = $serviceManager->get('Request');

            $session->regenerateId(true);
            $container->init = 1;
            $container->remoteAddr = $request->getServer()->get('REMOTE_ADDR');
            $container->httpUserAgent = $request->getServer()->get('HTTP_USER_AGENT');

            $config = $serviceManager->get('Config');
            if (!isset($config['session'])) {
                return;
            }

            $sessionConfig = $config['session'];
            if (isset($sessionConfig['validators'])) {
                $chain = $session->getValidatorChain();

                foreach ($sessionConfig['validators'] as $validator) {
                    switch ($validator) {
                        case 'Zend\Session\Validator\HttpUserAgent':
                            $validator = new $validator($container->httpUserAgent);
                            break;
                        case 'Zend\Session\Validator\RemoteAddr':
                            $validator = new $validator($container->remoteAddr);
                            break;
                        default:
                            $validator = new $validator();
                    }

                    $chain->attach('session.validate', array($validator, 'isValid'));
                }
            }
        }
    }
}