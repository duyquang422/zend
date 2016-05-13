<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class Captcha extends Fieldset
{
    public function __construct()
    {
        parent::__construct('captcha');
            $this->add([
                'name' => 'captcha',
                'type' => 'text',
                'attributes' => array(
                    'class' => 'form-control',
                    'id' => 'captcha'
                )
            ]);
    }
}