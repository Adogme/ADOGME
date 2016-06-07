<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;

class RegistroMascota extends Form
{
	public function initialize($entity = null, $options = null)
	{
		//Nombre
		$nombre = new Text('nombre', array('placeholder' => 'Nombre'));
		$nombre->setFilter(array('striptags', 'string', 'trim'));
		$nombre->addValidators(array(
            new PresenceOf(array(
                'message' => 'Nombre Obligatorio'
            ))
        ));
        $this->add($nombre);

		//Raza
		$raza = new Text('raza', array('placeholder' => 'Raza'));
		$raza->setFilter(array('striptags', 'string', 'trim'));
		$this->add($raza);

		//Peso
		$peso = new Numeric('peso', array('placeholder' => 'Peso'));
		$this->add($peso);

		//Altura
		$altura = new Numeric('altura', array('placeholder' => 'Altura'));
		$this->add($altura);

		//Edad
		$edad = new Numeric('edad', array('placeholder' => 'Edad'));
		$this->add($edad);

		//Descripcion
		$descripcion = new Text('descripcion', array('placeholder' => 'Descripcion'));
		$raza->setFilter(array('string', 'trim'));
		$this->add($descripcion);

		//Pelo
		$peloS = new Radio('small', array('name' => 'pelo', 'value' => 'S'));
        $peloS->setLabel('S');
        $this->add($peloS);

        $peloM = new Radio('medium', array('name' => 'pelo', 'value' => 'M'));
        $peloM->setLabel('M');
        $this->add($peloM);

        $peloL = new Radio('large', array('name' => 'pelo', 'value' => 'L'));
        $peloL->setLabel('L');
        $this->add($peloL);

		//Vacuna
		$vacuna = new Check('vacuna');
		$this->add($vacuna);

		//Enfermedades


	}
}