<?php

use Phalcon\Mvc\User\Component;

class Elementos extends Component
{
	private $_headerMenu = array(
        'navbar-left' => array(
            'index' => array(
                'caption' => 'Inicio',
                'action' => 'index'
            ),
            'adopcion' => array(
                'caption' => 'Adopcion',
                'action' => 'index'
            ),
            'cuenta' => array(
                'caption' => 'Cuenta',
                'action' => 'index'
            ),
        ),
        'navbar-right' => array(
            'cuenta' =>array(
                'caption' => 'Usuario',
                'action' => 'index'
            ),
            'sesion' => array(
                'caption' => 'Iniciar Sesion',
                'action' => 'index'
            )
        )
    );

    private $_leftBar = array(
        'General' => array(
            'controller' => 'cuenta',
            'action' => 'index'
        ),
        'Mis Mascotas' => array(
            'controller' => 'cuenta',
            'action' => 'listarMascotas'
        ),
        'Adopciones' => array(
            'controller' => 'cuenta',
            'action' => 'listarAdopciones'
        ),
        'Favoritos' => array(
            'controller' => 'cuenta',
            'action' => 'listarFavoritos'
        )
    );

    public function getMenu() {

    	$auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-right']['sesion'] = array(
                'caption' => 'Cerrar Sesion',
                'action' => 'logout'
            );
            $this->_headerMenu['navbar-right']['cuenta'] = array(
                'caption' => $auth["nombre"],
                'action' => 'index'
            );
        } else {
            unset($this->_headerMenu['navbar-right']['cuenta']);
        }

        $controllerName = $this->view->getControllerName();
        echo '<div class="collapse navbar-collapse" id="navbar-1">';
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                echo '<li>';
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';

    }

    public function getLeftBar() {
        echo '<div class="left-sidebar">';
        echo '<div class="content">';
        echo '<ul>';
        foreach ($this->_leftBar as $opcion => $ruta) {
            echo '<li>';
            echo $this->tag->linkTo($ruta['controller'] . '/' . $ruta['action'], $opcion);
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }

    public function getImgCloud($nombre, $opciones = null) {
        echo cl_image_tag($nombre, $opciones);
    }
}