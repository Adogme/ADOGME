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

	public function adoptarAction()
	{
		$this->view->disable();

		if($this->request->isPost() == true) {
			/*$result = Usuarios::aggregate(
				array(
					array(
						'$unwind' => '$mascotas'
					),
					array(
						'$match' => array(
							'mascotas.urlFoto' => $urlFoto
						)
					),
					array(
						'$project' => array(
							'mascotas' => 1
						)
					)
				)
			);*/

			//var_dump($result['result'][0]['mascotas']['nombre']);
			$nombreMascota = $_POST['nombreM'];
			$dueño = Usuarios::findFirst(
				array(
	            		"conditions" => array('mascotas.nombre' => $nombreMascota)
            		)
			);
			
			$result = false;
			$adoptante = $this->session->get('auth')['email'];
			$dueño->convertToObjectMascotas();
			$newMascota = $dueño->getMascotaByNombre($nombreMascota);

			if (!in_array($adoptante, $newMascota->colaAdoptantes)) {
				$newMascota->colaAdoptantes[] = $adoptante;
				$dueño->updateMascota($newMascota);
			}
			$dueño->convertToArrayMascotas();
			if ($dueño->save()) {
				$result = true;
			}

			$this->response->setJSONContent(array('res' => $result));
			$this->response->send();
		}
	}

	public function desadoptarAction()
	{
		$this->view->disable();

		if($this->request->isPost() == true) {
			$nombreMascota = $_POST['nombreM'];
			$dueño = Usuarios::findFirst(
				array(
	            		"conditions" => array('mascotas.nombre' => $nombreMascota)
            		)
			);
			
			$result = false;
			$adoptante = $this->session->get('auth')['email'];
			$dueño->convertToObjectMascotas();
			$newMascota = $dueño->getMascotaByNombre($nombreMascota);

			if (in_array($adoptante, $newMascota->colaAdoptantes)) {
				foreach ($newMascota->colaAdoptantes as $k => $candidato) {
					if ($candidato == $adoptante) {
						unset($newMascota->colaAdoptantes[$k]);
					}
				}
				$dueño->updateMascota($newMascota);
			}
			$dueño->convertToArrayMascotas();
			if ($dueño->save()) {
				$result = true;
			}

			$this->response->setJSONContent(array('res' => $result));
			$this->response->send();
		}
	}
}