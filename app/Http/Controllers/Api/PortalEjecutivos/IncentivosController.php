<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24-01-2018
 * Time: 16:07
 */

namespace App\Http\Controllers\Api\PortalEjecutivos;

use App\Http\Controllers\Controller;
use App\Mail\MensajeBienvenida;
use App\PDO\Lib\ResponseFormatt;
use App\PDO\MySql\Magento\CustomerEntityPDO;
use App\PDO\MySql\PortalEjecutivo\IncentivosPDO;
use App\PDO\Oracle\DMTransferWeb\TFConfiguracionPDO;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Helpers\Funciones;
use Mail;


class IncentivosController extends Controller
{
    public function getInformationByUser($in_usuario)
    {
        // 1.- Obtener registros
        $resultado = IncentivosPDO::obtenerBonoClientePorUsuario($in_usuario);

        // 2.- Verificar que no venga vacío los registros, o que halla problema de conexión
        if($resultado == null || count($resultado) <= 0) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("No se encontraron registros en la base de datos, o hubo problemas de conexión");

            return $responseFormatt->returnToJson();
        }

        // 3.- Devolver registros esperados
        $registro = $resultado[0];
        $arrayReturn = array(
            'cantclinnuevopyme' => $registro->getCantclinnuevopyme(),
            'cantclinnuevoge' => $registro->getCantclinnuevoge(),
            'tienebonoclientenuevo' => $registro->getTienebonoclientenuevo()
        );

        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(200)
            ->setResponse($arrayReturn);

        return $responseFormatt->returnToJson();
    }
}
