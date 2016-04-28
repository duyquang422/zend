<?php
namespace Admin\Model;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class PagesTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}

	public function getItem($id){
		return $this->tableGateway->select(function (Select $select) use ($id) {
			$select->where->equalTo('id', $id);
		})->current();
	}

	public function saveItem($arrParam = null, $options = null) {
		$data = array(
			'name' => $arrParam['name'],
			'alias' => $arrParam['alias'],
		);

		if (!empty($arrParam['description'])) {
			$config = array(
				array('HTML.AllowedElements', 'p,s,u,em,strong,span'),
				array('HTML.AllowedAttributes', 'style'),
			);

			$filter = new \Zendvn\Filter\Purifier($config);
			$data['description'] = $filter->filter($arrParam['description']);
		}else{
			$data['description'] = '';
		}

		if ($options['task'] == 'add-item') {
			$data = array_merge($data,[
				'status' => 1,
                'create_by' => $arrParam['create_by']
			]);

            $this->tableGateway->insert($data);
			return $this->tableGateway->getLastInsertValue();
		}
		if ($options['task'] == 'edit-item') {
            $this->tableGateway->update($data, array('id' => $arrParam['id']));
            return $arrParam['id'];
		}
	}
}