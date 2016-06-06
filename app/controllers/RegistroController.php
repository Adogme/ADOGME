<?php

class RegistroController extends ControllerBase
{

	public function initialize()
    {
        $this->tag->setTitle('Registro de Usuario');
        parent::initialize();
    }

    public function indexAction()
    {
    	$form = new RegistroForm(new Usuarios);

        if ($this->request->isPost()) {

            if (!$form->isValid($_POST)) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                    //echo $message, '<br>';
                }
            } else {
                $usuario = new Usuarios();
                $form->bind($_POST,$usuario);

                $usuario->sexo = $this->request->getPost('sexo');
                unset($usuario->repeatPassword);
                
                if ($usuario->save() == false) {
                    foreach ($usuario->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
                    //$this->flash->success('Thanks for sign-up, please log-in to start generating invoices');
                    $this->tag->setDefault('email', '');
                    $this->tag->setDefault('password', '');
                    $this->flash->success('Nuevo objeto creado: ID='.$usuario->getId());
                    return $this->forward('sesion/index');
                }
            }
        }

        $this->view->form = $form;
    }

}

