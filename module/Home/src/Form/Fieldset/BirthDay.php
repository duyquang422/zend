<?php

namespace Home\Form\Fieldset;

use Zend\Form\Fieldset;

class BirthDay extends Fieldset
{
    public function __construct()
    {
        parent::__construct('birthday');
        for($i = 1; $i <= 31; $i++)
            $day[$i] = $i;
        for($i = 1; $i <= 12; $i++)
            $month[$i] = $i;
        for($i = 1930; $i < date('Y') - 10; $i++)
            $year[$i] = $i;

        $this->add(array(
                'name'          => 'day',
                'type'          => 'Select',
                'options'       => array(
                        'value_options' => $day,
                        'label' => 'Ngày: ',
                        'label_attributes'  => array(
                                'for'       => 'day',
                                'class'     => 'col-sm-3 control-label',
                        ),
                ),
                'attributes'    => array(
                        'class'         => 'form-control col-sm-2',
                ),
        ));
        $this->add(array(
                'name'          => 'month',
                'type'          => 'Select',
                'options'       => array(
                        'value_options' => $month,
                        'label' => 'Tháng: ',
                        'label_attributes'  => array(
                                'for'       => 'month',
                                'class'     => 'col-sm-3 control-label',
                        ),
                ),
                'attributes'    => array(
                        'class'         => 'form-control col-sm-2',
                ),
        ));
        $this->add(array(
                'name'          => 'year',
                'type'          => 'Select',
                'options'       => array(
                        'value_options' => $year,
                        'label' => 'Năm: ',
                        'label_attributes'  => array(
                                'for'       => 'year',
                                'class'     => 'col-sm-3 control-label',
                        ),
                ),
                'attributes'    => array(
                        'class'         => 'form-control col-sm-2',
                ),
        ));
    }
}