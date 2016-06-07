<?php

use Phalcon\Mvc\Collection;

class Mascotas extends Collection
{
	public $nombre;
	public $raza;
	public $peso;
	public $altura;
	public $edad;
	public $descripcion;
	public $pelo;
	public $vacuna;

	public function getSource()
	{
		return "mascotas";
	}

	public function columnMap()
	{
		return array(
			'nombre' => 'nombre',
			'raza' => 'raza',
			'peso' => 'peso',
			'altura' => 'altura',
			'edad' => 'edad',
			'descripcion' => 'descripcion',
			'pelo' => 'pelo',
			'vacuna' => 'vacuna'
		);
	}
}