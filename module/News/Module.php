<?php
namespace News;

use Block\NewNews\NewNews;
use News\Model\PostsCategoryTable;
use News\Model\PostsTable;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

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
                'News\Model\PostsCategoryTable' => function ($sm) {
                    $tableGateway = $sm->get('PostsCategoryTableGateway');
                    return new PostsCategoryTable($tableGateway);
                },
                'News\Model\PostsTable' => function ($sm) {
                    $tableGateway = $sm->get('PostsTableGateway');
                    return new PostsTable($tableGateway);
                },
            )
        );
    }

    public function getViewHelperConfig(){
        return array(
            'invokables' => array(
                'headerNews' => 'Block\HeaderNews\HeaderNews',
                'menuNews' => 'Block\MenuNews\MenuNews'
            ),
            'factories' => array(
                'newNews' => function($sm){
                    $helper = new NewNews();
                    $helper->getPostsTable($sm->getServiceLocator()->get('News\Model\PostsTable'));
                    return $helper;
                }
            )
        );
    }
}