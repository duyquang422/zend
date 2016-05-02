<?php
namespace Admin\Controller;

use Zend\Validator\StringLength;
use Zendvn\Controller\ActionController;

use Zend\Mvc\Controller\AbstractActionController;

class CartController extends ActionController
{
	public function init(){
        $this->_options['tableName'] = 'Admin\Model\CartTable';
    }

    public function indexAction()
    {
    	$this->getTable()->updateStatus('','process');
        $this->getTable()->updateStatus($this->params()->fromPost('id'),'pending');
    }
    
    public function loadConfigDataTablesAction() {
        $columns = array(
            array('db' => 'id', 'dt' => 'id'),
            array('db' => 'code', 'dt' => 'code'),
            array('db' => 'product_id', 'dt' => 'product_id'),
            array('db' => 'voucher', 'dt' => 'voucher'),
            array('db' => 'total_money', 'dt' => 'total_money'),
            array('db' => 'user_id', 'dt' => 'user_id'),
            array('db' => 'customer_name', 'dt' => 'customer_name'),
            array('db' => 'phone', 'dt' => 'phone'),
            array('db' => 'email', 'dt' => 'email'),
            array('db' => 'note', 'dt' => 'note'),
            array('db' => 'shipping_address', 'dt' => 'shipping_address'),
            array('db' => 'status', 'dt' => 'status'),
            array('db' => 'time_order', 'dt' => 'time_order')
        );
        $this->datatables('cart', 'id', $columns);
        return $this->response;
    }

    public function viewCartAction(){
        if($this->getRequest()->isPost()) {
            $order = $this->getTable()->getOrder($this->params()->fromPost('id'));
            $this->getTable()->updateStatus($this->params()->fromPost('id'),'pending');
            $product = $this->getServiceLocator()->get('Admin\Model\ProductsTable');
            $productOfOrder = array();
            if(gettype(json_decode($order->product_id)) == 'array') {
                for ($i = 0; $i < count(json_decode($order->product_id)); $i++) {
                    $productOfOrder['product'][$i] = $product->getProductFromOder(json_decode($order->product_id)[$i]);
                    $productOfOrder['product'][$i]->size = json_decode($order->size_name)[$i];
                    $productOfOrder['product'][$i]->quantity = json_decode($order->quantity)[$i];
                    $productOfOrder['product'][$i]->price = json_decode($order->price)[$i];
                }
            }else{
                $productOfOrder['product'] = $product->getProductFromOder($order->product_id);
                $productOfOrder['product']->size = $order->size_name;
                $productOfOrder['product']->quantity = $order->quantity;
                $productOfOrder['product']->price = $order->price;
            }
            $productOfOrder['customer'] = $order;
            echo json_encode($productOfOrder);
        }
        return $this->response;
    }

    public function orderCanceledAction(){
        $this->getTable()->updateStatus($this->params()->fromPost('id'),'canceled');
        return $this->response;
    }

    public function orderShippingAction(){
        $this->getTable()->updateStatus($this->params()->fromPost('id'),'shipping');
        return $this->response;
    }

    public function orderCompleteAction(){
        $this->getTable()->updateStatus($this->params()->fromPost('id'),'complete');
        return $this->response;
    }

}
