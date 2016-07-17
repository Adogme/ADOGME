<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;

class RegistroMascotaForm extends Form
{
	public function initialize($entity = null, $options = null)
	{
		//Nombre
		$nombre = new Text('nombre', array('placeholder' => 'Nombre'));
		$nombre->setFilters(array('striptags', 'string', 'trim'));
		$nombre->addValidators(array(
            new PresenceOf(array(
                'message' => 'Nombre Obligatorio'
            ))
        ));
        $this->add($nombre);

		//Raza
		$raza = new Text('raza', array('placeholder' => 'Raza'));
		$raza->setFilters(array('striptags', 'string', 'trim'));
		$this->add($raza);

		//Peso
		$peso = new Numeric('peso', array('placeholder' => 'Peso'));
		$this->add($peso);

		//Altura
		$altura = new Numeric('altura', array('placeholder' => 'Altura'));
		$this->add($altura);

		//Años
		$edad = new Numeric('edad', array('placeholder' => 'años'));
		$this->add($edad);

		//Meses
		$meses = new Numeric('meses', array('placeholder' => 'meses'));
		$this->add($meses);

		//Descripcion
		$descripcion = new TextArea('descripcion', array('placeholder' => 'Descripcion', 'rows' => '5'));
		$raza->setFilters(array('string', 'trim'));
		$this->add($descripcion);

		//Pelo
		$peloS = new Radio('small', array('name' => 'pelo', 'value' => 'S'));
        $peloS->setLabel('Corto');
        $this->add($peloS);

        $peloM = new Radio('medium', array('name' => 'pelo', 'value' => 'M'));
        $peloM->setLabel('Mediano');
        $this->add($peloM);

        $peloL = new Radio('large', array('name' => 'pelo', 'value' => 'L'));
        $peloL->setLabel('Largo');
        $this->add($peloL);

		//Vacuna
		$rabia = new Check('rabia', array('name' => 'vacuna', 'value' => 'rabia'));
		$rabia->setLabel('Rabia');
		$this->add($rabia);

		$distemper = new Check('distemper', array('name' => 'vacuna', 'value' => 'distemper'));
		$distemper->setLabel('Distemper');
		$this->add($distemper);

		$polivalente = new Check('polivalente', array('name' => 'vacuna', 'value' => 'polivalente'));
		$polivalente->setLabel('Polivalente');
		$this->add($polivalente);

		//Sexo
		$macho = new Radio('macho', array('name' => 'sexo', 'value' => 'Macho'));
		$macho->setLabel('Macho');
		$hembra = new Radio('hembra', array('name' => 'sexo', 'value' => 'Hembra'));
		$hembra->setLabel('Hembra');
		$this->add($macho);
		$this->add($hembra);
	}
}