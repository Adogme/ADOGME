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
	public $meses;
	public $descripcion;
	public $pelo;
	public $caracteristicas = array();
	public $vacuna = array();
	public $urlFoto;
	public $colaAdoptantes = array();
	public $estado;
	public $historial = array();
	public $fechaObtencion;
	public $fechaRegistro;


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
		$this->meses = $arreglo['meses'];
		$this->descripcion = $arreglo['descripcion'];
		$this->pelo = $arreglo['pelo'];
		$this->caracteristicas = $arreglo['caracteristicas'];
		$this->vacuna = $arreglo['vacuna'];
		$this->urlFoto = $arreglo['urlFoto'];
		$this->colaAdoptantes = $arreglo['colaAdoptantes'];
		$this->estado = $arreglo['estado'];
		$this->historial = $arreglo['historial'];
		$this->fechaObtencion = $arreglo['fechaObtencion'];
		$this->fechaRegistro = $arreglo['fechaRegistro'];
	}
}