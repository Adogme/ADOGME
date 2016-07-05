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
	public $colaAdoptantes = array();

	public function getSource()
	{
		return "mascotas";
	}

	public function loadByArray(array $arreglo) {
		$this->nombre = $arreglo['nombre'];
		$this->raza = $arreglo['raza'];
		$this->sexo = $arreglo['sexo'];
		$this->peso = $arreglo['peso'];
		$this->altura = $arreglo['altura'];
		$this->edad = $arreglo['edad'];
		$this->descripcion = $arreglo['descripcion'];
		$this->pelo = $arreglo['pelo'];
		$this->vacuna = $arreglo['vacuna'];
		$this->urlFoto = $arreglo['urlFoto'];
		$this->colaAdoptantes = $arreglo['colaAdoptantes'];
	}
}