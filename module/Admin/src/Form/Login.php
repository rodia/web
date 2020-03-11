<?php

namespace Admin\Login;

use Laminas\Form\Element;
use Laminas\Form\Form;

class Login extends Form
{
	public function buildForm()
    {
    	$this->setAttribute('method', 'post');

    	$login = new Element\Text('login');
        $login->setLabel('Login')
              ->setAttribute('placeholder', 'Login');

        $password = new Element\Password();
        $password->setLabel('Password');

        $this->add($login)
        	->add($password)
    }
}
