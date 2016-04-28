<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class Phone extends Fieldset
{
    public function __construct()
    {
        parent::__construct('phone');
            $this->add([
                'name' => 'phone',
                'type' => 'number',
                'attributes' => [
                    'class' => 'form-control',
                    'id' => 'phone',
                ]
            ]);
    }
}