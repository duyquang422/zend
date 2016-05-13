<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class Password extends Fieldset
{
    public function __construct()
    {
        parent::__construct('password');
            $this->add(array(
                'name' => 'password',
                'type' => 'password',
                'attributes' => array(
                    'class' => 'form-control',
                    'id' => 'password',
                    'placeholder' => 'Vui lòng nhập mật khẩu',
                )
            ));
            $this->add(array(
                'name' => 're-password',
                'type' => 'password',
                'attributes' => array(
                    'class' => 'form-control',
                    'id' => 're-password',
                    'placeholder' => 'Vui lòng nhập lại mật khẩu',
                )
            ));
    }
}