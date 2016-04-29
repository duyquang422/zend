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
        var_dump($this->getConfiguration('SITE_NAME'));
    }
    public function updateAction(){
        $this->getTable()->update($this->params()->fromQuery());
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
    
}
