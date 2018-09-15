<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13-12-2017
 * Time: 10:13
 */

namespace App\Http\Middleware\Validaciones;

use Closure;
use URL;
use \App\Helpers\Funciones;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Lib\ResponseFormatt;
use \App\Models\ApiRequest;
use Illuminate\Http\Response;

class LogRegister
{
    // Si está habilitado el LOG ON DATABASE, se guardará registros de forma automática en la base de datos.
    public function handle($request, Closure $next, $guard = null)
    {
        // Ejecuta solicitud
        $response = $next($request);

        // Valida si ejecuta log
        $logconfig = env('LOG_ON_DATABASE');
        if($logconfig) {
            $log = new ApiRequest();
            $log -> api_module = Funciones::getBaseURL();
            $log -> ip_address = \Request::ip();
            $log -> request_uri = Funciones::getURL();
            $log -> extend_request_uri = $request -> url();
            $log -> request_method = $request -> method();
            $log -> api_backend_name = env('LOGGER_BACKEND_NAME');
            $log -> api_key = Funciones::getKeyByURL();
            $log -> status_request = $response -> status();
            $log -> save();
        }
        // Independiente si se guarda log, la solicitud avanzará.
        return $response;
    }
}
