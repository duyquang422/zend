<?php
namespace Admin\Model\Entity;

class Pages {

	public $id;
	public $name;
	public $alias;
    public $description;
    public $hits;
    public $create_by;
	public $status;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
		$this->alias		= (!empty($data['alias'])) ? $data['alias'] : null;
        $this->description		= (!empty($data['description'])) ? $data['description'] : null;
        $this->hits		= (!empty($data['hits'])) ? $data['hits'] : null;
        $this->create_by		= (!empty($data['content'])) ? $data['content'] : null;
        $this->status		= (!empty($data['status'])) ? $data['status'] : null;
	}
}