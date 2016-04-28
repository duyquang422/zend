<?php
namespace Admin\Model\Entity;

class History {

	public $id;
	public $product_id;
	public $rate;
    public $comment;
    public $buy;
    public $status;
    public $date;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->product_id		= (!empty($data['product_id'])) ? $data['product_id'] : null;
        $this->rate		= (!empty($data['rate'])) ? $data['rate'] : null;
        $this->comment		= (!empty($data['comment'])) ? $data['comment'] : null;
        $this->buy		= (!empty($data['buy'])) ? $data['buy'] : null;
        $this->status		= (!empty($data['status'])) ? $data['status'] : null;
        $this->date		= (!empty($data['date'])) ? $data['date'] : null;
	}
}