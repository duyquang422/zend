<?php
namespace Admin\Form;
use Admin\Form\Fieldset;
use Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Manufacturer extends Form {
	
	public function __construct(){
		parent::__construct();

        $this->setAttributes(array(
            'role'		=> 'form',
            'name'		=> 'manufacturerForm',
            'id'		=> 'data-form',
            'enctype'   => 'multipart/form-data'
        ));

        $this->add(new Fieldset\Name());
        $this->add(new Fieldset\Status());
        $this->add(new Fieldset\Alias());
        $this->add(new Fieldset\Info());
        $this->add(new Fieldset\SEO());
        $this->add(new Fieldset\Upload());
	}
}