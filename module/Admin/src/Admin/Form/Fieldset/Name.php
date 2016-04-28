<?php

namespace Admin\Form\Fieldset;

use Zend\Form\Fieldset;

class Name extends Fieldset{
    public function __construct(){
        parent::__construct('name');

        $this->add(array(
            'name'			=> 'name',
            'type'			=> 'Text',
            'attributes'	=> array(
                'class'			=> 'input-xxlarge input-large-text form-control',
                'id'			=> 'name'
            ),
            'options'		=> array(
                'label'				=> 'Tiêu Đề',
                'label_attributes'	=> array(
                    'for'		=> 'name',
                    'class'		=> 'col-xs-3 control-label',
                )
            ),
        ));
    }
}