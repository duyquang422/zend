<?php
namespace Admin\Model\Entity;

class ProductAttributes {

	public $id;
	public $attributes;
	public $status;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->attributes			= (!empty($data['attributes'])) ? $data['attributes'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
	}
}