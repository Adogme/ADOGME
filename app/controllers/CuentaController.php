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
		$arrMascotas = Usuarios::findFirst(
					array(
	            		"conditions" => array('email' => $auth['email']),
	            		"fields" => array('mascotas' => true)
            		)
				);
		
		$usuario = new Usuarios();
		$usuario->mascotas = $arrMascotas->mascotas;
		$usuario->convertToObjectMascotas();
		$mascotas = $usuario->mascotas;
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
					$page_access_token = 'EAAC2BtMOSR8BAM5tETZCgZBgp7exsy82ZCSBZCc2ZAouwsZALDnxBK8mBsGWTUWhXeuf4AYx4I0iBYDnpT42minoAr412TJgqXa8m4fei7eolsCP744IDqqZCI9p1LuAD9vNxvJyC8T6WRHGdWsGpGq1pmwt9ZCcz7CaVar3ozJ7hgZDZD';
					$page_id = '598624690319645';

					try {
				  		$args = array(
						    'access_token' => $page_access_token,
						    'message' => 'Mira esta nueva mascota en adopción!',
						    'picture' => 'http://res.cloudinary.com/ddc4n6gua/image/upload/'.$mascota->urlFoto,
						    'link' => 'https://adogme.herokuapp.com/adopcion/index',
						    'description' => $mascota->descripcion
					  	);
					  	$post_id = $this->fb->post("/598624690319645/feed", $args, $page_access_token);
					} catch (FacebookApiException $e) {
					  die($e->getMessage());
					}

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

	public function editarMascotaAction($nombreMascota)
	{
		$auth = $this->session->get('auth');
		$arrMascotas = Usuarios::findFirst(
					array(
	            		"conditions" => array('email' => $auth['email']),
	            		"fields" => array('mascotas' => true)
            		)
				);
		$usuario = new Usuarios();
		$usuario->mascotas = $arrMascotas->mascotas;
		$mascotas = $usuario->listMascotas();
		$mascota=$mascotas[0];
		$form = new RegistroMascotaForm($mascota);

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
		$auth = $this->session->get('auth');
		$usuario = Usuarios::findFirst(
					array(
	            		"conditions" => array('email' => $auth['email'])
            		)
				);

		$adopciones = $usuario->getColaAdopciones();
		
		$this->view->mascotas = $adopciones;
	}

	public function listarFavoritosAction()
	{
		
	}
}