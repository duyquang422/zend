<?php
namespace Admin\Form;
use Admin\Form\Fieldset;
use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Group extends Form {
	
	public function __construct($name = null)
	{
		parent::__construct();
		$this->setAttributes(array(
			'role'		=> 'form',
			'name'		=> 'group',
			'id'		=> 'data-form',
			'enctype'   => 'multipart/form-data'
		));
		$this->add(new Fieldset\Name());
	}
}