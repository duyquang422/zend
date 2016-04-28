<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class Sex extends Fieldset
{
    public function __construct()
    {
        parent::__construct('sex');
        $this->add(array(
                'name'          => 'sex',
                'type'          => 'Select',
                'options'       => array(
                        'value_options' => array(
                                '1'    => 'Nữ',
                                '2'    => 'Nam',
                        ),
                        'label' => 'Giới tính: ',
                        'label_attributes'  => array(
                                'for'       => 'sex',
                                'class'     => 'col-sm-3 control-label',
                        ),
                ),
                'attributes'    => array(
                        'class'         => 'form-control col-sm-2',
                ),
        ));
    }
}