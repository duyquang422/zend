<?php
namespace Home\Form;

use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class UpdateUserInfo extends Form {
	
	public function __construct(){
		parent::__construct();
		$this->add(new \Home\Form\Fieldset\Email());
		$this->add(new \Home\Form\Fieldset\UserName());
		$this->add(new \Home\Form\Fieldset\Sex());
		$this->add(new \Home\Form\Fieldset\BirthDay());
		$this->add(new \Home\Form\Fieldset\Phone());
		// $this->add(new \Home\Form\Fieldset\Captcha());
		
	}
}