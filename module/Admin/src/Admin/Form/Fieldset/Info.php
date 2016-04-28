<?php

namespace Admin\Form\Fieldset;

use Zend\Form\Fieldset;

class Info extends Fieldset{
    public function __construct(){
        parent::__construct('info');
        $this->add(array(
            'name' => 'created_date',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text form-control',
                'id' => 'created-date'
            ),
            'options' => array(
                'label' => 'Ngày tạo:',
                'label_attributes' => array(
                    'for' => 'created date',
                    'class' => 'col-xs-5 control-label',
                )
            )
        ));

        $this->add(array(
            'name' => 'created_by',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text form-control',
                'id' => 'created-by'
            ),
            'options' => array(
                'label' => 'Tạo Bởi:',
                'label_attributes' => array(
                    'for' => 'Created By',
                    'class' => 'col-xs-5 control-label'
                )
            ),
        ));

        $this->add(array(
            'name' => 'modified_date',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text form-control',
                'id' => 'modified-date'
            ),
            'options' => array(
                'label' => 'Ngày chỉnh sửa:',
                'label_attributes' => array(
                    'for' => 'Created By',
                    'class' => 'col-xs-5 control-label'
                )
            ),
        ));

        $this->add(array(
            'name' => 'modified_by',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text form-control',
                'id' => 'modified-by'
            ),
            'options' => array(
                'label' => 'Chỉnh sửa bởi:',
                'label_attributes' => array(
                    'for' => 'Create By',
                    'class' => 'col-xs-5 control-label'
                )
            ),
        ));

        $this->add(array(
            'name' => 'hits',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text form-control',
                'id' => 'hits'
            ),
            'options' => array(
                'label' => 'Số lượt xem:',
                'label_attributes' => array(
                    'for' => 'hits',
                    'class' => 'col-xs-5 control-label'
                )
            ),
        ));

        $this->add(array(
            'name' => 'id',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text form-control',
                'id' => 'id'
            ),
            'options' => array(
                'label' => 'ID:',
                'label_attributes' => array(
                    'for' => 'id',
                    'class' => 'col-xs-5 control-label'
                )
            ),
        ));
    }
}