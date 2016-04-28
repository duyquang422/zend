<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class Email extends Fieldset
{
    public function __construct()
    {
        parent::__construct('email');
            $this->add([
                'name' => 'email-sign-up',
                'type' => 'text',
                'attributes' => [
                    'class' => 'form-control',
                    'id' => 'email',
                    'placeholder' => 'Vui lòng nhập email',
                    'autocomplete' => "false"
                ]
            ]);
    }
}