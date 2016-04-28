<?php
namespace Home\Model;

use Zend\Json\Json;

use Zendvn\System\Info;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class CartTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
    //tiến hành lưu dữ liệu các sản phẩm mà người dùng mua
	public function saveItem($arrParam = null){

		//tao ma don hang bang cach random tu a-zA-Z0-9
		$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ' .'0123456789');
		shuffle($seed);
		$rand = '';
		foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];

		$data = [
			'code' => $rand,
			'product_id' => $arrParam['productId'],
			'price' => $arrParam['price'],
			'quantity' => $arrParam['quantity'],
			'total_product' => isset($arrParam['totalProduct']) ? $arrParam['totalProduct'] : 1,
			'size_name' => $arrParam['sizeName'],
			'total_money' => $arrParam['totalMoney'],
			'customer_name' => $arrParam['customerName'],
			'phone' => $arrParam['phone'],
			'email' => $arrParam['email'],
			'shipping_address' => $arrParam['shippingAddress'],
			'note' => isset($arrParam['note']) ? $arrParam['note'] : '',
			'status' => 0,
			'time_order' => date("Y-m-d H:i:s"),
            'user_id' => isset($arrParam['user_id']) ? $arrParam['user_id'] : 0,
			'ip_address' => $_SERVER['REMOTE_ADDR']

		];
		$this->tableGateway->insert($data);
		return $this->tableGateway->getLastInsertValue('code');
	}
	
	public function listItem($arrParam = null, $options = null){
        return $this->tableGateway->select(function (Select $select) use ($arrParam,$options){
            if($options['task'] == 'view-history') {
                    $info		= new Info();
                    $user	= $info->getUserInfo();
                    $select->columns(['product_id'])
                            ->order(array('id DESC'))
                            ->where->like('ip_address','%'.$_SERVER['REMOTE_ADDR'] . '%');
                    if($user){
                        $select->where->or->equalTo('email',$user->email);
                    }

            }
        });
	}
	
	private function randomString($length = 5){
	
		$arrCharacter = array_merge(range('a','z'), range(0,9));
		$arrCharacter = implode($arrCharacter, '');
		$arrCharacter = str_shuffle($arrCharacter);
	
		$result		= substr($arrCharacter, 0, $length);
		return $result;
	}
}