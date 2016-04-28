<?php
namespace Admin\Model\Entity;

class Comment {

	public $id;
	public $product_id;
	public $username;
    public $user_id;
    public $email;
	public $parent_id;
    public $content;
	public $status;
	public $date;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->product_id			= (!empty($data['product_id'])) ? $data['product_id'] : null;
		$this->username		= (!empty($data['username'])) ? $data['username'] : null;
        $this->user_id		= (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->email		= (!empty($data['email'])) ? $data['email'] : null;
        $this->parent_id		= (!empty($data['parent_id'])) ? $data['parent_id'] : null;
        $this->content		= (!empty($data['content'])) ? $data['content'] : null;
        $this->status		= (!empty($data['status'])) ? $data['status'] : null;
        $this->date		= (!empty($data['date'])) ? $data['date'] : null;
	}
}