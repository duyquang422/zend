<?php

namespace Home\Controller;
use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;

class CategoryController extends ActionController{
    public function init(){
        $this->_options['tableName'] = 'Home\Model\ProductsTable';
    }
    public function indexAction(){
        $this->_getHelper('HeadLink',$this->getServiceLocator())
            ->appendStylesheet('/public/template/frontend/css/jquery-ui.min.css')
            ->appendStylesheet('/public/template/frontend/css/item.category.css');
        $this->_getHelper('HeadScript',$this->getServiceLocator())
            ->appendFile('/public/template/frontend/js/jquery-ui.min.js')
            ->appendFile('/public/template/frontend/js/category.js');
        $arrParams = $this->params()->fromRoute();
        $category = $this->getServiceLocator()->get('Home\Model\CategoryTable');
        $this->_getHelper('HeadTitle',$this->getServiceLocator())->append($category->getCategory($arrParams['id'])->name);
        return new ViewModel([
            'id' => $arrParams['id'],
            'category' => $category->getCategory($arrParams['id']),
            'parentCategory' => $category->getParentCategory($category->getCategory($arrParams['id'])->parent),
            'products' => $this->getTable()->getProductsByCategory($arrParams)
        ]);
    }

    public function countComment(){
        return $this->response;
    }

    public function loginAction(){
        $authentication = $this->getServiceLocator()->get('authentication');
        if($authentication->login($this->params()->fromPost()))
            echo json_encode(array('success' => 1));
        else
            echo json_encode($authentication->getError());
        return $this->response;
    }

    public function sortByAction(){
        if($this->getRequest()->isPost()){
            $viewModel = new ViewModel();
            $viewModel->setTerminal(true);
            return $viewModel->setVariable(
                'products' , $this->getTable()->getProductsByCategory($this->params()->fromPost(),['task' => 'filter'])
            );
        }
        return $this->response;
    }
}