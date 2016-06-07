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
                /*if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }*/
                echo '<li>';
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';

    }
}