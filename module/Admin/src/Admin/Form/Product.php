<?php
namespace Admin\Form;
use Admin\Model\CategoryTable;
use Admin\Form\Fieldset;
use Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Product extends Form {
	
	public function __construct(){
		parent::__construct();

        $this->setAttributes(array(
            'action'	=> '',
            'method'	=> 'POST',
            'name'		=> 'product-form',
            'id'		=> 'data-form',
            'enctype'   => 'multipart/form-data'
        ));

        $this->add(new Fieldset\Name());
        $this->add(new Fieldset\Status());
        $this->add(new Fieldset\Alias());
        $this->add(new Fieldset\Info());
        $this->add(new Fieldset\SEO());
        $this->add(new Fieldset\Upload());

        $this->add([
            'name' => 'price',
            'type' => 'Text',
            'attributes' => [
                'class' => 'input-large-text',
                'id' => 'price'
            ],
            'options' => [
                'label' => 'Giá gốc:',
                'label_attributes' => [
                    'for' => 'price',
                    'class' => 'col-xs-4 control-label',
                ]
            ],
        ]);

        $this->add([
            'name' => 'sale_off',
            'type' => 'Text',
            'attributes' => [
                'class' => 'input-large-text',
                'id' => 'sale-off'
            ],
            'options' => [
                'label' => 'Giá giảm:',
                'label_attributes' => [
                    'for' => 'sale off',
                    'class' => 'col-xs-4 control-label',
                ]
            ],
        ]);

        $this->add([
            'name' => 'percent_discount',
            'type' => 'Text',
            'attributes' => [
                'class' => 'input-large-text',
                'id' => 'percent-discount'
            ],
            'options' => [
                'label' => '% giảm:',
                'label_attributes' => [
                    'for' => 'percent discount',
                    'class' => 'col-xs-4 control-label',
                ]
            ],
        ]);

        $this->add([
            'name' => 'code',
            'type' => 'Text',
            'attributes' => [
                'class' => 'input-large-text',
                'id' => 'code'
            ],
            'options' => [
                'label' => 'Mã sản phẩm',
                'label_attributes' => [
                    'for' => 'code',
                    'class' => 'control-label'
                ]
            ],
        ]);

        $this->add([
            'name' => 'size',
            'type' => 'Text',
            'attributes' => [
                'class' => 'input-large-text',
                'id' => 'size',
                'placeholder' => 'Kích thước',
                'autocomplete' => "off"
            ],
        ]);
	}
}