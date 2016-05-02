<?php
namespace Admin\Model\Entity;

class Products {

	public $id;
	public $name;
    public $alias;
    public $code;
    public $trademark;
	public $description;
	public $price;
    public $special;
	public $hot;
	public $sale_off;
	public $percent_discount;
    public $picture;
    public $image;
    public $zoom_image;
    public $created;
    public $deal_time;
    public $deal;
    public $point;
    public $bought;
    public $quantity;
    public $created_by;
    public $modified;
    public $modified_by;
    public $meta_description;
    public $meta_keyword;
    public $hits;
    public $category_id;
    public $status;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
        $this->alias		= (!empty($data['alias'])) ? $data['alias'] : null;
        $this->code		= (!empty($data['code'])) ? $data['code'] : null;
        $this->trademark		= (!empty($data['trademark'])) ? $data['trademark'] : null;
        $this->meta_keyword         = (!empty($data['meta_keyword'])) ? $data['meta_keyword'] : null;
        $this->meta_description         = (!empty($data['meta_description'])) ? $data['meta_description'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
		$this->description	= (!empty($data['description'])) ? $data['description'] : 0;
		$this->price		= (!empty($data['price'])) ? $data['price'] : null;
		$this->special		= (!empty($data['special'])) ? $data['special'] : 0;
		$this->hot		= (!empty($data['hot'])) ? $data['hot'] : 0;
		$this->sale_off		= (!empty($data['sale_off'])) ? $data['sale_off'] : null;
        $this->deal_time		= (!empty($data['deal_time'])) ? $data['deal_time'] : null;
        $this->deal		= (!empty($data['deal'])) ? $data['deal'] : 0;
        $this->point		= (!empty($data['point'])) ? $data['point'] : 0;
        $this->bought		= (!empty($data['bought'])) ? $data['bought'] : 0;
        $this->quantity		= (!empty($data['quantity'])) ? $data['quantity'] : 0;
		$this->percent_discount	= (!empty($data['percent_discount'])) ? $data['percent_discount'] : 0;
		$this->picture	= (!empty($data['picture'])) ? $data['picture'] : null;
        $this->image	= (!empty($data['image'])) ? $data['image'] : null;
        $this->zoom_image	= (!empty($data['zoom_image'])) ? $data['zoom_image'] : null;
        $this->created	= (!empty($data['created'])) ? $data['created'] : null;
        $this->created_by	= (!empty($data['created_by'])) ? $data['created_by'] : null;
        $this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;
        $this->modified = (!empty($data['modified'])) ? $data['modified'] : null;
        $this->hits         = (!empty($data['hits'])) ? $data['hits'] : 0;
        $this->category_id         = (!empty($data['category_id'])) ? $data['category_id'] : 0;
	}
}