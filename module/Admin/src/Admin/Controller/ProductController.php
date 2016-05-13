<?php
namespace Admin\Controller;

use Admin\Form\Product;
use Zend\Session\Container;
use Zendvn\Controller\ActionController;
use Zend\View\Model\ViewModel;
use ZendVN\DirectAdmin\DirectAdmin;
use Zendvn\File\Image;

class ProductController extends ActionController
{
    protected $strImg;
    protected $params;

    public function init(){
        $this->_options['tableName'] = 'Admin\Model\ProductsTable';

        $this->_params	= array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray()
        );
    }

    public function indexAction(){
        $slbCategory	= $this->getServiceLocator()->get('Admin\Model\CategoryTable');
        $slbManufacturer = $this->getServiceLocator()->get('Admin\Model\ManufacturerTable');
        $form = new Product();
        return new ViewModel(array(
            'form' => $form,
            'itemSelectBox' => $slbCategory->listItem('',array('task' => 'list-item')),
            'slbManufacturer' => $slbManufacturer->slbManufacturer()->toArray()
        ));
    }

    public function uploadAction(){
        if($this->getRequest()->isPost()){
            if($this->_params['image']['name']) {
                $filename = $this->getTable()->getImage($this->_params['id'])->image;
                if ($filename) {
                    $imageObj = new Image();
                    $imageObj->removeImage($filename, array('task' => 'product'));
                }
                $imageObj = new Image();
                $filename = $imageObj->upload('image', array('task' => 'product'));
                $this->getTable()->saveImage($this->_params['id'], $filename);
                echo json_encode($filename);
            }
        }
        return $this->response;
    }

    public function addAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            if(isset($this->_params['image']) && $this->_params['image']['name']){
                $imageObj = new Image();
                $this->_params['imageName'] = $imageObj->upload('image',array('task' => 'product'));
            }
            $this->_params['created_by'] = $this->identity()->username;
            $this->getTable()->saveItem($this->_params);
        }
        return $this->response;
    }

    public function getProductAction()
    {
        $session = new Container('uploadImg');
        if($session->offsetExists('strImg'))
            $session->offsetUnset('strImg');
        $session = new Container('uploadZoomImg');
        if($session->offsetExists('strImg'))
            $session->offsetUnset('strImg');
        $product = array();
        $product = $this->getTable()->getProduct($_POST['id']);
        $product = $product[0];
        $product['productSize'] = $this->getServiceLocator()->get('Admin\Model\ProductSizeProductTable')->getProductSize($_POST['id']);
        $product['productAttributes'] = $this->getServiceLocator()->get('Admin\Model\ProductAttributesProductTable')->getProductAttributes($_POST['id']);
        if($this->getRequest()->isXmlHttpRequest()){
            echo json_encode(array(
                'product' => $product,
                'tags' => $this->getTable()->getTag($this->_params['id']),
                'categories' => $this->getServiceLocator()->get('Admin\Model\CategoryTable')->listItem()
            ));
        }
        return $this->response;
    }

    public function reloadAction(){
        $slbCategory = $this->getServiceLocator()->get('Admin\Model\CategoryTable');
        $slbManufacturer = $this->getServiceLocator()->get('Admin\Model\ManufacturerTable');
        $form = new Product();
        $viewModel = new ViewModel(array(
            'form' => $form,
            'itemSelectBox' => $slbCategory->listItem('',array('task' => 'list-item')),
            'slbManufacturer' => $slbManufacturer->slbManufacturer()->toArray()
        ));
        $viewModel->setTemplate('admin/product/index');
        $this->layout('layout/reload');
        return  $viewModel;
    }

    public function uploadImgAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            $session = new Container('uploadImg');
            if (!empty($_FILES['file']['tmp_name'])) {
                $imageObj = new Image();
                $filename = $imageObj->upload('file', array('task' => 'product-slide'));
                if($session->offsetExists('strImg')) {
                    $tmp = $session->offsetGet('strImg');
                    $session->offsetSet('strImg', $tmp . ',' . $filename);
                }else {
                    $session->offsetSet('strImg', $filename);
                }
                if($this->_params['strPicture']){
                    $picture = $this->_params['strPicture'] . ',' . $session->offsetGet('strImg');
                }else{
                    $picture = $session->offsetGet('strImg');
                }
            }
            $this->getTable()->update(array('id' => $this->_params['id'], 'picture' => $picture),array('task' => 'update-picture'));
            echo json_encode(array('success' => 1));
        }
        return $this->response;
    }

    public function uploadZoomImgAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            $session = new Container('uploadZoomImg');
            if (!empty($_FILES['file']['tmp_name'])) {
                $imageObj = new Image();
                $filename = $imageObj->upload('file', array('task' => 'product'));
                if($session->offsetExists('strImg')) {
                    $tmp = $session->offsetGet('strImg');
                    $session->offsetSet('strImg', $tmp . ',' . $filename);
                }else {
                    $session->offsetSet('strImg', $filename);
                }
                if($this->_params['strPicture']){
                    $picture = $this->_params['strPicture'] . ',' . $session->offsetGet('strImg');
                }else{
                    $picture = $session->offsetGet('strImg');
                }
            }
            $this->getTable()->update(array('id' => $this->_params['id'], 'zoom_image' => $picture),array('task' => 'update-zoom-image'));
            echo json_encode(array('success' => 1));
        }
        return $this->response;
    }

    public function removeImgAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $imageObj = new Image();
            $imageObj->removeImage($this->_params['fileName'],array('task' => 'product'));
            $this->getTable()->update(array('id'=> $this->_params['id'],'picture' => $this->_params['strPicture']),array('task' => 'update-picture'));
        }
        return $this->response;
    }

    public function removeZoomImgAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $imageObj = new Image();
            $imageObj->removeImage($this->_params['fileName'],array('task' => 'product'));
            $this->getTable()->update(array('id'=> $this->_params['id'],'zoom_image' => $this->_params['strPicture']),array('task' => 'update-zoom-image'));
        }
        return $this->response;
    }

    public function loadConfigDataTablesAction() {
        $joinQuery = "FROM `products` AS `p`
                    LEFT JOIN `category` AS `c` ON (`p`.`category_id` = `c`.`id`)
                    LEFT JOIN manufacturer AS m ON (m.id = p.trademark)";
        $columns = array(
            array('db' => 'p.id', 'dt' => 'id','field' => 'id'),
            array('db' => 'p.name', 'dt' => 'name','field' => 'name'),
            array('db' => 'p.alias', 'dt' => 'alias','field' => 'alias'),
            array('db' => 'p.code', 'dt' => 'code','field' => 'code'),
            array('db' => 'p.image', 'dt' => 'image','field' => 'image'),
            array('db' => 'p.trademark', 'dt' => 'trademark','field' => 'trademark'),
            array('db' => 'p.price', 'dt' => 'price','field' => 'price'),
            array('db' => 'p.hot', 'dt' => 'hot','field' => 'hot'),
            array('db' => 'p.deal', 'dt' => 'deal','field' => 'deal'),
            array('db' => 'p.sale_off', 'dt' => 'sale_off','field' => 'sale_off'),
            array('db' => 'p.status', 'dt' => 'status','field' => 'status'),
            array('db' => 'p.hits', 'dt' => 'hits','field' => 'hits'),
            array('db' => 'c.name', 'dt' => 'cname','field' => 'cname', 'as' => 'cname'),
            array('db' => 'm.name', 'dt' => 'mname','field' => 'mname', 'as' => 'mname')
        );
        $this->datatables('products', 'id', $columns, $joinQuery ,'p.id > 1');
        return $this->response;
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

    public function deleteAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->deleteItem($this->_params);
        }
        return $this->response;
    }

    public function deleteSizeAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getServiceLocator()->get('Admin\Model\ProductSizeProductTable')->deleteItem($this->_params);
        }
        return $this->response;
    }

    public function deleteAttributesAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getServiceLocator()->get('Admin\Model\ProductAttributesProductTable')->deleteItem($this->_params);
        }
        return $this->response;
    }

    public function statusAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->changeStatus($this->params()->fromQuery(), array('task' => 'change-status'));
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

    public function hotAction()
    {
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getTable()->changeHot($this->params()->fromQuery());
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

    public function searchSizeAction(){
        $sizeProduct = $this->getServiceLocator()->get('admin\Model\ProductSizeTable');
        echo json_encode($sizeProduct->search($this->params()->fromPost(),array('task' => 'search')));
        return $this->response;
    }

    public function searchAttributesAction(){
        $attributesProduct = $this->getServiceLocator()->get('admin\Model\ProductAttributesTable');
        echo json_encode($attributesProduct->search($this->params()->fromPost(),array('task' => 'search')));
        return $this->response;
    }

    public function addSizeToProductAction(){
        echo json_encode((int)$this->getServiceLocator()->get('admin\Model\ProductSizeProductTable')->saveData($this->params()->fromPost()));
        return $this->response;
    }

    public function addAttributesToProductAction(){
        echo json_encode((int)$this->getServiceLocator()->get('admin\Model\ProductAttributesProductTable')->saveData($this->params()->fromPost()));
        return $this->response;
    }

    public function addSizeAction(){
        $productSize = $this->getServiceLocator()->get('admin\Model\ProductSizeTable');
        if(!$productSize->search($this->params()->fromPost(),array('task' => 'check-exits')))
            echo json_encode((int)$productSize->saveData($this->params()->fromPost()));
        return $this->response;
    }

    public function addAttributesAction(){
        $productAttributes = $this->getServiceLocator()->get('admin\Model\ProductAttributesTable');
        if(!$productAttributes->search($this->params()->fromPost(),array('task' => 'check-exits')))
            echo json_encode((int)$productAttributes->saveData($this->params()->fromPost()));
        return $this->response;
    }

    public function changeStatusProductSizeAction(){
        $this->getServiceLocator()->get('admin\Model\ProductSizeProductTable')->changeStatus($this->params()->fromPost());
        return $this->response;
    }

    public function changeStatusProductAttributesAction(){
        $this->getServiceLocator()->get('admin\Model\ProductAttributesProductTable')->changeStatus($this->params()->fromPost());
        return $this->response;
    }

    public function searchTagAction(){
        $sizeProduct = $this->getServiceLocator()->get('admin\Model\TagsTable');
        echo json_encode($sizeProduct->search($this->params()->fromPost(),array('task' => 'search')));
        return $this->response;
    }

    public function addTagToPostAction(){
        if($this->getRequest()->isXmlHttpRequest()) {
            $productTag = $this->getServiceLocator()->get('admin\Model\ProductTagTable');
            $arrParam = $this->params()->fromPost();
            $item = $productTag->getItem($arrParam);
            if ($item) {
                echo json_encode(0);
            } else {
                echo json_encode((int)$productTag->saveData($this->params()->fromPost()));
            }
        }
        return $this->response;
    }

    public function deleteTagFromPostAction(){
        if($this->getRequest()->isXmlHttpRequest()){
            $this->getServiceLocator()->get('Admin\Model\ProductTagTable')->deleteItem($this->params()->fromPost('id'));
        }
        return $this->response;
    }
}
