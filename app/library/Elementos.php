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
            'registro' => array(
                'caption' => 'Iniciar Sesion',
                'action' => 'index'
            ),
        )
    );

    public function getMenu() {

    	$auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-right']['session'] = array(
                'caption' => 'Cerrar Sesion',
                'action' => 'end'
            );
        } else {
            unset($this->_headerMenu['navbar-left']['invoices']);
        }

        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<div class="collapse navbar-collapse" id="navbar-1">';
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }

    }
}