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

	public function loadByArray(array $arreglo) {
		$nombre = $arreglo['nombre'];
		$raza = $arreglo['raza'];
		$sexo = $arreglo['sexo'];
		$peso = $arreglo['peso'];
		$altura = $arreglo['altura'];
		$edad = $arreglo['edad'];
		$descripcion = $arreglo['descripcion'];
		$pelo = $arreglo['pelo'];
		$vacuna = $arreglo['vacuna'];
		$urlFoto = $arreglo['urlFoto'];
	}
}