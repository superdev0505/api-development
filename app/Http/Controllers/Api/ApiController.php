<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PDO\Lib\ResponseFormatt;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    // Función N°01 para poder conectarse a la aplicación mediante api
    public function example1()
    {
        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(400)
            ->setFunctions(array("test"));

        return response()->json($responseFormatt->getResponseFormatt());
    }

    public function example2($apikey, Request $request)
    {
        return "TEST DE ACCESO";
    }

    public function testExternalDeveloper() {
        $sql = "SELECT * FROM en_cliente WHERE rutcli = :rut_cliente";
        $resultado = DB::connection('oracle_dmventas_dev')->select($sql, [
            'rut_cliente' => 21928679
        ]);

        $responseFormatt = new ResponseFormatt();
        if($resultado == null || count($resultado) <= 0) {
            $responseFormatt
                ->setCode(200)
                ->setResponse("No se encontraron registros");
        }
        else {
            $responseFormatt
                ->setCode(200)
                ->setResponse("Razon social de prueba: " . $resultado[0]->razons);
        }



        return $responseFormatt->returnToJson();
    }
}