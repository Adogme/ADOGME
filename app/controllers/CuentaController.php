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
		$auth = $this->session->get('auth');
		$usuario = Usuarios::findFirst(
					array(
	            		"conditions" => array('email' => $auth['email']),
	            		"field" => array('mascotas' => true)
            		)
				);

		$mascotas = $usuario->listMascotas();
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
				$auth = $this->session->get('auth');
				$usuario = Usuarios::findFirst(
					array(
	            		"conditions" => array(
	            			'email' => $auth['email']
	            		)
            		)
				);

				$mascota = new Mascotas();
				$form->bind($_POST, $mascota);
				$mascota->pelo = $this->request->getPost('pelo');
				$mascota->sexo = $this->request->getPost('sexo');
				$mascota->urlFoto = $this->request->getPost('fotoID');

				$usuario->mascotas[] = $mascota->toArray();

				if ($usuario->save()) {
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

	public function deleteMascotaAction()
	{
		
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