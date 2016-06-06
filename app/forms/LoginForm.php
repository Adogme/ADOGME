<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Radio;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class LoginForm extends Form
{
	public function initialize($entity = null, $options = null)
	{
		// Email
        $email = new Text('email', array('placeholder' => 'Email'));
        $email->setFilters('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'E-mail Obligatorio'
            )),
            new Email(array(
                'message' => 'E-mail no válido'
            ))
        ));
        $this->add($email);

        // Password
        $password = new Password('password', array('placeholder' => 'Password'));
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password Obligatorio'
            ))
        ));
        $this->add($password);
	}
}