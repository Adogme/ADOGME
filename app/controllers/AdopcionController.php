<?php

class AdopcionController extends ControllerBase
{
	public function initialize()
	{
		$this->tag->setTitle('Adopcion');
        parent::initialize();
	}

	public function indexAction()
	{
		$usuarios = Usuarios::find(
			array(
				"field" => array('mascotas' => true)
			)
		);

		$mascotas = array();

		foreach ($usuarios as $usuario) {
			foreach ($usuario->listMascotas() as $um) {
				$mascotas[] = $um;
			}
		}

		$this->view->mascotas = $mascotas;
	}
}