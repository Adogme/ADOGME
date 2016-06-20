<?php

use Phalcon\Mvc\Collection;

class Usuarios extends Collection
{
	public $nombre;
    public $apellido;
	public $email;
    public $password;
    public $telefono;
    public $fechaNacimiento;
    public $pais;
    public $ciudad;
    public $distrito;
    public $direccion;
    public $sexo;
    public $fechaRegistro;
    public $mascotas = array();

	public function getSource()
    {
        return "usuarios";
    }

	public function columnMap()
    {
        return array(
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'email' => 'email',
            'password' => 'password',
            'telefono' => 'telefono',
            'fechaNacimiento' => 'fechaNacimiento',
            'pais' => 'pais',
            'ciudad' => 'ciudad',
            'distrito' => 'distrito',
            'direccion' => 'direccion',
            'sexo' => 'sexo',
            'fechaRegistro' => 'fechaRegistro',
            'mascotas' => 'mascotas'
        );
    }

    public function beforeCreate() {
        $datetime = new DateTime("now", new DateTimeZone('America/Lima'));
        $this->fechaRegistro = $datetime->format('Y-m-d H:i:s');
    }

    public function listMascotas() { //Devuelve lista de objetos Mascotas
        $mascotas = array();

        foreach ($this->mascotas as $mascota) {
            $m = new Mascotas;
            $m->nombre = $mascota['nombre'];
            $m->raza = $mascota['raza'];
            $m->peso = $mascota['peso'];
            $m->altura = $mascota['altura'];
            $m->edad = $mascota['edad'];
            $m->descripcion = $mascota['descripcion'];
            $m->pelo = $mascota['pelo'];
            $m->vacuna = $mascota['vacuna'];
            $m->sexo = $mascota['sexo'];
            $m->urlFoto = $mascota['urlFoto'];

            $mascotas[] = $m;
        }

        return $mascotas;
    }
}