<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24-01-2018
 * Time: 17:07
 */

namespace App\Helpers\PortalEjecutivos;

use App\Http\Controllers\Api\PortalEjecutivos\IncentivosController;
use App\PDO\Lib\ResponseFormatt;
use Carbon\Carbon;
use App\Helpers\GeneralHelper;

class IncentivosHelper extends GeneralHelper
{
    public function getInformationByUser($in_usuario = null)
    {
        // 0.- Validar ingreso de usuario
        if($in_usuario == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(201)
                ->setResponse("No específico usuario a buscar");

            return $responseFormatt->returnToJson();
        }

        // 1.- IR A CONTROLADOR
        $controlador = new IncentivosController();
        return $controlador->getInformationByUser($in_usuario);
    }
}
