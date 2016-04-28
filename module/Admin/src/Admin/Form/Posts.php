<?php
namespace Admin\Form;

use Admin\Form\Fieldset;
use Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Posts extends Form {
	
	public function __construct(){
		parent::__construct();

        $this->setAttributes(array(
            'action'	=> 'test',
            'method'	=> 'POST',
            'role'		=> 'form',
            'name'		=> 'postsForm',
            'id'		=> 'data-form'
        ));

        $this->add(new Fieldset\Name());
        $this->add(new Fieldset\Status());
        $this->add(new Fieldset\Alias());
        $this->add(new Fieldset\Info());
        $this->add(new Fieldset\SEO());
        $this->add(new Fieldset\Upload());
        $this->add(array(
            'name' => 'tag',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'tag',
                'placeholder' => 'Vui lòng chọn thẻ SEO',
                'autocomplete' => "off"
            ),
        ));
	}
}