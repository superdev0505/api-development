<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/06/2018
 * Time: 10:33
 */

namespace App\Entities\MySql\Cerberus;


class MdmMigracionUsuario implements \JsonSerializable
{
    private $supervisor;
    private $grupo_venta;
    private $rut;
    private $ejecutivo;
    private $mes;
    private $anio;
    private $n_tlmk;
    private $n_web;
    private $p_tlmk;
    private $p_web;

    public function __construct($registro = null)
    {
        if($registro != null) {
            $this->setSupervisor($registro->supervisor);
            $this->setGrupoVenta($registro->grupo_venta);
            $this->setRut($registro->rut);
            $this->setEjecutivo($registro->ejecutivo);
            $this->setMes($registro->mes);
            $this->setAnio($registro->anio);
            $this->setNTlmk($registro->n_tlmk);
            $this->setNWeb($registro->n_web);
            $this->setPTlmk($registro->p_tlmk);
            $this->setPWeb($registro->p_web);
        }
    }

    public function getSupervisor()
    {
        return $this->supervisor;
    }

    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;
    }

    public function getGrupoVenta()
    {
        return $this->grupo_venta;
    }

    public function setGrupoVenta($grupo_venta)
    {
        $this->grupo_venta = $grupo_venta;
    }

    public function getRut()
    {
        return $this->rut;
    }

    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    public function getEjecutivo()
    {
        return $this->ejecutivo;
    }

    public function setEjecutivo($ejecutivo)
    {
        $this->ejecutivo = $ejecutivo;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    public function getNTlmk()
    {
        return $this->n_tlmk;
    }

    public function setNTlmk($n_tlmk)
    {
        $this->n_tlmk = $n_tlmk;
    }

    public function getNWeb()
    {
        return $this->n_web;
    }

    public function setNWeb($n_web)
    {
        $this->n_web = $n_web;
    }

    public function getPTlmk()
    {
        return $this->p_tlmk;
    }

    public function setPTlmk($p_tlmk)
    {
        $this->p_tlmk = $p_tlmk;
    }

    public function getPWeb()
    {
        return $this->p_web;
    }

    public function setPWeb($p_web)
    {
        $this->p_web = $p_web;
    }

    public function jsonSerialize()
    {
        return [
            'supervisor' => $this->getSupervisor(),
            'grupo_venta' => $this->getGrupoVenta(),
            'rut' => $this->getRut(),
            'ejecutivo' => $this->getEjecutivo(),
            'mes' => $this->getMes(),
            'anio' => $this->getAnio(),
            'n_tlmk' => $this->getNTlmk(),
            'n_web' => $this->getNWeb(),
            'p_tlmk' => $this->getPTlmk(),
            'p_web' => $this->getPWeb(),
        ];
    }
}