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
            'fechaRegistro' => 'fechaRegistro'
        );
    }

    public function beforeCreate() {
        $datetime = new DateTime("now", new DateTimeZone('America/Lima'));
        $this->fechaRegistro = $datetime->format('Y-m-d H:i:s');
    }

    public function beforeSave() {
        $this->password = sha1($this->password);
    }
}