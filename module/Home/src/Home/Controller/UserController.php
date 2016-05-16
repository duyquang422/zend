<?php

namespace Home\Controller;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;
use Zendvn\Controller\ActionController;
use Zendvn\File\Image;

class UserController extends ActionController{
	public function init(){
        $this->_options['tableName'] = 'Home\Model\UserTable';
		$this->_getHelper('HeadLink',$this->getServiceLocator())
                    ->appendStylesheet($this->basePath . '/public/template/frontend/css/item.user.css');
	    $this->_params  = array_merge(
            $this->params()->fromQuery(),
            $this->getRequest()->getPost()->toArray(),
            $this->getRequest()->getFiles()->toArray()
        );
    }

	public function indexAction(){
		$arrParams = $this->params()->fromPost();
		$arrParams['id'] = $this->identity()->id;
		if($this->getRequest()->isPost()){
			$this->getTable()->saveItem($arrParams,['task'=> 'update-item']);
			$user = $this->identity();
			$user->username = $arrParams['username'];
			$user->phone = $arrParams['phone'];
			$user->sex = $arrParams['sex'];
            $user->address = $arrParams['address'];
            $user->group_id = $this->identity()->group_id;
			$user->birthday = $arrParams['year'] . '-' . $arrParams['month'] . '-' . $arrParams['day'];
		      if($this->_params['image']['name']) {
                $filename = $this->getTable()->getAvatar($arrParams['id'])->avatar;
                if ($filename) {
                    $imageObj = new Image();
                    $imageObj->removeImage($filename, array('task' => 'user'));
                }
                $imageObj = new Image();
                $filename = $imageObj->upload('image', array('task' => 'user'));
                $this->getTable()->saveAvatar($arrParams['id'], $filename);
            }
            $user->avatar = $filename;
        }
        return new ViewModel(array(
        	'form' => new \Home\Form\UpdateUserInfo()
        ));
	}

	public function orderAction(){
        $cartSS		= new Container(SECURITY_KEY . '_cart');
        return new ViewModel(array(
           'order' => $cartSS->quantity
        ));
	}

	public function sanPhamDaMuaAction(){
        $sanPhamDaMua = $this->getTable()->getProductsBought($this->identity()->id);
        $product = $this->getServiceLocator()->get('Home/Model/ProductsTable');
        $arrProduct = $arrSize = $arrPrice = $arrQuantity =array();
        foreach ($sanPhamDaMua as $value) {
            $arrIdProduct = json_decode($value->product_id);
            $arrSize = json_decode($value->size_name);
            $arrPrice = json_decode($value->price);
            $arrQuantity = json_decode($value->quantity);
            foreach ($arrIdProduct as $key => $id) {
                $arrProduct[$id] = (array)$product->getProduct(array('id' => $id));
                $arrProduct[$id]['size'] = $arrSize[$key];
                $arrProduct[$id]['price'] = $arrPrice[$key];
                $arrProduct[$id]['quantity'] = $arrQuantity[$key];
                $arrProduct[$id]['orderCode'] = $value->code;
            }
        }

        return new ViewModel(array(
            'sanPhamDaMua' => $arrProduct
        ));
	}

    public function danhSachHoaDonAction(){
        return new ViewModel(array(
            'danhSachHoaDon' => $this->getTable()->getOrderList($this->identity()->id)
        ));
    }

	public function favoriteProductsAction(){
		
	}

	public function mailsAction(){
		
	}

    //mua 1 sản phẩm
    public function buyAction(){
        $session = new Container(SECURITY_KEY . '_product');
        $productId = $this->params()->fromPost('productId');
        echo json_encode($this->getServiceLocator()->get('Home\Model\CartTable')->saveItem($this->params()->fromPost()));

        $product = $this->getServiceLocator()->get('Home\Model\ProductsTable');
        $product->updateBought(array('bought' => $product->getBought($productId),'id' => $productId,'quantity' => $this->params()->fromPost('quantity')));

        //cập nhật số lần mua cho 1 sản phẩm
        $history = $this->getServiceLocator()->get('Home\Model\HistoryTable');
        if($history->getBought($productId)){
            $history->updateBought($productId);
        }else{
            $history->addItem($productId,array('task' => 'buy'));
        }

        return $this->response;
    }

