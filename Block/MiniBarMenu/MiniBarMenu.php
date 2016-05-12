<?php

namespace Block\MiniBarMenu;

use Zend\Session\Container;
use Zend\View\Helper\AbstractHelper;
use Zendvn\System\Info;

class MiniBarMenu extends AbstractHelper{
    protected $_data;
    protected $_productsTable;
    protected $_cartTable;

    public function __invoke(){
        require_once 'views/default.phtml';
    }

    public function setProductData($table){
        return $this->_productsTable = $table;
    }

    public function setCartData($table){
        return $this->_cartTable = $table;
    }

    //lấy ra các id sản phẩm đã mua từ user
    public function getBoughtProductIds(){
        $arrId = array();
        foreach($this->_cartTable->listItem('',array('task'=>'view-history')) as $val){
            if(gettype(json_decode($val->product_id)) == 'array')
                $arrId = array_merge($arrId,array_values(json_decode($val->product_id)));
            else
                $arrId = array_merge($arrId,array($val->product_id));
        }
        return $arrId;
    }

    public function getBoughtProducts(){
        if($this->getBoughtProductIds())
            return $this->_productsTable->getProducts($this->getBoughtProductIds(),array('task' => 'miniBarMenu'));
        else
            return;
    }

    public function getViewedProducts(){
        return $this->getCookie('arrViewedId');
    }
    //liệt kê danh sách các sản phẩm tương ứng với id được lưu trong cookie
    public function getCookie($nameCookie){
        if(isset($_COOKIE[$nameCookie])){
            $arrCookie = json_decode($_COOKIE[$nameCookie],true);
            $arrId = array();
            foreach ($arrCookie as $key => $value)
                if($value > 0)
                    $arrId[] = $value;
            return $this->_productsTable->getProducts($arrId,array('task'=> 'miniBarMenu'));
        }
        else
            return;
    }
    public function getProductsInCart(){
        $session = new Container(SECURITY_KEY . '_product');
        if($session->offsetExists('arrIdSanPhamTrongGioHang')){
            return $this->_productsTable->getProducts($session->offsetGet('arrIdSanPhamTrongGioHang'),array('task'=> 'miniBarMenu'));
        }else
            return;
    }

    public function getLikeProducts(){
        return $this->getCookie('arrLikeProductId');
    }

    public function getCompareProducts(){
        return $this->getCookie('arrCompareProductId');
    }
}