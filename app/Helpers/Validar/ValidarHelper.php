<?php
/**
 * Created by Author.
 * User: rguzimics
 * Date: 21-06-2018
 * Time: 11:07
 */

namespace App\Helpers\Validar;

use App\Http\Controllers\Api\Validar\ValidarController;
use App\PDO\Lib\ResponseFormatt;
use Carbon\Carbon;
use App\Helpers\GeneralHelper;

class ValidarHelper extends GeneralHelper
{
    public function validateXml($xml_file = null)
    {
        // 0.- Validar ingreso de usuario
        if($xml_file == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(201)
                ->setResponse("No puede validar un archivo XML específico");

            return $responseFormatt->returnToJson();
        }

        // 1.- IR A CONTROLADOR
        $controlador = new ValidarController();
        return $controlador->validateXml($xml_file);
    }
}
