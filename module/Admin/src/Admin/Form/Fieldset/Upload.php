<?php

namespace Admin\Form\Fieldset;

use Zend\Form\Fieldset;

class Upload extends Fieldset
{
    public function __construct()
    {
        parent::__construct('upload');

        $this->add(array(
            'name' => 'picture',
            'type' => 'file',
            'attributes' => array(
                'class' => 'form-control col-sm-2',
                'id' => 'picture'
            ),
        ));
    }
}