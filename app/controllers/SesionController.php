<?php

class SesionController extends ControllerBase
{

	public function initialize()
    {
        $this->tag->setTitle('Iniciar Sesion');
        parent::initialize();
    }

    public function indexAction()
    {
    	$form = new LoginForm;
    	$this->view->form = $form;
    }

    public function loginAction()
    {
    	if (!$this->request->isPost()) {
    		return $this->response->redirect('sesion/index');
    	} else {
    		$email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usuario = Usuarios::findFirst(
            	array(
            		"conditions" => array(
            			'email' => $email,
            			'password' => sha1($password)
            		)
            	)
            );

            if ($usuario) {
            	$this->_registrarSesion($usuario);

            	return $this->response->redirect('Cuenta');
            }

            $this->flash->error('Wrong email/password');
    	}
    }

    private function _registrarSesion($usuario)
    {
        $this->session->set(
            'auth',
            array(
                //'id'   => $usuario->getId(),
                'name' => $usuario->name
            )
        );
    }
}

