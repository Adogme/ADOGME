<?php

use Phalcon\Mvc\Collection;

class Mascotas extends Collection
{
	public $nombre;
	public $raza;
	public $sexo;
	public $peso;
	public $altura;
	public $edad;
	public $descripcion;
	public $pelo;
	public $vacuna;
	public $urlFoto;

	public function getSource()
	{
		return "mascotas";
	}
}