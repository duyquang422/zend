<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class Phone extends Fieldset
{
    public function __construct()
    {
        parent::__construct('phone');
            $this->add(array(
                'name' => 'phone',
                'type' => 'number',
                'attributes' => array(
                    'class' => 'form-control',
                    'id' => 'phone',
                )
            ));
    }
}