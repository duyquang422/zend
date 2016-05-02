<?php
namespace Admin\Controller;

use Zendvn\Controller\ActionController;

class ConfigController extends ActionController
{
    public function init(){
        $this->_options['tableName'] = 'Admin\Model\ConfigurationTable';
    }
    public function indexAction()
    {
        $this->_getHelper('HeadLink',$this->getServiceLocator())
            ->appendStylesheet($this->basePath. '/public/template/backend/css/config.css');
    }
    public function updateMultiAction(){
        if($this->getRequest()->isXmlHttpRequest())
            $this->getTable()->update($this->params()->fromQuery(),'multi');
        return $this->response;
    }
    public function emailAction()
    {
    	return false;
    }
    
    public function imageAction()
    {
    	return false;
    }

    public function updateAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            $this->getTable()->update($this->params()->fromQuery());
            var_dump($this->params()->fromQuery());
        }
        return $this->response;
    }
}
