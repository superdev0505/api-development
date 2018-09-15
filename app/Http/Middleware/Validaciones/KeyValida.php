<?php

namespace App\Http\Middleware\Validaciones;


use App\PDO\MySql\Cerberus\UsuariosPortalBIPDO;
use Closure;
use URL;
// use Funciones;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\PDO\Lib\ResponseFormatt;
use App\PDO\MySql\Cerberus\OnlyCanAccessIp;
use App\PDO\MySql\Cerberus\RestrictAccessIp;
use App\PDO\MySql\Cerberus\Usuarios;
use App\Helpers\Funciones;

class KeyValida
{
    public function handle($request, Closure $next, $guard = null)
    {
        // Obtención de datos generales.
        $in_ip = \Request::ip();// Funciones::getRealIP();
        $in_apikey = Funciones::getKeyByURL();
        $in_modulo = Funciones::getBaseURL();

        // 2.- Validacion N°01: Validar IP, KEY, Módulo y si está activo.
        $validacion01 = OnlyCanAccessIp::where('active', '=', 1)
            -> where('ip_request', '=', $in_ip)
            -> where('api_key', '=', $in_apikey)
            -> where('module', '=', $in_modulo)
            -> first();
        if($validacion01) {
            return $next($request);
        }

        // Validacion N°02: Validar IP, KEY, Módulo y si está activo.
        $validacion02 = RestrictAccessIp::where('active', '=', 1)
            -> where('ip_request', '=', $in_ip)
            -> where('api_key', '=', $in_apikey)
            -> where('module', '=', $in_modulo)
            -> first();
        if($validacion02) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                -> setCode(403)
                -> setResponse("Se te ha bloqueado el acceso al sistema por uso indebido.");

            return response()->json($responseFormatt->getResponseFormatt());
        }

        // Validación N°03: Validar KEY.
        else if($in_apikey == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                -> setCode(205)
                -> setResponse("Debes indicar el Api Key para poder visualizar este modulo.");

            return response()->json($responseFormatt->getResponseFormatt());
        }

        // Validacion N°04: KEY registrada por algún usuario
        $validacion04 = UsuariosPortalBIPDO::where('api_key', '=', $in_apikey)
            -> first();
        if(!$validacion04) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                -> setCode(205)
                -> setResponse("El Api Key ingresada es incorrecta.");

            return response()->json($responseFormatt->getResponseFormatt());
        }

        // Validación N°05: Acceder a módulo por su KEY
        // DB::connection('mysqlcerberus')->enableQueryLog();
        $validacion5 = DB::connection('mysqlcerberus')
            -> table('dg_grupo_usuario')
            -> join('dg_perfil_modulo_permiso', 'dg_perfil_modulo_permiso.id_perfil', '=', 'dg_grupo_usuario.id_perfil')
            -> join('dg_modulo', 'dg_modulo.id_modulo', '=', 'dg_perfil_modulo_permiso.id_modulo')
            -> join('dg_usuario_portal_bi', 'dg_usuario_portal_bi.id_grupo_usuario', '=', 'dg_grupo_usuario.id_grupo')
            -> where('dg_usuario_portal_bi.activo', '=', 1)
            -> where(function ($q1) use($in_modulo, $in_apikey) {
                $q1 -> where(function ($q2) use($in_modulo, $in_apikey) {
                    $q2 -> where('dg_modulo.titulo_modulo_backend', '=', $in_modulo)
                        -> where('dg_usuario_portal_bi.api_key', '=', $in_apikey)
                        -> whereRaw('dg_usuario_portal_bi.peticiones_realizadas < dg_usuario_portal_bi.limite_peticiones');
                });
                $q1 -> orWhere(function ($q3) use($in_apikey) {
                    $q3 -> where('dg_usuario_portal_bi.api_key', '=', $in_apikey)
                        -> where('dg_modulo.id_modulo', '=', -1);
                });
            });
        $validacion5 = $validacion5->first();
        // return dd(DB::connection('mysqlcerberus')->getQueryLog());

        if($validacion5) {
            return $next($request);
        }

        // No pasó todas las validaciones.
        else {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                -> setCode(205)
                -> setResponse("Tu Perfil actual no posee los permisos necesarios para acceder a este módulo");
            return response()->json($responseFormatt->getResponseFormatt());
        }
    }
}
