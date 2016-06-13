<?php

class CuentaController extends ControllerBase
{
	public function initialize()
	{
		$this->tag->setTitle('Cuenta');
        parent::initialize();
	}

	public function indexAction()
	{
		
	}

	public function listarMascotasAction()
	{
		$mascotas = Mascotas::find();
		$this->view->mascotas = $mascotas;
	}

	public function registrarMascotaAction()
	{
		$form = new RegistroMascotaForm(new Mascotas);

		if ($this->request->isPost()) {
			if (!$form->isValid($_POST)) {
				foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
			} else {
				$mascota = new Mascotas();
				$form->bind($_POST, $mascota);

				if ($mascota->save()) {
					return $this->forward('cuenta/listarMascotas');
				} else {
					foreach ($usuario->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
				}
			}
		}

		$this->view->form = $form;
	}

	public function editarMascotaAction()
	{
		$form = new RegistroMascotaForm(new Mascotas);

		if ($this->request->isPost()) {
			if (!$form->isValid($_POST)) {
				foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
			} else {
				$mascota = new Mascotas();
				$form->bind($_POST, $mascota);

				if ($mascota->save()) {
					return $this->forward('cuenta/listarMascotas');
				} else {
					foreach ($usuario->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
				}
			}
		}

		$this->view->form = $form;
	}

	public function listarAdopcionesAction()
	{

	}

	public function listarFavoritosAction()
	{
		
	}
}