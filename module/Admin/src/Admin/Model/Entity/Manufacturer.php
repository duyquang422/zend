<?php
namespace Admin\Model\Entity;

class Manufacturer{

    public $id;
    public $name;
    public $status;
    public $description;
    public $picture;
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
        $this->alias		= (!empty($data['alias'])) ? $data['alias'] : null;
        $this->meta_keyword         = (!empty($data['meta_keyword'])) ? $data['meta_keyword'] : null;
        $this->meta_description         = (!empty($data['meta_description'])) ? $data['meta_description'] : null;
        $this->status		= (!empty($data['status'])) ? $data['status'] : 0;
        $this->description	= (!empty($data['description'])) ? $data['description'] : 0;
        $this->picture	= (!empty($data['picture'])) ? $data['picture'] : '';
        $this->category_id		= (!empty($data['category_id'])) ? $data['category_id'] : null;
        $this->create_date	= (!empty($data['created_date'])) ? $data['created_date'] : null;
        $this->create_by	= (!empty($data['create_by'])) ? $data['create_by'] : null;
        $this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;
        $this->modified_date = (!empty($data['modified_date'])) ? $data['modified_date'] : null;
        $this->hits         = (!empty($data['hits'])) ? $data['hits'] : null;
    }
}