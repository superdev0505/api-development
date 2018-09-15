<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/06/2018
 * Time: 10:33
 */

namespace App\Entities\MySql\Cerberus;


class MdmMigracionGrupo implements \JsonSerializable
{
    private $supervisor;
    private $grupo_venta;
    private $mes;
    private $anio;
    private $n_tlmk;
    private $n_web;
    private $p_tlmk;
    private $p_web;

    public function __construct($registro = null)
    {
        if ($registro != null) {
            $this->setSupervisor($registro->supervisor);
            $this->setGrupoVenta($registro->grupo_venta);
            $this->setMes($registro->mes);
            $this->setAnio($registro->anio);
            $this->setNTlmk($registro->n_tlmk);
            $this->setNWeb($registro->n_web);

            // Obtener porcentajes por números totales
            if ($this->getNTlmk() != null && $this->getNWeb() != null) {
                $n_tlmk = $this->getNTlmk();;
                $n_web = $this->getNWeb();

                $this->setPTlmk(($n_tlmk > 0) ? $n_tlmk / ($n_tlmk + $n_web) * 100 : 0);
                $this->setPWeb(($n_web > 0) ? $n_web / ($n_tlmk + $n_web) * 100 : 0);
            }
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
        return round(($this->p_tlmk != null) ? $this->p_tlmk : ($this->n_tlmk > 0) ? $this->n_tlmk / ($this->n_tlmk + $this->n_web) * 100 : 0, 2);
    }

    public function setPTlmk($p_tlmk)
    {
        $this->p_tlmk = round($p_tlmk, 2);
    }

    public function getPWeb()
    {
        return round(($this->p_web != null) ? $this->p_web : ($this->n_web > 0) ? $this->n_web / ($this->n_tlmk + $this->n_web) * 100 : 0, 2);
    }

    public function setPWeb($p_web)
    {
        $this->p_web = round($p_web, 2);
    }

    public function jsonSerialize()
    {
        return [
            'supervisor' => $this->getSupervisor(),
            'grupo_venta' => $this->getGrupoVenta(),
            'mes' => $this->getMes(),
            'anio' => $this->getAnio(),
            'n_tlmk' => $this->getNTlmk(),
            'n_web' => $this->getNWeb(),
            'p_tlmk' => $this->getPTlmk(),
            'p_web' => $this->getPWeb(),
        ];
    }
}