<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;

class RegistroForm extends Form
{
	public function initialize($entity = null, $options = null)
    {
        // Nombre
        $nombre = new Text('nombre', array('placeholder' => 'Nombre'));
        $nombre->setFilters(array('striptags', 'string', 'trim'));
        $nombre->addValidators(array(
            new PresenceOf(array(
                'message' => 'Nombre Obligatorio'
            ))
        ));
        $this->add($nombre);

        // Apellido
        $apellido = new Text('apellido', array('placeholder' => 'Apellido'));
        $apellido->setFilters(array('striptags', 'string', 'trim'));
        $apellido->addValidators(array(
            new PresenceOf(array(
                'message' => 'Apellido Obligatorio'
            ))
        ));
        $this->add($apellido);

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

        // Telefono
        $telefono = new Text('telefono', array('placeholder' => 'Telefono'));
        $telefono->setFilters(array('int'));
        $telefono->addValidators(array(
            new PresenceOf(array(
                'message' => 'Telefono Obligatorio'
            ))
        ));
        $this->add($telefono);

        // Pais
        $pais = new Text('pais', array('placeholder' => 'Pais'));
        $pais->setFilters(array('striptags', 'string', 'trim'));
        $pais->addValidators(array(
            new PresenceOf(array(
                'message' => 'Pais Obligatorio'
            ))
        ));
        $this->add($pais);

        // Ciudad
        $ciudad = new Text('ciudad', array('placeholder' => 'Ciudad'));
        $ciudad->setFilters(array('striptags', 'string', 'trim'));
        $ciudad->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ciudad Obligatorio'
            ))
        ));
        $this->add($ciudad);

        // Distrito
        $distrito = new Text('distrito', array('placeholder' => 'Distrito'));
        $distrito->setFilters(array('striptags', 'string', 'trim'));
        $distrito->addValidators(array(
            new PresenceOf(array(
                'message' => 'Distrito Obligatorio'
            ))
        ));
        $this->add($distrito);

        // Direccion
        $distrito = new Text('direccion', array('placeholder' => 'Direccion'));
        $distrito->setFilters(array('striptags', 'string', 'trim'));
        $distrito->addValidators(array(
            new PresenceOf(array(
                'message' => 'Direccion Obligatorio'
            ))
        ));
        $this->add($distrito);

        // Password
        $password = new Password('password', array('placeholder' => 'Password'));
        $password->setFilters(array('trim'));
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password Obligatorio'
            ))
        ));
        $this->add($password);

        // Confirm Password
        $repeatPassword = new Password('repeatPassword', array('placeholder' => 'Confirmar Password'));
        $repeatPassword->setFilters(array('trim'));
        $repeatPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'Confirmacion de password obligatorio'
            )),
            new Confirmation(array(
                'message' => 'No coincide con el password',
                'with' => 'password'
            ))
        ));
        $this->add($repeatPassword);

        // Sexo
        $hombre = new Radio('hombre', array('name' => 'sexo', 'value' => 'H'));
        $hombre->setLabel('Hombre');
        $mujer = new Radio('mujer', array('name' => 'sexo', 'value' => 'M'));
        $mujer->setLabel('Mujer');
        $this->add($hombre);
        $this->add($mujer);

        //fechaNacimiento
        $fechaNacimiento = new Date('fechaNacimiento');
        $fechaNacimiento->setLabel('Fecha Nacimiento');
        $this->add($fechaNacimiento);

        //Nombre del albergue
        $albergue = new Text('albergue', array('placeholder' => 'Nombre albergue'));
        $albergue->setFilters(array('striptags', 'string', 'trim'));
        $albergue->addValidators(array(
            new PresenceOf(array(
                'message' => 'Nombre de albergue obligatorio'
            ))
        ));
        $this->add($albergue);
    }
}