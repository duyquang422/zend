<?php

namespace Block\SignUp;

use Zend\View\Helper\AbstractHelper;

class SignUp extends AbstractHelper{
    public function __invoke(){
		$form  = new \Home\Form\Register();
        require_once 'views/default.phtml';
    }
}