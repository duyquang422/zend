<?php
namespace Admin\Controller;

use Admin\Form\Category;
use Zend\Mvc\Controller\AbstractActionController;
use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zendvn\File\Image;

class CategoryController extends ActionController
{
    public function init(){
        $this->_options['tableName']	= 'Admin\Model\CategoryTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray()
        );
    }

    public function indexAction(){
        $form = new Category();
        return new ViewModel([
            'form' => $form,
            'itemSelectBox' => $this->getTable()->listItem('',array('task' => 'list-item'))->toArray()
        ]);
    }

    public function uploadAction(){
        if($this->getRequest()->isPost()){
            if($this->_params['image']['name']) {
                $filename = $this->getTable()->getImage($this->_params['id'])->image;
                if ($filename) {
                    $imageObj = new Image();
                    $imageObj->removeImage($filename, ['task' => 'category']);
                }
                $imageObj = new Image();
                $filename = $imageObj->upload('image', ['task' => 'category']);
                $this->getTable()->saveImage($this->_params['id'], $filename);
                echo json_encode($filename);
            }
        }
        return $this->response;
    }

    public function reloadAction(){
        $form = new Category();
        $viewModel = new ViewModel([
            'form' => $form,
            'itemSelectBox' => $this->getTable()->listItem('',array('task' => 'list-item'))->toArray()
        ]);
        $viewModel->setTemplate('admin/category/index');
        $this->layout('layout/reload');
        return $viewModel;
    }

    public function editAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $arrParams = $_GET;
            $arrParams['description'] = $_POST['description'];
            $arrParams['modified_by'] = $this->identity()->username;
            $this->getTable()->saveItem($arrParams,['task' => 'edit-item']);
        }
        return $this->response;
    }

    public function getCategoryAction(){
        echo json_encode($this->getTable()->getItem($this->params()->fromPost()));
        return $this->response;
    }
    
    public function loadConfigDataTablesAction() {
        $joinQuery = "FROM `hz_category` AS `ca` LEFT JOIN `hz_category` AS `c` ON (`ca`.`parent` = `c`.`id`)";
        $columns = array(
            array('db' => 'ca.id', 'dt' => 'id','field' => 'id'),
            array('db' => 'ca.name', 'dt' => 'name','field' => 'name'),
            array('db' => 'ca.alias', 'dt' => 'alias','field' => 'alias'),
            array('db' => 'ca.description', 'dt' => 'description','field' => 'description'),
            array('db' => 'ca.image', 'dt' => 'image','field' => 'image'),
            array('db' => 'ca.status', 'dt' => 'status','field' => 'status'),
            array('db' => 'ca.parent', 'dt' => 'parent','field' => 'parent'),
            array('db' => 'ca.level', 'dt' => 'level','field' => 'level'),
            array('db' => 'ca.left', 'dt' => 'left','field' => 'left'),
            array('db' => 'ca.right', 'dt' => 'right','field' => 'right'),
            array('db' => 'ca.special', 'dt' => 'special','field' => 'special'),
            array('db' => 'c.left', 'dt' => 'pleft','field' => 'pleft', 'as' => 'pleft'),
            array('db' => 'c.right', 'dt' => 'pright','field' => 'pright', 'as' => 'pright'),
        );
        $this->datatables('hz_category', 'id', $columns, $joinQuery ,'ca.id > 1');
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
            $this->getTable()->deleteItem($this->params()->fromPost());
            $filename = $this->getTable()->getImage($this->_params['id'])->image;
            if ($filename) {
                $imageObj = new Image();
                $imageObj->removeImage($filename, ['task' => 'category']);
            }
    	}
        return $this->response;
    }

    public function addAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            if($this->_params['image']['name']){
                $imageObj = new Image();
                $this->_params['imageName'] = $imageObj->upload('image',['task' => 'category']);
            }
            $this->_params['created_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params,['task' => 'add-item']);
        }
        return $this->response;
    }
    public function specialAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->changeSpecialStatus($this->params()->fromQuery());
        }
        return $this->response;
    }
}
