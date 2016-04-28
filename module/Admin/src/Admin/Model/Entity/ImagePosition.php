<?php
namespace Admin\Model\Entity;

class ImagePosition {

	public $id;
	public $username;
	public $email;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->position		= (!empty($data['position'])) ? $data['position'] : null;
		$this->image		= (!empty($data['image'])) ? $data['image'] : null;
	}
}