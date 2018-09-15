<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 05-02-2018
 * Time: 11:14
 */

namespace App\Entities\MySql\Cerberus;

use Illuminate\Database\Eloquent\Model;

class UsuarioBIEntity implements \JsonSerializable // extends Model { //
{
    private $nombre;
    private $apellido;
    private $nickname;
    private $email;
    private $telefono;
    private $clave;
    private $id_grupo_usuario;
    private $api_key;
    private $peticiones_realizadas;
    private $limite_peticiones;
    private $fecha_creacion;
    private $fecha_modificacion;
    private $activo;
    private $nombre_grupo;
    private $nombre_perfil;

    public function __construct()
    {

    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function getIdGrupoUsuario()
    {
        return $this->id_grupo_usuario;
    }

    public function setIdGrupoUsuario($id_grupo_usuario)
    {
        $this->id_grupo_usuario = $id_grupo_usuario;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
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

    public function getFechaModificacion()
    {
        return $this->fecha_modificacion;
    }

    public function setFechaModificacion($fecha_modificacion)
    {
        $this->fecha_modificacion = $fecha_modificacion;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    public function getNombreGrupo()
    {
        return $this->nombre_grupo;
    }

    public function setNombreGrupo($nombre_grupo)
    {
        $this->nombre_grupo = $nombre_grupo;
    }

    public function getNombrePerfil()
    {
        return $this->nombre_perfil;
    }

    public function setNombrePerfil($nombre_perfil)
    {
        $this->nombre_perfil = $nombre_perfil;
    }

    public function jsonSerialize() {
        return [
            'nombre' => $this->getNombre(),
            'apellido' => $this->getApellido(),
            'nickname' => $this->getNickname(),
            'email' => $this->getEmail(),
            'telefono' => $this->getTelefono(),
            'clave' => $this->getClave(),
            'id_grupo_usuario' => $this->getIdGrupoUsuario(),
            'api_key' => $this->getApiKey(),
            'peticiones_realizadas' => $this->getPeticionesRealizadas(),
            'limite_peticiones' => $this->getLimitePeticiones(),
            'fecha_creacion' => $this->getFechaCreacion(),
            'fecha_modificacion' => $this->getFechaModificacion(),
            'activo' => $this->getActivo(),
            'grupousuario_nombre' => $this->getNombreGrupo(),
            'perfil_nombre' => $this->getNombrePerfil()
        ];
    }
}