<?php
namespace Admin\Model\Entity;

class Cart {

	public $id;
	public $code;
	public $product_id;
    public $price;
    public $quantity;
	public $total_product;
	public $size_name;
	public $voucher;
    public $total_money;
	public $user_id;
	public $customer_name;
	public $phone;
    public $email;
	public $ip_address;
    public $note;
    public $shipping_address;
    public $status;
    public $time_order;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->code			= (!empty($data['code'])) ? $data['code'] : null;
		$this->product_id		= (!empty($data['product_id'])) ? $data['product_id'] : null;
        $this->price		= (!empty($data['price'])) ? $data['price'] : null;
        $this->quantity		= (!empty($data['quantity'])) ? $data['quantity'] : null;
        $this->total_product		= (!empty($data['total_product'])) ? $data['total_product'] : null;
        $this->size_name         = (!empty($data['size_name'])) ? $data['size_name'] : null;
        $this->voucher         = (!empty($data['voucher'])) ? $data['voucher'] : null;
		$this->total_money		= (!empty($data['total_money'])) ? $data['total_money'] : 0;
		$this->user_id	= (!empty($data['user_id'])) ? $data['user_id'] : 0;
		$this->customer_name		= (!empty($data['customer_name'])) ? $data['customer_name'] : null;
		$this->phone		= (!empty($data['phone'])) ? $data['phone'] : null;
		$this->email		= (!empty($data['email'])) ? $data['email'] : null;
        $this->ip_address		= (!empty($data['ip_address'])) ? $data['ip_address'] : null;
		$this->note		= (!empty($data['note'])) ? $data['note'] : null;
		$this->shipping_address	= (!empty($data['shipping_address'])) ? $data['shipping_address'] : null;
		$this->status	= (!empty($data['status'])) ? $data['status'] : null;
        $this->time_order	= (!empty($data['time_order'])) ? $data['time_order'] : null;
	}
}