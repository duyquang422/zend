<?php

namespace Home\Controller;

use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;
use Zendvn\System\Info;

class IndexController extends ActionController{

    public function indexAction(){
        $this->_getHelper('HeadLink',$this->getServiceLocator())
                    ->appendStylesheet($this->basePath. '/public/template/frontend/css/item.home.css')
                    ->appendStylesheet($this->basePath. '/public/template/frontend/css/home.responsive.css');
        $this->_getHelper('HeadScript',$this->getServiceLocator())
            ->appendFile($this->basePath .'/public/template/frontend/js/jquery.countdown.js')
            ->appendFile($this->basePath .'/public/template/frontend/js/homepage.js');
        $this->_getHelper('HeadTitle',$this->getServiceLocator())->append($this->getConfiguration('site_name'));

        return new ViewModel();
    }

    public function searchAction(){
        if($this->getRequest()->isPost()) {
            $category = $this->getServiceLocator()->get('Home\Model\CategoryTable');
            $products = $this->getServiceLocator()->get('Home\Model\ProductsTable');
            $searchResult = array();
            $searchResult['category'] = $category->search($this->params()->fromPost('value'));
            $searchResult['product'] = $products->search($this->params()->fromPost('value'));
            $viewModel = new ViewModel(array(
                'searchResult' => $searchResult
            ));
            $viewModel->setTerminal(true);
            return $viewModel;
        }
        return $this->redirect()->toRoute('home');
    }

    public function loginAction(){
        if($this->identity()) $this->redirect()->toRoute('home');
        $authentication = $this->getServiceLocator()->get('authentication');
        if($authentication->login($this->params()->fromPost())){
            $userID     = $this->identity()->id;
            $groupID    = $this->identity()->group_id;
             
            $userTable          = $this->getServiceLocator()->get('Home\Model\UserTable');
            $groupTable         = $this->getServiceLocator()->get('Home\Model\GroupTable');
            $permissionTable    = $this->getServiceLocator()->get('Home\Model\PermissionTable');

            $userTable->updateLastSign($userID);

            $data['user']               = $userTable->getItem(array('id' => $userID), array('task' => 'store-user-info'));
            $data['group']              = $groupTable->getItem(array('id' => $groupID), array('task' => 'store-group-info'));
            $data['permission']['role']         = $data['group']->name;
            $data['permission']['privileges']   = $permissionTable->getItem($data['group'], array('task' => 'store-permission-info'));
             
            $infoObj        = new Info();
            $infoObj->storeInfo($data);
            echo json_encode(array('success' => 1,'group_id' => $this->identity()->group_id));
        }else{
            echo json_encode($authentication->getError());
        }
        return $this->response;
    }

    public function logOutAction(){
        $authentication = $this->getServiceLocator()->get('authentication');
        $infoObj        = new Info();
        $infoObj->destroyInfo();
        $authentication->logout();
        return $this->redirect()->toRoute('home');
    }

    public function signUpAction(){
        if($this->getServiceLocator()->get('Home\Model\UserTable')->saveItem($this->params()->fromPost(),array('task' => 'add-item')))
            echo json_encode(array('success' => 1));
        return $this->response;
    }

    public function getHistoriesAction(){
        $viewModel =  new ViewModel(array(
            'histories' => $this->getServiceLocator()->get('Home\Model\HistoryTable')->getHistorys()
        ));
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function changeLogoAction(){

    }

    public function editNavLeftHomepageAction(){
        if($this->getRequest()->isXmlHttpRequest()){

        }
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function upload($filename,$task){
        if($this->_params['image']['name']) {
            $filename = $this->getTable()->getImage($this->_params['id'])->image;
            if ($filename) {
                $imageObj = new Image();
                $imageObj->removeImage($filename, ['task' => $task]);
            }
            $imageObj = new Image();
            $filename = $imageObj->upload('image', ['task' => $task]);
            $this->getTable()->saveImage($this->_params['id'], $filename);
            echo json_encode($filename);
        }
    }
}