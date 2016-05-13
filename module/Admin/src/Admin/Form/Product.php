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

        $this->add(array(
            'name' => 'price',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'price'
            ),
            'options' => array(
                'label' => 'Giá gốc:',
                'label_attributes' => array(
                    'for' => 'price',
                    'class' => 'col-xs-4 control-label',
                )
            ),
        ));

        $this->add(array(
            'name' => 'sale_off',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'sale-off'
            ),
            'options' => array(
                'label' => 'Giá giảm:',
                'label_attributes' => array(
                    'for' => 'sale off',
                    'class' => 'col-xs-4 control-label',
                )
            ),
        ));

        $this->add(array(
            'name' => 'quantity',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'quantity'
            ),
            'options' => array(
                'label' => 'Số lượng:',
                'label_attributes' => array(
                    'for' => 'quantity',
                    'class' => 'col-xs-4 control-label',
                )
            ),
        ));

        $this->add(array(
            'name' => 'percent_discount',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'percent-discount'
            ),
            'options' => array(
                'label' => '% giảm:',
                'label_attributes' => array(
                    'for' => 'percent discount',
                    'class' => 'col-xs-4 control-label',
                )
            ),
        ));

        $this->add(array(
            'name' => 'code',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'code'
            ),
            'options' => array(
                'label' => 'Mã sản phẩm',
                'label_attributes' => array(
                    'for' => 'code',
                    'class' => 'control-label'
                )
            ),
        ));

        $this->add(array(
            'name' => 'size',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'size',
                'placeholder' => 'Tìm Kích thước Sản phẩm',
                'autocomplete' => "off"
            ),
        ));

        $this->add(array(
            'name' => 'attributes',
            'type' => 'Text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'attributes',
                'placeholder' => 'Tìm Thuộc tính sản phẩm',
                'autocomplete' => "off"
            ),
        ));

        $this->add(array(
            'name' => 'tag',
            'type' => 'text',
            'attributes' => array(
                'class' => 'input-large-text',
                'id' => 'tag',
                'placeholder' => 'Vui lòng chọn thẻ SEO',
                'autocomplete' => "off"
            ),
        ));


	}
}