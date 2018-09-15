<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 08-01-2018
 * Time: 14:10
 */


namespace App\Http\Middleware\Validaciones;


use Closure;
use URL;
use Funciones;
use DB;
use Illuminate\Http\RedirectResponse;

class AddHeaders
{
    public function handle($request, Closure $next)
    {
        // Ejecuta solicitud
        $response = $next($request);

        // Añade headers
        return $response->withHeaders(array(
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept',
            'Access-Control-Allow-Methods' => 'GET, POST, OPTIONS'
            // 'Content-Type' => 'charset=UTF-8' //application/json;
        ));
    }
}
