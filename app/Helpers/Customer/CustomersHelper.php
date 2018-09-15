<?php
/**
 * Created by Author.
 * User: rguzimics
 * Date: 21-06-2018
 * Time: 11:07
 */

namespace App\Helpers\Customer;

use App\Http\Controllers\Api\Customer\CustomerController;
use App\PDO\Lib\ResponseFormatt;
use Carbon\Carbon;
use App\Helpers\GeneralHelper;


class CustomersHelper extends GeneralHelper
{
    public function getAssignedExcutive($customer_rut = null)
    {
        // 0.- Validar ingreso de usuario
        if($customer_rut == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(201)
                ->setResponse("No se puede encontrar Cutomer Rut.");
    
            return $responseFormatt->returnToJson();
        }

        // 1.- IR A CONTROLADOR
        $controlador = new CustomerController();
        return $controlador->getCompanyidbyrut($customer_rut);
    }
}