    public function buySuccessAction(){
        
    }

    public function compareProductsAction(){
        if($this->getRequest()->isPost()) {
            $viewModel = new ViewModel();
            $viewModel->setTerminal(true);
            return $viewModel->setVariable(
                'arrCompareProductId', $this->getServiceLocator()->get('Home\Model\ProductsTable')->getProducts($this->setCookie('arrCompareProductId',$this->params()->fromPost('id')), ['task' => 'miniBarMenu'])
            );
        }
        return $this->response;
    }

    public function setCookie($nameCookie,$productId){
            $arrCookie = array();
            $arrCookie = isset($_COOKIE[$nameCookie]) ? json_decode($_COOKIE[$nameCookie], true) : '';
            if (!$arrCookie) {
                $arrCookie = [$productId];
                setcookie($nameCookie, json_encode([$productId]), time() + 60 * 60 * 24 * 365);
            } else {
                if (!in_array($productId, $arrCookie))
                    array_push($arrCookie, $productId);
            }
            setcookie($nameCookie, json_encode($arrCookie), time() + 60 * 60 * 24 * 365);
            setcookie($nameCookie, json_encode($arrCookie), time() + 60 * 60 * 24 * 365, '/', $this->getRequest()->getUri()->getHost());
            return $arrCookie;
    }

    //thêm sản phẩm yêu thích cho user
    public function likeProductsAction(){
        if($this->getRequest()->isPost()) {
            $viewModel = new ViewModel();
            $viewModel->setTerminal(true);
            return $viewModel->setVariable(
                'arrLikeProductId', $this->getServiceLocator()->get('Home\Model\ProductsTable')->getProducts($this->setCookie('arrLikeProductId',$this->params()->fromPost('id')), ['task' => 'miniBarMenu'])
            );
        }
        return $this->response;
    }

