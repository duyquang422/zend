<?php

namespace Admin\Form\Fieldset;

use Zend\Form\Fieldset;

class Alias extends Fieldset
{
    public function __construct()
    {
        parent::__construct('alias');
            $this->add(array(
                'name' => 'alias',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'input-xxlarge input-large-text form-control',
                    'id' => 'alias',
                    'placeholder' => 'alias',
                ),
                'options' => array(
                    'label' => 'Alias',
                    'label_attributes' => array(
                        'for' => 'alias',
                        'class' => 'col-xs-3 control-label',
                    )
                )
            ));
    }
}