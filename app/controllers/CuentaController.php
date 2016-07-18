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
		$auth = $this->session->get('auth');
		$usuario = Usuarios::findFirst(
			array(
				"conditions" => array('email' => $auth['email'])
			)
		);

		$this->view->usuario = $usuario;
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
				$mascota->estado = 'En Espera';

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

	public function editarEstadoAction()
	{
		$this->view->disable();

		if($this->request->isPost()) {
			$urlFoto = $_POST['urlFoto'];
			$estado = $_POST['estado'];

			$dueño = Usuarios::findFirst(
				array(
	            		"conditions" => array('mascotas.urlFoto' => $urlFoto)
            		)
			);
			$dueño->convertToObjectMascotas();
			$newMascota = $dueño->getMascotaByUrlFoto($urlFoto);
			$result = false;

			if($estado=='espera') {
				$newMascota->estado = 'En Adopcion';
				$dueño->updateMascota($newMascota);
				$dueño->convertToArrayMascotas();
				if ($dueño->save()) {
					$result = true;
				}
			} else {
				$newMascota->estado = 'En Espera';
				$dueño->updateMascota($newMascota);
				$dueño->convertToArrayMascotas();
				if ($dueño->save()) {
					$result = true;
				}
			}

			$this->response->setJSONContent(
				array(
					'res' => $result, 
					'descripcion' => $newMascota->descripcion,
					'urlFoto' => $newMascota->urlFoto
				));
			$this->response->send();
		}
	}

	public function postearFBAction()
	{
		$this->view->disable();

		if($this->request->isPost()) {
			$urlFoto = $_POST['imagen'];
			$descripcion = $_POST['descripcion'];
			$result = false;

			$page_access_token = 'EAAC2BtMOSR8BAAWYEGDzaZAXZA7erZCDijJITaA4Hj6ZBrFqBMFI5uakKMkZAZCZCwdLhnGOetkWvXKuPsZCfi1Uahk2i1zI5cvMlNaa2TqCy8fAS59l9x74011KaZBkHstZAu9Yo0s1iBJ5Hlg4zvwEPvK5vEvJh8MF0ZD';
			$page_id = '598624690319645';

			try {
		  		$args = array(
				    'access_token' => $page_access_token,
				    'message' => 'Mira esta nueva mascota en adopción!',
				    'picture' => 'http://res.cloudinary.com/ddc4n6gua/image/upload/'.$urlFoto,
				    'link' => 'https://adogme.herokuapp.com/adopcion/index/'.$urlFoto,
				    'description' => $descripcion
			  	);
			  	$post_id = $this->fb->post("/598624690319645/feed", $args, $page_access_token);
			  	$result = true;
			} catch (FacebookApiException $e) {
			  die($e->getMessage());
			}

			$this->response->setJSONContent(
				array(
					'res' => $result
				));
			$this->response->send();
		}
	}

	public function seleccionarAdoptanteAction()
	{
		$this->view->disable();

		if($this->request->isPost()) {
			$email = $_POST['email'];

			
		}
	}

	public function panelAction()
	{
		
	}
}