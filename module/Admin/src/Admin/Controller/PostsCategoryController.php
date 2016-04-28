<?php
namespace Admin\Controller;

use Admin\Form\PostsCategory;
use Zendvn\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Zendvn\File\Image;

class PostsCategoryController extends ActionController
{
    public function init(){
        $this->_options['tableName']	= 'Admin\Model\PostsCategoryTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray()
        );
    }

    public function indexAction(){
        $form = new PostsCategory();
        return new ViewModel(array(
            'form' => $form,
            'itemSelectBox' => $this->getTable()->listItem('',array('task' => 'list-item'))->toArray()
        ));
    }
    public function uploadAction(){
        if($this->getRequest()->isPost()){
            if($this->_params['image']['name']) {
                $filename = $this->getTable()->getImage($this->_params['id'])->image;
                if ($filename) {
                    $imageObj = new Image();
                    $imageObj->removeImage($filename, array('task' => 'posts-category'));
                }
                $imageObj = new Image();
                $filename = $imageObj->upload('image', array('task' => 'posts-category'));
                $this->getTable()->saveImage($this->_params['id'], $filename);
                echo json_encode($filename);
            }
        }
        return $this->response;
    }

    public function reloadAction(){
        $form = new PostsCategory();
        $viewModel = new ViewModel(array(
            'form' => $form,
            'itemSelectBox' => $this->getTable()->listItem('',array('task' => 'list-item'))->toArray()
        ));
        $viewModel->setTemplate('admin/posts-category/index');
        $this->layout('layout/reload');
        return $viewModel;
    }

    public function editAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $arrParams = $_GET;
            $arrParams['description'] = $_POST['description'];
            $this->_params['modified_by'] = $this->identity()->username;
            $this->getTable()->saveItem($arrParams,array('task' => 'edit-item'));
        }
        return $this->response;
    }

    public function getCategoryAction(){
        echo json_encode($this->getTable()->getItem($this->params()->fromPost()));
        return $this->response;
    }

    public function loadConfigDataTablesAction() {
        $joinQuery = "FROM `posts_category` AS `ca`
                      LEFT JOIN `posts_category` AS `c` ON (`ca`.`parent` = `c`.`id`)";
        $columns = array(
            array('db' => 'ca.id', 'dt' => 'id','field' => 'id'),
            array('db' => 'ca.name', 'dt' => 'name','field' => 'name'),
            array('db' => 'ca.description', 'dt' => 'description','field' => 'description'),
            array('db' => 'ca.status', 'dt' => 'status','field' => 'status'),
            array('db' => 'ca.parent', 'dt' => 'parent','field' => 'parent'),
            array('db' => 'ca.level', 'dt' => 'level','field' => 'level'),
            array('db' => 'ca.left', 'dt' => 'left','field' => 'left'),
            array('db' => 'ca.right', 'dt' => 'right','field' => 'right'),
            array('db' => 'ca.hits', 'dt' => 'hits','field' => 'hits'),
            array('db' => 'ca.image', 'dt' => 'image','field' => 'image'),
            array('db' => 'c.left', 'dt' => 'pleft','field' => 'pleft', 'as' => 'pleft'),
            array('db' => 'c.right', 'dt' => 'pright','field' => 'pright', 'as' => 'pright'),
        );
        $this->datatables('posts_category', 'id', $columns, $joinQuery ,'ca.id > 1');
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
            $filename = $this->getTable()->getImage($this->_params['id'])->image;
            if ($filename) {
                $imageObj = new Image();
                $imageObj->removeImage($filename, array('task' => 'posts-category'));
            }
            $this->getTable()->deleteItem($this->params()->fromPost());
        }
        return $this->response;
    }

    public function addAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            if($this->_params['image']['name']){
                $imageObj = new Image();
                $this->_params['imageName'] = $imageObj->upload('image',array('task' => 'posts-category'));
            }
            $this->_params['created_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params,array('task' => 'add-item'));
        }
        return $this->response;
    }
}
