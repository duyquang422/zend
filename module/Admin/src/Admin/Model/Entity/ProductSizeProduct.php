<?php
namespace Admin\Model\Entity;

class ProductSizeProduct {

	public $id;
	public $size_id;
	public $product_id;
	public $status;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->size_id		= (!empty($data['size_id'])) ? $data['size_id'] : null;
		$this->product_id	= (!empty($data['product_id'])) ? $data['product_id'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
	}
}