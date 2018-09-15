<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 07-02-2018
 * Time: 14:23
 */


namespace App\Entities\MySql\Cerberus;

class GrupoUsuario implements \JsonSerializable
{
    private $id_grupo;
    private $nombre_grupo;
    private $direccion;
    private $mail_encargado;
    private $id_perfil;
    private $perfil_nombre;
    private $peticiones_realizadas;
    private $limite_peticiones;
    private $fecha_creacion;
    private $api_key;

    public function __construct()
    {

    }

    public function getIdGrupo()
    {
        return $this->id_grupo;
    }

    public function setIdGrupo($id_grupo)
    {
        $this->id_grupo = $id_grupo;
    }

    public function getNombreGrupo()
    {
        return $this->nombre_grupo;
    }

    public function setNombreGrupo($nombre_grupo)
    {
        $this->nombre_grupo = $nombre_grupo;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getMailEncargado()
    {
        return $this->mail_encargado;
    }

    public function setMailEncargado($mail_encargado)
    {
        $this->mail_encargado = $mail_encargado;
    }

    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
    }

    public function getPerfilNombre()
    {
        return $this->perfil_nombre;
    }

    public function setPerfilNombre($perfil_nombre)
    {
        $this->perfil_nombre = $perfil_nombre;
    }

    public function getPeticionesRealizadas()
    {
        return $this->peticiones_realizadas;
    }

    public function setPeticionesRealizadas($peticiones_realizadas)
    {
        $this->peticiones_realizadas = $peticiones_realizadas;
    }

    public function getLimitePeticiones()
    {
        return $this->limite_peticiones;
    }

    public function setLimitePeticiones($limite_peticiones)
    {
        $this->limite_peticiones = $limite_peticiones;
    }

    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    public function jsonSerialize() {
        return [
            'id_grupo' => $this->getIdGrupo(),
            'nombre_grupo' => $this->getNombreGrupo(),
            'direccion' => $this->getDireccion(),
            'mail_encargado' => $this->getMailEncargado(),
            'id_perfil' => $this->getIdPerfil(),
            'peticiones_realizadas' => $this->getPeticionesRealizadas(),
            'limite_peticiones' => $this->getLimitePeticiones(),
            'fecha_creacion' => $this->getFechaCreacion(),
            'api_key' => $this->getApiKey(),
            'perfil_nombre' => $this->getPerfilNombre()
        ];
    }
}

/*
*/