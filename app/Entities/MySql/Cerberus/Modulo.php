<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 27-02-2018
 * Time: 15:45
 */

namespace App\Entities\MySql\Cerberus;

// use Illuminate\Database\Eloquent\Model;

class Modulo implements \JsonSerializable
{
    private $id_modulo;
    private $titulo_modulo_backend;
    private $titulo_modulo_frontend;
    private $titulo_modulo_gui;

    public function __construct()
    {
    }

    public function getIdModulo()
    {
        return $this->id_modulo;
    }

    public function setIdModulo($id_modulo)
    {
        $this->id_modulo = $id_modulo;
    }

    public function getTituloModuloBackend()
    {
        return $this->titulo_modulo_backend;
    }

    public function setTituloModuloBackend($titulo_modulo_backend)
    {
        $this->titulo_modulo_backend = $titulo_modulo_backend;
    }

    public function getTituloModuloFrontend()
    {
        return $this->titulo_modulo_frontend;
    }

    public function setTituloModuloFrontend($titulo_modulo_frontend)
    {
        $this->titulo_modulo_frontend = $titulo_modulo_frontend;
    }

    public function getTituloModuloGui()
    {
        return $this->titulo_modulo_gui;
    }

    public function setTituloModuloGui($titulo_modulo_gui)
    {
        $this->titulo_modulo_gui = $titulo_modulo_gui;
    }


    public function jsonSerialize()
    {
        return [
            'modulo_id' => $this->getIdModulo(),
            'modulo_nombre' => $this->getTituloModuloFrontend(),
            'modulo_nombre_backend' => $this->getTituloModuloBackend()
        ];
    }
}