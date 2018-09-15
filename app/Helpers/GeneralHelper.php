<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24-01-2018
 * Time: 17:10
 */

namespace App\Helpers;

use App\PDO\Lib\ResponseFormatt;
use Carbon\Carbon;
use App\PDO\MySql\Magento\ProveedorPDO;

class GeneralHelper {

    // Atributos
    protected $rut = null;
    protected $fechadesde = Carbon::class;
    protected $fechahasta = Carbon::class;
    protected $fechadesde2 = Carbon::class;
    protected $fechahasta2 = Carbon::class;
    protected $marca = null;

    public function __construct() {
        $this->fechadesde = Carbon::now();
        $this->fechahasta = Carbon::now();
    }

    /*     * ******************************** */
    /*     * ****** FUNCIONES PRIVADAS ****** */
    /*     * ******************************** */

    protected function validaFecha($in_fecha) {
        // 1.- Validar si viene fecha
        if (!isset($in_fecha)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar una fecha de inicio con formato 01-MES-AÑO [fecha]"));

            return $responseFormatt->returnToJson();
        }


        // 2.- Validar si fecha viene en el formato correcto
        $fechaFinal = null;
        try {
            $fechaFinal = Carbon::createFromFormat('d-m-Y', $in_fecha);
            $this->fechadesde = $fechaFinal;
        } catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Formato de fecha incorrecto. Ingrese en formato 01-MES-AÑO"));
        }

        return null;
    }

    protected function validaFechas($in_fechadesde, $in_fechahasta) {
        // 1.- Validar si viene fecha
        if (!isset($in_fechadesde)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar una fecha de inicio con formato 01-MES-AÑO [fechadesde]"));

            return $responseFormatt->returnToJson();
        }

        if (!isset($in_fechahasta)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar una fecha de término con formato 01-MES-AÑO [fechahasta]"));

            return $responseFormatt->returnToJson();
        }


        // 2.- Validar si fecha viene en el formato correcto
        $fechaFinalDesde = null;
        $fechaFinalHasta = null;
        try {
            $fechaFinalDesde = Carbon::createFromFormat('d-m-Y', $in_fechadesde);
            $fechaFinalHasta = Carbon::createFromFormat('d-m-Y', $in_fechahasta);
            $this->fechadesde = $fechaFinalDesde;
            $this->fechahasta = $fechaFinalHasta;
        } catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Formato de fecha incorrecto. Ingrese en formato 01-MES-AÑO"));

            return $responseFormatt->returnToJson();
        }

        return null;
    }

    protected function validaPeriodoFechas($in_fechadesde1, $in_fechahasta1, $in_fechadesde2, $in_fechahasta2) {
        // 1.- Validar si viene fecha
        if (!isset($in_fechadesde1)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar 'fecha desde' del 1er periodo con formato 01-MES-AÑO [fechadesde1]"));

            return $responseFormatt->returnToJson();
        }

        if (!isset($in_fechahasta1)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar 'fecha desde' del 1er periodo con formato 01-MES-AÑO [fechahasta1]"));

            return $responseFormatt->returnToJson();
        }

        if (!isset($in_fechadesde2)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar 'fecha desde' del 2do periodo con formato 01-MES-AÑO [fechadesde2]"));

            return $responseFormatt->returnToJson();
        }

        if (!isset($in_fechahasta2)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar 'fecha hasta' del 2do periodo con formato 01-MES-AÑO [fechahasta2]"));

            return $responseFormatt->returnToJson();
        }


        // 2.- Validar si fecha viene en el formato correcto
        $fechaFinalDesde1 = null;
        $fechaFinalHasta1 = null;
        try {
            $fechaFinalDesde1 = Carbon::createFromFormat('d-m-Y', $in_fechadesde1);
            $fechaFinalHasta1 = Carbon::createFromFormat('d-m-Y', $in_fechahasta1);
            $this->fechadesde = $fechaFinalDesde1;
            $this->fechahasta = $fechaFinalHasta1;
        } catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Formato de fecha del 1er periodo incorrecto. Ingrese en formato 01-MES-AÑO"));

            return $responseFormatt->returnToJson();
        }

        $fechaFinalDesde2 = null;
        $fechaFinalHasta2 = null;
        try {
            $fechaFinalDesde2 = Carbon::createFromFormat('d-m-Y', $in_fechadesde2);
            $fechaFinalHasta2 = Carbon::createFromFormat('d-m-Y', $in_fechahasta2);
            $this->fechadesde2 = $fechaFinalDesde2;
            $this->fechahasta2 = $fechaFinalHasta2;
        } catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Formato de fecha del 2do periodo incorrecto. Ingrese en formato 01-MES-AÑO"));

            return $responseFormatt->returnToJson();
        }

        return null;
    }

    protected function validaMarca($in_marca) {
        // Validar si viene Marca
        if (!isset($in_marca)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("Debes indicar la marca específica [marca]"));

            return $responseFormatt->returnToJson();
        } else {
            $this->marca = $in_marca;
        }

        return null;
    }

    protected function validaRut($in_apikeyproveedor) {
        // 1.- Traer RUT del proveedor por su APIKEY
        $rut = ProveedorPDO::getRutProveedorFromApiKey($in_apikeyproveedor);
        if (!$rut) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                    ->setCode(203)
                    ->setResponse(array("No se pudo obtener el RUT del proveedor"));
            return $responseFormatt->returnToJson();
        } else {
            $this->rut = $rut;
        }

        return null;
    }

    protected function getXmlFileName($in_codigoproducto) {
        $filename = $in_codigoproducto;
        $filename = preg_replace('/[^A-Za-z0-9\-_]/', '', $filename);
        $filename = stripslashes($filename);
        $xml_name = $filename . ".xml";
        return $xml_name;
    }

}
