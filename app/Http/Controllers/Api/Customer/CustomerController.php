<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24-01-2018
 * Time: 16:07
 */

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\PDO\Lib\ResponseFormatt;
use App\PDO\Oracle\DMVentas\CuAssignedExPDO;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Helpers\Funciones;
use Mail;


class CustomerController extends Controller
{
    public function getCompanyidbyrut($rut_cli)
    {
        // 1.- Obtener registros
        $resultado = CuAssignedExPDO::gutCompanyByCustomerRut($rut_cli);

        // 2.- Verificar que no venga vacío los registros, o que halla problema de conexión
        if($resultado == null || count($resultado) <= 0) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("No se encontraron registros en la base de datos, o hubo problemas de conexión");

            return $responseFormatt->returnToJson();
        }

        // 3.- Devolver registros esperados

        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(200)
            ->setResponse('company_id: '. $resultado[0]->company_id);

        return $responseFormatt->returnToJson();
    }
}
