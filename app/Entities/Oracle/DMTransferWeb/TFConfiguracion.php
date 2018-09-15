<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 25-01-2018
 * Time: 12:18
 */

namespace App\Entities\Oracle\DMTrasferWeb;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class TFConfiguracion implements \JsonSerializable
{
    private $id_sitio;
    private $nombre;
    private $user_ftp;
    private $pass_ftp;
    private $server_ftp;
    private $user_mail;
    private $pass_mail;
    private $server_mail;
    private $lista_precio_base;
    private $observacion;

    public function __construct()
    {

    }

    public function getIdSitio()
    {
        return $this->id_sitio;
    }

    public function setIdSitio($id_sitio)
    {
        $this->id_sitio = $id_sitio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getUserFtp()
    {
        return $this->user_ftp;
    }

    public function setUserFtp($user_ftp)
    {
        $this->user_ftp = $user_ftp;
    }

    public function getPassFtp()
    {
        return $this->pass_ftp;
    }

    public function setPassFtp($pass_ftp)
    {
        $this->pass_ftp = $pass_ftp;
    }

    public function getServerFtp()
    {
        return $this->server_ftp;
    }

    public function setServerFtp($server_ftp)
    {
        $this->server_ftp = $server_ftp;
    }

    public function getUserMail()
    {
        return $this->user_mail;
    }

    public function setUserMail($user_mail)
    {
        $this->user_mail = $user_mail;
    }

    public function getPassMail()
    {
        return $this->pass_mail;
    }

    public function setPassMail($pass_mail)
    {
        $this->pass_mail = $pass_mail;
    }

    public function getServerMail()
    {
        return $this->server_mail;
    }

    public function setServerMail($server_mail)
    {
        $this->server_mail = $server_mail;
    }

    public function getListaPrecioBase()
    {
        return $this->lista_precio_base;
    }

    public function setListaPrecioBase($lista_precio_base)
    {
        $this->lista_precio_base = $lista_precio_base;
    }

    public function getObservacion()
    {
        return $this->observacion;
    }

    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }

    public function jsonSerialize() {
        return [
            'id_sitio' => $this->getIdSitio(),
            'nombre' => $this->getNombre(),
            'user_ftp' => $this->getUserFtp(),
            'pass_ftp' => $this->getPassFtp(),
            'server_ftp' => $this->getServerFtp(),
            'user_mail' => $this->getUserMail(),
            'pass_mail' => $this->getPassMail(),
            'server_mail' => $this->getServerMail(),
            'lista_precio_base' => $this->getListaPrecioBase(),
            'observacion' => $this->getObservacion()
        ];
    }


}