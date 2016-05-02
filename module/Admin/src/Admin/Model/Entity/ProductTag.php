<?php
namespace Admin\Model\Entity;

class ProductTag {

	public $id;
	public $tag_id;
	public $product_id;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->tag_id			= (!empty($data['tag_id'])) ? $data['tag_id'] : null;
        $this->product_id		= (!empty($data['product_id'])) ? $data['product_id'] : null;
	}
}