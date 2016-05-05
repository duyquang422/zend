<?php
namespace Admin\Model\Entity;

class ProductAttributesProduct {

	public $id;
	public $attributes_id;
	public $product_id;
    public $value;
	public $status;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->attributes_id		= (!empty($data['attributes_id'])) ? $data['attributes_id'] : null;
		$this->product_id	= (!empty($data['product_id'])) ? $data['product_id'] : null;
		$this->value	= (!empty($data['value'])) ? $data['value'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
	}
}