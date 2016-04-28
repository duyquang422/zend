<?php
namespace Admin\Model;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class PostTagTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}

    public function saveData($arrParam = null, $option = null)
    {
        $data = array(
            'tag_id' => $arrParam['tag_id'],
            'post_id' => $arrParam['post_id']
        );
        $this->tableGateway->insert($data);
        return $this->tableGateway->getLastInsertValue('id');
    }

    public function deleteItem($id){
        $this->tableGateway->delete(array('id' => $id));
    }

    public function getItem($arrParams){
        return $result = $this->tableGateway->select(function (Select $select) use ($arrParams) {
            $select->where->equalTo('tag_id', $arrParams['tag_id'])->equalTo('post_id', $arrParams['post_id']);
        })->current();
    }
}