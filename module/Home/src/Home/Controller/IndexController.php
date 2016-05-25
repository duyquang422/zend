<?php

namespace Home\Controller;

use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;
use Zendvn\File\Image;
use Zendvn\System\Info;

class IndexController extends ActionController{

    protected $_params;

    public function init(){
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray()
        );
    }

    public function indexAction(){
        $this->_getHelper('HeadLink',$this->getServiceLocator())
                    ->appendStylesheet($this->basePath. '/public/template/frontend/css/index.css')
                    ->appendStylesheet($this->basePath. '/public/template/frontend/css/index.responsive.css');
        $this->_getHelper('HeadScript',$this->getServiceLocator())
            ->appendFile($this->basePath .'/public/template/frontend/js/jquery.countdown.js')
            ->appendFile($this->basePath .'/public/template/frontend/js/index.js');
        $this->_getHelper('HeadTitle',$this->getServiceLocator())->append($this->getConfiguration('site_name'));

        return new ViewModel();
    }

    public function updateKeyAction(){
        if($this->getRequest()->isPost())
            $this->updateConfiguration('key',$this->params()->fromPost('value'));
        return $this->response;
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
        if($this->getRequest()->isPost()) {
            $this->updateImgConfig('image_nav_left_homepage',$this->_params,'bannerMenu');
            return $this->response;
        }
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function editSlideshowAction(){
        if($this->getRequest()->isPost()) {
            $arrParam = array();
            $arrParam['id'] = $this->_params['id'];
            $arrParam['image'] = $this->_params['image'][$arrParam['id']];
            $this->updateImgConfig('images_slide_hometop',$arrParam,'slideshow');
            return $this->response;
        }
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function editLogoAction(){
        if($this->getRequest()->isPost()) {
            $getConfigNav = $this->getConfiguration('logo_image');
            if($getConfigNav)
                $filename = $this->uploadImg($getConfigNav, 'logo_image', $this->_params);
            else
                $filename = $this->uploadImg('', 'logo_image', $this->_params);
            $this->updateConfiguration('logo_image',$filename);
            echo json_encode($filename);
            return $this->response;
        }
        $viewModel = new ViewModel();
        $viewModel->setTemplate('home/index/edit-nav-left-homepage');
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function updateImgConfig($nameConfig,$arrParams,$task){
        $getConfigNav = json_decode($this->getConfiguration($nameConfig),true);
        if (isset($getConfigNav[$arrParams['id']]) && $getConfigNav[$arrParams['id']])
            $filename = $this->uploadImg($getConfigNav[$arrParams['id']], $task, $arrParams);
        else
            $filename = $this->uploadImg('', $task, $arrParams);

        $idCategory = $arrParams['id'];
        $data = array();
        $data = $getConfigNav;
        $data[$idCategory] = $filename;
        $this->updateConfiguration($nameConfig, json_encode($data));

        echo json_encode($filename);
    }

    public function uploadImg($filename,$task,$arrParam){
        if(isset($arrParam['image']['name']) && $arrParam['image']['name']) {
            if ($filename) {
                $imageObj = new Image();
                $imageObj->removeImage($filename, array('task' => $task));
            }
            $imageObj = new Image();
            $filename = $imageObj->upload('image', array('task' => $task));
            return $filename;
        }
    }
}