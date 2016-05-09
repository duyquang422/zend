<?php
namespace Home\Model;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class UserTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function getAvatar($id){
        $result = $this->tableGateway->select(function (Select $select) use ($id) {
            $select->columns(array('avatar'))->where->equalTo('id', $id);
        })->current();
        return $result;
    }

    public function saveAvatar($id, $filename){
        if($id > 0) {
            $this->tableGateway->update(array('avatar' => $filename), array('id' => $id));
        }
    }

	public function getItem($arrParam = null, $options = null){
	
		if($options['task'] == 'user-register') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'active_code', 'username', 'email'))
					   ->where->equalTo('id', $arrParam['id']);
			})->current();
		}
		
		if($options['task'] == 'store-user-info') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'email', 'avatar', 'username', 'group_id', 'created'))
					   ->where->equalTo('id', $arrParam['id']);
			})->current();
		}
		
		if($options['task'] == 'user-active') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->where->equalTo('id', $arrParam['id']);
//				       ->where->notEqualTo('active_code', 1)
//				       ->where->equalTo('active_code', $arrParam['code']);
			})->count();
		}
	
		return $result;
	}

	//lấy ra các sản phẩm đã mua
	public function getProductsBought($userId){
        return $this->tableGateway->select(function (Select $select) use ($userId) {
            $select->join(
                array('c' => 'cart'),
                'user.id = c.user_id',
                array('cartId' => 'id','code','product_id','price','quantity','size_name'),
                $select::JOIN_LEFT
            )->where->equalTo('c.status', 5)->equalTo('user.id',$userId);
        });
	}

	public function getOrderList($userId){
		return $this->tableGateway->select(function (Select $select) use ($userId) {
            $select->join(
                array('c' => 'cart'),
                'user.id = c.user_id',
                array('code','total_product','total_money','statusOrder' => 'status','time_order'),
                $select::JOIN_LEFT
            )->where->equalTo('user.id',$userId);
        });
	}

	public function saveItem($arrParam = null, $options = null){

		if($options['task'] == 'add-item') {
			$data	= array(
				'username'	=> $arrParam['username'],
				'email'		=> $arrParam['email'],
				'password'	=> md5($arrParam['password']),
				'group_id'	=> $arrParam['group_id'],
				'address' 	=> $arrParam['address'],
				'avatar' 	=> $arrParam['avatar'],
				'ordering'	=>isset($arrParam['ordering']) &&  $arrParam['ordering'] ? $arrParam['ordering'] : '',
				'status'	=> 1,
				'created'	=> date('Y-m-d H:i:s'),
				'register_ip' => $_SERVER['REMOTE_ADDR'],
//				'active_code' => substr(md5(SECURITY_KEY . time()),4,10),
				'active_code' => 1
			);

			if(isset($arrParam['file']['tmp_name']) && !empty($arrParam['file']['tmp_name'])){
				$imageObj 		= new Image();
				$data['avatar']	= $imageObj->upload('file', array('task' => 'user-avatar'));
			}

			if(isset($arrParam['sign']) && !empty($arrParam['sign'])){
				$config		= array(
					array('HTML.AllowedElements', 'p,s,u,em,strong,span'),
					array('HTML.AllowedAttributes', 'style'),
				);

				$filter			= new \Zendvn\Filter\Purifier($config);
				$data['sign']	= $filter->filter($arrParam['sign']);
			}

			$this->tableGateway->insert($data);
			return $this->tableGateway->getLastInsertValue();
		}
		if($options['task'] == 'edit-item') {
			$data	= array(
				'group_id'	=> $arrParam['group_id']
			);

			$this->tableGateway->update($data, array('id' => $arrParam['id']));
			return $arrParam['id'];
		}

		if($options['task'] == 'update-item') {
			$data	= array(
				'username'	=> $arrParam['username'],
				'phone' => $arrParam['phone'] ? $arrParam['phone'] : '',
				'birthday' => $arrParam['year'] . '-' . $arrParam['month'] . '-' . $arrParam['month'],
				'sex' => $arrParam['sex']
			);
			$this->tableGateway->update($data, array('id' => $arrParam['id']));
		}
	}

	public function updateLastSign($id){
		$data = array('last_sign' => date('Y-m-d H:i:s'));
		$where = array('id' => $id);
		$this->tableGateway->update($data, $where);
	}
}