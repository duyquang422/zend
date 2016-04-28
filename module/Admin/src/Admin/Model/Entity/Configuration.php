<?php
namespace Admin\Model\Entity;

class Configuration {

	public $id;
	public $name;
	public $value;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
        $this->value        = (!empty($data['value'])) ? $data['value'] : null;
	}
}