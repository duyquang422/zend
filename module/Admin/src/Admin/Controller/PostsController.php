<?php
namespace Admin\Controller;

use Admin\Form\Posts;
use Zendvn\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Zendvn\File\Image;

class PostsController extends ActionController
{
    public function init(){
        $this->_options['tableName']	= 'Admin\Model\PostsTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray()
        );
    }

    public function searchTagAction(){
        $sizeProduct = $this->getServiceLocator()->get('admin\Model\TagsTable');
        echo json_encode($sizeProduct->search($this->params()->fromPost(),array('task' => 'search')));
        return $this->response;
    }

    public function addTagToPostAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            $postTag = $this->getServiceLocator()->get('admin\Model\PostTagTable');
            $arrParam = $this->params()->fromPost();
            $item = $postTag->getItem($arrParam);
            if ($item) {
                echo json_encode(0);
            } else {
                echo json_encode((int)$postTag->saveData($this->params()->fromPost()));
            }
        }
        return $this->response;
    }

    public function addTagAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            $arrParam = $this->params()->fromPost();
            $tagId = $this->getServiceLocator()->get('admin\Model\TagsTable')->saveItem($arrParam,array('task' => 'add-item'));
            $this->getServiceLocator()->get('admin\Model\PostTagTable')->saveData(array('post_id' => $arrParam['id'],'tag_id' => $tagId));
            echo json_encode($this->getTable()->getTag($arrParam['id']));
        }
        return $this->response;
    }

    public function indexAction(){
        $slbCategory = $this->getServiceLocator()->get('Admin\Model\PostsCategoryTable');
        $form = new Posts();
        return new ViewModel(array(
            'form' => $form,
            'itemSelectBox' => $slbCategory->listItem('',array('task' => 'list-item'))->toArray()
        ));
    }

    public function deleteTagFromPostAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getServiceLocator()->get('Admin\Model\PostTagTable')->deleteItem($this->params()->fromPost('id'));
        }
        return $this->response;
    }

    public function uploadAction(){
        if($this->getRequest()->isPost()){
            if($this->_params['image']['name']) {
                $filename = $this->getTable()->getImage($this->_params['id'])->image;
                if ($filename) {
                    $imageObj = new Image();
                    $imageObj->removeImage($filename, array('task' => 'posts'));
                }
                $imageObj = new Image();
                $filename = $imageObj->upload('image', array('task' => 'posts'));
                $this->getTable()->saveImage($this->_params['id'], $filename);
                echo json_encode($filename);
            }
        }
        return $this->response;
    }

    public function reloadAction(){
        $slbCategory = $this->getServiceLocator()->get('Admin\Model\PostsCategoryTable');
        $form = new Posts();
        $viewModel = new ViewModel(array(
            'form' => $form,
            'itemSelectBox' => $slbCategory->listItem('',array('task' => 'list-item'))->toArray()
        ));
        $viewModel->setTemplate('admin/posts/index');
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

    public function getPostsAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            echo json_encode(array('post' => $this->getTable()->getPosts($this->_params['id']),'tags' => $this->getTable()->getTag($this->_params['id'])));
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

    public function loadConfigDataTablesAction() {
        $joinQuery = "FROM `posts` AS `p` LEFT JOIN `posts_category` AS `c` ON (`p`.`category_id` = `c`.`id`)";
        $columns = array(
            array('db' => 'p.id', 'dt' => 'id','field' => 'id'),
            array('db' => 'p.name', 'dt' => 'name','field' => 'name'),
            array('db' => 'p.image', 'dt' => 'postsImage','field' => 'postsImage','as' => 'postsImage'),
            array('db' => 'p.description', 'dt' => 'description','field' => 'description'),
            array('db' => 'p.special', 'dt' => 'special','field' => 'special'),
            array('db' => 'p.hits', 'dt' => 'phits','field' => 'phits','as' => 'phits'),
            array('db' => 'p.status', 'dt' => 'status','field' => 'status'),
            array('db' => 'c.name', 'dt' => 'cname','field' => 'cname', 'as' => 'cname'),
        );
        $this->datatables('posts', 'id', $columns, $joinQuery ,'p.id >= 1');
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
                $imageObj->removeImage($filename, array('task' => 'posts'));
            }
            $this->getTable()->deleteItem($this->params()->fromPost());
        }
        return $this->response;
    }

    public function addAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            if(isset($this->_params['image']) && $this->_params['image']['name']){
                $imageObj = new Image();
                $this->_params['imageName'] = $imageObj->upload('image',array('task' => 'posts'));
            }
            $this->_params['created_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params,array('task' => 'add-item'));
        }
        return $this->response;
    }
}
