<?php
namespace Admin\Model\Entity;

class PostTag {

	public $id;
	public $tag_id;
	public $post_id;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->tag_id			= (!empty($data['tag_id'])) ? $data['tag_id'] : null;
        $this->post_id		= (!empty($data['post_id'])) ? $data['post_id'] : null;
	}
}