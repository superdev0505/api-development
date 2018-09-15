<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 21-02-2018
 * Time: 10:53
 */

namespace App\Entities\MySql\Cerberus;

// use Illuminate\Database\Eloquent\Model;

class PerfilUsuario implements \JsonSerializable
{
    private $id;
    private $nombre_perfil;
    private $cantidad;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombrePerfil()
    {
        return ($this->nombre_perfil) ? $this->nombre_perfil : 0;
    }

    public function setNombrePerfil($nombre_perfil)
    {
        $this->nombre_perfil = $nombre_perfil;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function jsonSerialize()
    {
        return [
            'perfil_id' => $this->getId(),
            'perfil_nombre' => $this->getNombrePerfil(),
            'cantidad' => $this->getCantidad()
        ];
    }

}
