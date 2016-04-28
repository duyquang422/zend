<?php
namespace Admin\Model\Entity;

class Group {

	public $id;
	public $name;
	public $status;
	public $ordering;
	public $created;
	public $created_by;
	public $modified;
	public $group_acp;
	public $permission_id;
	public $modified_by;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
		$this->created		= (!empty($data['created'])) ? $data['created'] : null;
		$this->ordering		= (!empty($data['ordering'])) ? $data['ordering'] : null;
		$this->group_acp		= (!empty($data['group_acp'])) ? $data['group_acp'] : null;
		$this->permission_id		= (!empty($data['permission_id'])) ? $data['permission_id'] : null;
		$this->created_by	= (!empty($data['created_by'])) ? $data['created_by'] : null;
		$this->modified		= (!empty($data['modified'])) ? $data['modified'] : null;
		$this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;
	}

}