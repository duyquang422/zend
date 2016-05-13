<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class Email extends Fieldset
{
    public function __construct()
    {
        parent::__construct('email');
            $this->add(array(
                'name' => 'email-sign-up',
                'type' => 'text',
                'attributes' => array(
                    'class' => 'form-control',
                    'id' => 'email',
                    'placeholder' => 'Vui lòng nhập email',
                    'autocomplete' => "false"
                )
            ));
    }
}