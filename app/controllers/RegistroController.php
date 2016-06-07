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
                $usuario->password = $this->security->hash($usuario->password);
                
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

    public function ajaxPaisAction()
    {
        $this->view->disable();

        if($this->request->isGet()) {
            if($this->request->isAjax()) {
                if(!isset($_REQUEST['term']))
                    exit();

                $input = $_GET['term'];
                $paises = Paises::find(
                    array(
                        'conditions' => array('nombre' => new MongoRegex('/^'.$input.'/i')),
                        'limit' => 5
                    )
                );

                $data = array();

                foreach ($paises as $pais) {
                    $data[] = $pais->nombre;
                }

                $this->response->setJsonContent($data);
                $this->response->send();
            }
        }
    }

    public function ajaxCiudadAction()
    {
        $this->view->disable();

        if($this->request->isGet()) {
            if($this->request->isAjax()) {
                if(!isset($_REQUEST['term']))
                    exit();

                $input = $_GET['term'];
                $ciudades = Ciudades::find(
                    array(
                        'conditions' => array('nombre' => new MongoRegex('/^'.$input.'/i')),
                        'limit' => 5
                    )
                );

                $data = array();

                foreach ($ciudades as $ciudad) {
                    $data[] = $ciudad->nombre;
                }

                $this->response->setJsonContent($data);
                $this->response->send();
            }
        }
    }

    public function ajaxDistritoAction()
    {
        $this->view->disable();

        if($this->request->isGet()) {
            if($this->request->isAjax()) {
                if(!isset($_REQUEST['term']))
                    exit();

                $input = $_GET['term'];
                $distritos = Distritos::find(
                    array(
                        'conditions' => array('nombre' => new MongoRegex('/^'.$input.'/i')),
                        'limit' => 5
                    )
                );

                $data = array();

                foreach ($distritos as $distrito) {
                    $data[] = $distrito->nombre;
                }

                $this->response->setJsonContent($data);
                $this->response->send();
            }
        }
    }
}

