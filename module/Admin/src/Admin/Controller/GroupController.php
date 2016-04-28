<?php

namespace Admin\Controller;

use Admin\Form\Group;
use Zendvn\Controller\ActionController;
use Zend\View\Model\ViewModel;

class GroupController extends ActionController {

    public function init() {
        // OPTIONS
        $this->_options['tableName'] = 'Admin\Model\GroupTable';
        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray()
        );
    }

    public function indexAction() {
        $permission = $this->getServiceLocator()->get('Admin\Model\PermissionTable');
        return new ViewModel(array(
           'form' => new Group(),
            'permissions' => $permission->getAll()
        ));
    }

    public function deleteAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->deleteItem($this->_params);
        }
        return $this->response;
    }

    public function getItemAction(){
        $group = $this->getTable()->getGroup($this->params()->fromPost('id'));
        echo json_encode(array(
            'name' => $group[0]['name'],
            'permission' => json_decode($group[0]['permission_id'])
            ));
        return $this->response;
    }

    //load dữ liệu từ jquery datatables
    public function loadConfigDataTablesAction() {
        $columns = array(
            array('db' => 'id', 'dt' => 'id'),
            array('db' => 'name', 'dt' => 'name'),
            array('db' => 'created', 'dt' => 'created'),
            array('db' => 'created_by', 'dt' => 'created_by'),
            array('db' => 'modified', 'dt' => 'modified'),
            array('db' => 'modified_by', 'dt' => 'modified_by'),
            array('db' => 'status', 'dt' => 'status')
        );
        $this->datatables('group', 'id', $columns);
        return $this->response;
    }

    public function addAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->_params['created_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params,['task' => 'add-item']);
        }
        return $this->response;
    }

    public function statusAction() {
        if ($this->getRequest()->isXmlHttpRequest()){
            echo json_encode($this->getTable()->changeStatus($this->params()->fromQuery(), array('task' => 'change-status')));
        }
        return $this->response;
    }
    
    public function updateAction() {
        if ($this->getRequest()->isXmlHttpRequest()) {
                echo json_encode($this->getTable()->updateName($this->_params['data']));
        }
        return $this->response;
    }

    public function editAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->_params['modified_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params,['task' => 'edit-item']);
        }
        return $this->response;
    }
}
