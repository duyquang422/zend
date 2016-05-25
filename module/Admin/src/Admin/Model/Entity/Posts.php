<?php
namespace Admin\Model\Entity;

class Posts{

    public $id;
    public $name;
    public $image;
    public $status;
    public $special;
    public $description;
    public $category_id;
    public $create_date;
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
        $this->image			= (!empty($data['image'])) ? $data['image'] : null;
        $this->alias		= (!empty($data['alias'])) ? $data['alias'] : null;
        $this->meta_keyword         = (!empty($data['meta_keyword'])) ? $data['meta_keyword'] : null;
        $this->meta_description         = (!empty($data['meta_description'])) ? $data['meta_description'] : null;
        $this->status		= (!empty($data['status'])) ? $data['status'] : 0;
        $this->special		= (!empty($data['special'])) ? $data['special'] : 0;
        $this->description	= (!empty($data['description'])) ? $data['description'] : 0;
        $this->category_id		= (!empty($data['category_id'])) ? $data['category_id'] : null;
        $this->create_date	= (!empty($data['created_date'])) ? $data['created_date'] : null;
        $this->create_by	= (!empty($data['create_by'])) ? $data['create_by'] : null;
        $this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;
        $this->modified_date = (!empty($data['modified_date'])) ? $data['modified_date'] : null;
        $this->hits         = (!empty($data['hits'])) ? $data['hits'] : null;
    }
}