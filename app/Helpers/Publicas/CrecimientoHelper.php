<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/06/2018
 * Time: 10:00
 */


namespace App\Helpers\Publicas;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Api\MarketingDigital\CrecimientosController;
use App\Http\Controllers\Publicas\PublicController;
use App\PDO\Lib\ResponseFormatt;
use App\PDO\Oracle\DMVentas\MaCanalVePDO;
use App\PDO\Oracle\DMVentas\MaUsuarioPDO;

class CrecimientoHelper extends GeneralHelper
{
    public function consultaPorEjecutivo($userid = null) {
        // 1.- Validar ingreso
        if($userid == null || trim($userid) == "") {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(201)
                ->setResponse("Debe ingresar ID del ejecutivo");

            return $responseFormatt->returnToJson();
        }

        // 2.- Validar que el ejecutivo exista en base de datos
        if(!MaUsuarioPDO::existsUserByUserid($userid)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(202)
                ->setResponse("El usuario ". $userid ." no existe en base de datos");

            return $responseFormatt->returnToJson();
        }

        // Ir al controlador
        try {
            $controlador = new CrecimientosController();
            return $controlador->consultaPorEjecutivo($userid);
        }
        catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(210)
                ->setResponse("Error interno en el servidor (". $e->getMessage() .")");

            return $responseFormatt->returnToJson();
        }

    }

    public function consultaPorGrupoVenta($codcnl = null) {
        // 1.- Validar ingreso
        if($codcnl == null || trim($codcnl) == "") {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(201)
                ->setResponse("Debe ingresar número del grupo de venta");

            return $responseFormatt->returnToJson();
        }

        // 2.- Validar que el ejecutivo exista en base de datos
        if(!MaCanalVePDO::existSalesGroupByCodcnl($codcnl)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(202)
                ->setResponse("El grupo de venta ". $codcnl ." no existe en base de datos");

            return $responseFormatt->returnToJson();
        }

        // Ir al controlador
        try {
            $controlador = new CrecimientosController();
            return $controlador->consultaPorGrupoVenta($codcnl);
        }
        catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(210)
                ->setResponse("Error interno en el servidor (". $e->getMessage() .")");

            return $responseFormatt->returnToJson();
        }
    }

    public function consultaDeGrupos() {
        // Ir al controlador
        try {
            $controlador = new CrecimientosController();
            return $controlador->consultaDeGrupos();
        }
        catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(210)
                ->setResponse("Error interno en el servidor (". $e->getMessage() .")");

            return $responseFormatt->returnToJson();
        }
    }

    public function consultaPorSupervisor($in_supervisor = null) {
        // 1.- Validar ingreso
        if($in_supervisor == null || trim($in_supervisor) == "") {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(201)
                ->setResponse("Debe ingresar ID del supervisor");

            return $responseFormatt->returnToJson();
        }

        // 2.- Validar que el ejecutivo exista en base de datos
        if(!MaUsuarioPDO::existsUserByUserid($in_supervisor)) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(202)
                ->setResponse("El supervisor ". $in_supervisor ." no existe en base de datos");

            return $responseFormatt->returnToJson();
        }

        // Ir al controlador
        try {
            $controlador = new CrecimientosController();
            return $controlador->consultaPorSupervisor($in_supervisor);
        }
        catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(210)
                ->setResponse("Error interno en el servidor (". $e->getMessage() .")");

            return $responseFormatt->returnToJson();
        }
    }

    public function consultaDeSupervisores() {
        // Ir al controlador
        try {
            $controlador = new CrecimientosController();
            return $controlador->consultaDeSupervisores();
        }
        catch (\Exception $e) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(210)
                ->setResponse("Error interno en el servidor (". $e->getMessage() .")");

            return $responseFormatt->returnToJson();
        }
    }
}