    public function getProductInCartAction(){
        $viewModel = new ViewModel([
            'cart' => new Container(SECURITY_KEY . '_cart')
        ]);
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    //thêm sản phẩm vào giỏ hàng
    public function addProductToCartAction(){
        if($this->getRequest()->isPost()) {
            $arrParam = $this->params()->fromPost();

            //thêm sản phẩm vào mục giỏ hàng trên trang home
            $session = new Container(SECURITY_KEY . '_product');
            if(!$session->offsetExists('arrIdSanPhamTrongGioHang'))
                $session->offsetSet('arrIdSanPhamTrongGioHang',[$arrParam['id']]);
            else
                if(!in_array($arrParam['id'],$session->offsetGet('arrIdSanPhamTrongGioHang')))
                    $session->offsetSet('arrIdSanPhamTrongGioHang',array_merge([$arrParam['id']],$session->offsetGet('arrIdSanPhamTrongGioHang')));

            $productID	= $arrParam['id'];
            $price		= $arrParam['price'];
            $quantity	= $arrParam['quantity'];
			$size       = $arrParam['size'];
            $cartSS		= new Container(SECURITY_KEY . '_cart');
            $cartSS->setExpirationSeconds(24*60*60);
            if(empty($cartSS->quantity)){
                $cartSS->quantity = [$productID => [$size => [
                    'quantity' => $quantity,
                    'price' => $price,
                    'name'  => $arrParam['name'],
                    'image' => $arrParam['image'],
                    'alias' => $arrParam['alias']
                ]]];
            }else{
                if(isset($cartSS->quantity[$productID][$size]) && $cartSS->quantity[$productID][$size] && $cartSS->quantity[$productID][$size]){
                    $cartSS->quantity[$productID][$size] = [
                            'quantity' => $cartSS->quantity[$productID][$size]['quantity'] + $quantity,
                            'price' => $price,
                            'name'  => $arrParam['name'],
                            'image' => $arrParam['image'],
                            'alias' => $arrParam['alias']
                        ];
                } else {
                    $cartSS->quantity[$productID][$size] = [
                        'quantity' => $quantity++,
                        'price' => $price,
                        'name'  => $arrParam['name'],
                        'image' => $arrParam['image'],
                        'alias' => $arrParam['alias']
                    ];
                }
            }
            echo json_encode($cartSS->quantity);
        }
        return $this->response;
    }
    //xem giỏ hàng
	public function viewCartAction(){
		$bookTable	= $this->getServiceLocator()->get('Shop\Model\BookTable');
		$items		= $bookTable->listItem(null, array('task' => 'book-in-cart'));
		return new ViewModel(array(
			'items'		=>	$items,
		));
	}
    //thanh toán nhiều sản phẩm
	public function checkoutAction(){
		if($this->getRequest()->isPost()){
            $session = new Container(SECURITY_KEY . '_product');
            if(!$session->offsetExists('arrIdSanPhamTrongGioHang'))
                $session->offsetUnset('arrIdSanPhamTrongGioHang');

            $arrParam = $this->params()->fromPost();
            $cartTable	= $this->getServiceLocator()->get('Home\Model\CartTable');
            $totalProduct = 0;
            foreach($arrParam['quantity'] as $val){
                $totalProduct += $val;
            }
            $product = $this->getServiceLocator()->get('Home\Model\ProductsTable');
            foreach($arrParam['productId'] as $key => $productId){
                $product->updateBought(array('bought' => $product->getBought($productId),'id' => $productId,'quantity' => $arrParam['quantity'][$key]));
            }
            $cartTable->saveItem([
                'productId' => json_encode($arrParam['productId']),
                'price' => json_encode($arrParam['productPrice']),
                'quantity' => json_encode($arrParam['quantity']),
                'totalProduct' => $totalProduct,
                'sizeName' => json_encode($arrParam['productSize']),
                'totalMoney' => $arrParam['totalMoney'],
                'customerName' => isset($this->identity()->username) ? $this->identity()->username : $arrParam['full_name'],
                'phone' => isset($this->identity()->phone) ? $this->identity()->phone : $arrParam['phone'],
                'email' => isset($this->identity()->email) ? $this->identity()->email : $arrParam['email'],
                'shippingAddress' => isset($this->identity()->address) ? $this->identity()->address : $arrParam['address'],
                'user_id' => isset($this->identity()->id) ? $this->identity()->id : 0
            ]);
			$cartSS		= new Container(SECURITY_KEY . '_cart');
			$cartSS->getManager()->getStorage()->clear(SECURITY_KEY . '_cart');
		}
        return $this->redirect()->toRoute('frontendRoute/default',['controller' => 'user', 'action' => 'buy-success']);
	}

	public function historyAction(){
		$cartTable	= $this->getServiceLocator()->get('Shop\Model\CartTable');
		$items		= $cartTable->listItem(null, array('task' => 'view-history'));

		return new ViewModel(array(
			'items'		=>	$items,
		));
	}

    public function loginFacebookAction(){
        if($this->getRequest()->isGet()){
            $app_id = "";
            $app_secret = "c7225ea7156181fb843ac9888e86c1e0";
            $redirect_uri = urlencode($this->url()->fromRoute('frontendRoute/default',['controller' => 'user','action' => 'login-facebook'],array('force_canonical' => true)));

            // Get code value
            $code = $_GET['code'];

            // Get access token info
            $facebook_access_token_uri = "https://graph.facebook.com/oauth/access_token?client_id=703725616396652&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            curl_close($ch);

            // Get access token
            $access_token = str_replace('access_token=', '', explode("&", $response)[0]);

            // Get user infomation
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            curl_close($ch);
            $user = json_decode($response);
            $userSession = new Container(SECURITY_KEY . '_user');
            $userSession->offsetSet('user_facebook',$user);
            var_dump($userSession->offsetGet('user_facebook'));
//            return $this->redirect()->toRoute('home');
        }
        return $this->response;
    }

    public function removeProductFromCartAction(){
        if($this->getRequest()->isPost()){
            $cartSS		= new Container(SECURITY_KEY . '_cart');
            unset($cartSS->quantity[$this->params()->fromPost('id')][$this->params()->fromPost('size')]);
            $totalMoney = 0;
                foreach ($cartSS->quantity as $productId => $val)
                    foreach ($val as $size => $val1) {
                        $totalMoney += $val1['price'] * $val1['quantity'];
                }
            echo json_encode(['totalMoney' => $totalMoney]);
        }
        return $this->response;
    }
}