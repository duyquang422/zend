<?php

namespace Admin\Form\Fieldset;

use Zend\Form\Fieldset;

class Status extends Fieldset
{
    public function __construct()
    {
        parent::__construct('status');

        $this->add(array(
            'name' => 'status',
            'type' => 'select',
            'options' => array(
                'value_options' => array(
                    '1' => 'Hiển thị',
                    '0' => 'Không hiển thị'
                ),
                'label' => 'Trạng thái',
                'label_attributes' => array(
                    'for' => 'status',
                    'class' => 'control-label',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control col-sm-2',
                'id' => 'status'
            ),
        ));
    }
}