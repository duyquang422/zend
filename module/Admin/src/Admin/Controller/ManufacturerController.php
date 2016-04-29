<?php
namespace Admin\Controller;

use Admin\Form\Manufacturer;
use Zend\Validator\File\ImageSize;
use Zendvn\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Zendvn\File\Image;

class ManufacturerController extends ActionController
{
    public function init(){
        $this->_options['tableName']	= 'Admin\Model\ManufacturerTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray()
        );
    }

    public function indexAction(){
        $form = new Manufacturer();
        return new ViewModel([
            'form' => $form
        ]);
    }

    public function uploadAction(){
        if($this->getRequest()->isPost()){
            if($this->_params['picture']['name']) {
                $filename = $this->getTable()->getPicture($this->_params['id'])->picture;
                if ($filename) {
                    $imageObj = new Image();
                    $imageObj->removeImage($filename, ['task' => 'manufacturer']);
                }
                $imageObj = new Image();
                $filename = $imageObj->upload('picture', ['task' => 'manufacturer']);
                $this->getTable()->savePicture($this->_params['id'], $filename);
                echo json_encode($filename);
            }
        }
        return $this->response;
    }

    public function reloadAction(){
        $form = new Manufacturer();
        $viewModel = new ViewModel([
            'form' => $form
        ]);
        $viewModel->setTemplate('admin/manufacturer/index');
        $this->layout('layout/reload');
        return $viewModel;
    }

    public function editAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->_params['modified_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params,['task' => 'edit-item']);
        }
        return $this->response;
    }

    public function getManufacturerAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            echo json_encode($this->getTable()->getManufacturer($this->_params['id']));
        }
        return $this->response;
    }

    public function loadConfigDataTablesAction() {
        $columns = array(
            array('db' => 'id', 'dt' => 'id','field' => 'id'),
            array('db' => 'name', 'dt' => 'name','field' => 'name'),
            array('db' => 'description', 'dt' => 'description','field' => 'description'),
            array('db' => 'picture', 'dt' => 'picture','field' => 'picture'),
            array('db' => 'status', 'dt' => 'status','field' => 'status'),
            array('db' => 'hits', 'dt' => 'hits','field' => 'hits'),
        );
        $this->datatables('hz_manufacturer', 'id', $columns);
        return $this->response;
    }

    public function statusAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->changeStatus($this->params()->fromQuery(), array('task' => 'change-status'));
        }
        return $this->response;
    }

    public function moveAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->moveItem($this->params()->fromPost());
        }
        return $this->response;
    }
    public function multiStatusAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->changeStatus($this->params()->fromQuery(), array('task' => 'change-multi-status'));
        }
        return $this->response;
    }

    public function deleteAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->deleteItem($this->_params);
        }
        return $this->response;
    }

    public function addAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            if(isset($this->_params['picture']) && $this->_params['picture']['name']){
                $imageObj = new Image();
                $this->_params['picture'] = $imageObj->upload('picture',['task' => 'manufacturer']);
            }
            $this->_params['created_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params,['task' => 'add-item']);
        }
        return $this->response;
    }
}
