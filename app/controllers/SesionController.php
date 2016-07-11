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

    private function _registrarSesion(Usuarios $usuario)
    {
        if($usuario->albergue) {
            $this->session->set('auth', array(
                    'email'   => $usuario->email,
                    'nombre' => $usuario->albergue
            ));
        } else {
            $this->session->set('auth', array(
                    'email'   => $usuario->email,
                    'nombre' => $usuario->nombre
            ));
        }
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
            			'email' => $email
            		)
            	)
            );

            if ($usuario) {
                if ($this->security->checkHash($password, $usuario->password)) {
                    $this->_registrarSesion($usuario);
                    return $this->response->redirect('cuenta');
                }
            }

            $this->tag->setDefault('password', '');
            $this->flash->error('Email/Contraseña Inválido');
            return $this->forward('sesion/index');
    	}
    }

    public function logoutAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');
        return $this->forward('sesion/index');
    }

    public function fbLoginAction()
    {
        $usuario = Usuarios::findFirst(
            array(
                "conditions" => array(
                    'email' => $this->request->getPost('email')
                )
            )
        );

        if(!$usuario) {
            $usuario = new Usuarios();
            $usuario->nombre = $this->request->getPost('nombre');
            $usuario->apellido = $this->request->getPost('apellido');
            $usuario->email = $this->request->getPost('email');
            $usuario->sexo = $this->request->getPost('genero')=='male'?'H':'M';
            unset($usuario->password);
            $usuario->save();
        }
        
        $this->_registrarSesion($usuario);
    }
}

