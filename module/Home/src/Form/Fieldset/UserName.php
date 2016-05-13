<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class UserName extends Fieldset
{
    public function __construct()
    {
        parent::__construct('username');
            $this->add(array(
                'name' => 'username',
                'type' => 'text',
                'attributes' => array(
                    'class' => 'form-control',
                    'id' => 'username',
                    'placeholder' => 'Họ và tên của bạn',
                )
            ));
    }
}