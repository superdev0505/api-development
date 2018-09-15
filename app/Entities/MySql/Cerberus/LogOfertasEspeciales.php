<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 21/03/2018
 * Time: 18:11
 */

namespace App\Entities\MySql\Cerberus;

use App\PDO\MySql\Cerberus\UsuariosPortalBIPDO;
use Carbon\Carbon;

class LogOfertasEspeciales implements \JsonSerializable
{
    private $id_numero;
    private $rut_cliente;
    private $codigo_producto;
    private $precio;
    private $costo;
    private $margen;
    private $fecha_inicio;
    private $fecha_termino;
    private $cantidad;
    private $usr_creac;
    private $codigo_emp;
    private $codigo_mon;
    private $tipo;
    private $fecha_creacion;
    private $accion;
    private $id;

    public function __construct()
    {
        $this->fecha_creacion = Carbon::now()->toDateTimeString();
    }

    public function getIdNumero()
    {
        return $this->id_numero;
    }

    public function setIdNumero($id_numero)
    {
        $this->id_numero = $id_numero;
    }

    public function getRutCliente()
    {
        return $this->rut_cliente;
    }

    public function setRutCliente($rut_cliente)
    {
        $this->rut_cliente = $rut_cliente;
    }

    public function getCodigoProducto()
    {
        return $this->codigo_producto;
    }

    public function setCodigoProducto($codigo_producto)
    {
        $this->codigo_producto = $codigo_producto;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function getMargen()
    {
        return $this->margen;
    }

    public function setMargen($margen)
    {
        $this->margen = $margen;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaTermino()
    {
        return $this->fecha_termino;
    }

    public function setFechaTermino($fecha_termino)
    {
        $this->fecha_termino = $fecha_termino;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getUsrCreac()
    {
        return $this->usr_creac;
    }

    public function setUsrCreac($usr_creac)
    {
        $this->usr_creac = $usr_creac;
    }

    public function setUsrCreacByApiKey($usr_creacapikey)
    {
        // Obtener nombre de usuario por su API KEY
        $usuario = UsuariosPortalBIPDO::where('api_key', '=', $usr_creacapikey)
            -> first();
        if ($usuario) {
            $this->usr_creac = $usuario->nickname;
        }
        else {
            $this->usr_creac = 'NOT FOUND USER';
        }
    }

    public function getCodigoEmp()
    {
        return $this->codigo_emp;
    }

    public function setCodigoEmp($codigo_emp)
    {
        $this->codigo_emp = $codigo_emp;
    }

    public function getCodigoMon()
    {
        return $this->codigo_mon;
    }

    public function setCodigoMon($codigo_mon)
    {
        $this->codigo_mon = $codigo_mon;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getAccion()
    {
        return $this->accion;
    }

    public function setAccion($accion)
    {
        $this->accion = $accion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function jsonSerialize()
    {
        return [
            'id_numero' => $this->getIdNumero(),
            'rut_cliente' => $this->getRutCliente(),
            'codigo_producto' => $this->getCodigoProducto(),
            'precio' => $this->getPrecio(),
            'costo' => $this->getCosto(),
            'margen' => $this->getMargen(),
            'fecha_inicio' => $this->getFechaInicio(),
            'fecha_termino' => $this->getFechaTermino(),
            'cantidad' => $this->getCantidad(),
            'usr_creac' => $this->getUsrCreac(),
            'codigo_emp' => $this->getCodigoEmp(),
            'codigo_mon' => $this->getCodigoMon(),
            'tipo' => $this->getTipo(),
            'fecha_creacion' => $this->getFechaCreacion(),
            'accion' => $this->getAccion(),
            'id' => $this->getId(),
        ];
    }
}