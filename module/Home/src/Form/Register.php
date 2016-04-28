<?php
namespace Home\Form;

use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Register extends Form {
	
	public function __construct(){
		parent::__construct();
		// FORM Attribute
		$this->setAttributes(array(
				'action'	=> '#',
				'method'	=> 'POST',
				'class'		=> 'form-horizontal',
				'role'		=> 'form',
				'name'		=> 'sign-up',
				'id'		=> 'sign-up',
				'style'		=> 'padding-top: 20px;',
				'autocomplete' => 'false'
		));
		$this->add(new \Home\Form\Fieldset\Email());
		$this->add(new \Home\Form\Fieldset\Password());
		$this->add(new \Home\Form\Fieldset\UserName());
		// $this->add(new \Home\Form\Fieldset\Captcha());
		
	}
}