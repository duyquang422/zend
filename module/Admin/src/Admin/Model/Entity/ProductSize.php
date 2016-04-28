<?php
namespace Admin\Model\Entity;

class ProductSize {

	public $id;
	public $size;
	public $status;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->size			= (!empty($data['size'])) ? $data['size'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
	}
}