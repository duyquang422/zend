<?php

namespace Admin\Form\Fieldset;

use Zend\Form\Fieldset;

class SEO extends Fieldset
{
    public function __construct()
    {
        parent::__construct('SEO');

        $this->add(array(
            'name' => 'meta_description',
            'type' => 'Textarea',
            'attributes' => array(
                'cols' => 40,
                'rows' => 3,
                'id' => 'meta_description',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Mô tả từ khóa SEO:',
                'label_attributes' => array(
                    'for' => 'Meta Description',
                    'class' => 'control-label col-xs-4',
                )
            ),
        ));

        $this->add(array(
            'name' => 'meta_keyword',
            'type' => 'Textarea',
            'attributes' => array(
                'cols' => 40,
                'rows' => 3,
                'id' => 'meta_keyword',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Từ khóa SEO:',
                'label_attributes' => array(
                    'for' => 'Meta keyword',
                    'class' => 'control-label col-xs-4',
                )
            ),
        ));
    }
}