<?php
namespace News\Model;

use Zend\Db\Sql\Predicate\Expression;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;

class PostsCategoryTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}

	public function getCategory($id){
        return $this->tableGateway->select(function (Select $select) use ($id){
            $select->columns(array('id','name','alias','image','parent','description','created_date','created_by'))
                ->where->equalTo('id',$id);
        })->current();
    }

    public function getPostsByCategory($idCategory,$task = null){
        return $this->tableGateway->select(function (Select $select) use ($idCategory,$task){
            $select->columns(array('id','name','alias','image'))
                ->join(
                    array('p'=> 'posts'),
                    'posts_category.id = p.category_id',
                    array(
                        'postsId'   =>'id',
                        'postsName'   =>'name',
                        'postsImage'  => 'image',
                        'postsAlias'  => 'alias',
                        'postsDescription' => 'description',
                        'postsCreatedDate' => 'created_date',
                        'postsCreatedBy' => 'created_by'
                    ),
                    $select::JOIN_LEFT
                );
            if($task == 'home') {
                $select->where(new Expression('(posts_category.parent = ? OR posts_category.id = ?) AND p.image != "" AND p.status = 1', array($idCategory, $idCategory)))
                    ->order('posts_category.id', 'asc')->limit(6);
            }
        })->toArray();
    }
}