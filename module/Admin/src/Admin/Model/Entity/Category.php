<?php
namespace Admin\Model\Entity;

class Category {

	public $id;
	public $name;
	public $status;
	public $description;
    public $image;
	public $parent;
	public $left;
	public $right;
	public $level;
    public $special;
    public $createDate;
    public $create_by;
    public $modified_date;
    public $modified_by;
    public $meta_description;
    public $meta_keyword;
    public $hits;
    public $alias;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
        $this->alias		= (!empty($data['alias'])) ? $data['alias'] : null;
        $this->meta_keyword         = (!empty($data['meta_keyword'])) ? $data['meta_keyword'] : null;
        $this->meta_description         = (!empty($data['meta_description'])) ? $data['meta_description'] : null;
        $this->image		= (!empty($data['image'])) ? $data['image'] : '';
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
		$this->description	= (!empty($data['description'])) ? $data['description'] : 0;
		$this->parent		= (!empty($data['parent'])) ? $data['parent'] : null;
		$this->left			= (!empty($data['left'])) ? $data['left'] : null;
		$this->right		= (!empty($data['right'])) ? $data['right'] : null;
		$this->level		= (!empty($data['level'])) ? $data['level'] : null;
        $this->special		= (!empty($data['special'])) ? $data['special'] : null;
        $this->createDate	= (!empty($data['created_date'])) ? $data['created_date'] : null;
        $this->create_by	= (!empty($data['create_by'])) ? $data['create_by'] : null;
        $this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;
        $this->modified_date = (!empty($data['modified_date'])) ? $data['modified_date'] : null;
        $this->hits         = (!empty($data['hits'])) ? $data['hits'] : null;
	}
}