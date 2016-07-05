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
            $m->colaAdoptantes = $mascota['colaAdoptantes'];

            $mascotas[] = $m;
        }

        return $mascotas;
    }

    public function convertToObjectMascotas() { //Convierte en lista de mascotas objetos
        if (isset($this->mascotas)) {
            $misMascotas = $this->listMascotas();
            $this->mascotas = $misMascotas;
        }
    }

    public function convertToArrayMascotas() { //Convierte la lista de mascotas a arrays
        if (isset($this->mascotas)) {
            $misMascotas = array();
            foreach ($this->mascotas as $mascota) {
                if ($mascota instanceof Mascotas) {
                    $misMascotas[] = $mascota->toArray();
                } else {
                    $misMascotas[] = $mascota;
                }
            }
            $this->mascotas = $misMascotas;
        }
    }

    public function getMascotaByUrlFoto($urlFoto) {
        $mascotaResult = new Mascotas();
        foreach ($this->mascotas as $mascota) {
            if ($mascota->urlFoto == $urlFoto) {
                $mascotaResult = $mascota;
            }
        }
        return $mascotaResult;
    }

    public function getMascotaByNombre($nombre) {
        $mascotaResult = new Mascotas();
        foreach ($this->mascotas as $mascota) {
            if ($mascota->nombre == $nombre) {
                $mascotaResult = $mascota;
            }
        }
        return $mascotaResult;
    }

    public function updateMascota($newMascota) {
        foreach ($this->mascotas as $mascota) {
            if ($mascota->nombre == $newMascota->nombre) {
                $mascota = $newMascota;
            }
        }
    }

    public function getColaAdopciones() {
        $result = Usuarios::aggregate(
            array(
                array(
                    '$unwind' => '$mascotas'
                ),
                array(
                    '$unwind' => '$mascotas.colaAdoptantes'
                ),
                array(
                    '$match' => array(
                        'mascotas.colaAdoptantes' => $this->email
                    )
                ),
                array(
                    '$project' => array(
                        'mascotas' => 1
                    )
                )
            )
        );

        $mascotas = array();

        foreach ($result['result'] as $resultado) {
            $mascota = new Mascotas();
            $mascota->loadByArray($resultado['mascotas']);
            $mascotas[] = $mascota;
        }

        return $mascotas;
    }
}