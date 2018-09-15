<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use URL;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Funciones
{
    // Obtiene la URL relativa en la cual estoy entrando actualmente
    public static function getBaseURL()
    {
        $arrayPath = explode("/", Funciones::getURL());
        $apiKey = isset($arrayPath[0]) ? $arrayPath[0] : null;
        return $apiKey;
    }

    public static function getURL()
    {
        $requestPath = URL::current();
        $basePath = URL::asset('/');
        $finalPath = str_replace($basePath, '', $requestPath);
        return isset($finalPath) ? $finalPath : null;
    }

    // Obtener API KEY desde URL.
    // Funciona siempre y cuando la KEY está en el 2do "slash"
    public static function getKeyByURL()
    {
        $arrayPath = explode("/", Funciones::getURL());
        $apiKey = isset($arrayPath[1]) ? $arrayPath[1] : null;
        return $apiKey;
    }

    // Obtiene la IP actual del cliente que intenta acceder
    public static function getRealIP()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }

    public static function logFulfillmentMasivo($in_texto, $in_level = 'info')
    {
        $pathToLog = '/logs/fulfillment/masivo.log';
        Funciones::logCustom($in_texto, $in_level, $pathToLog);
    }

    public static function logCustom($in_texto, $in_level, $in_pathToLog) {
        try {
            $log = new Logger('logueador');
            $log->pushHandler(new StreamHandler(storage_path() . $in_pathToLog, Logger::INFO));
            switch ($in_level) {
                case 'error':
                    $log->addError($in_texto);
                    break;
                case 'emergencia':
                    $log->addEmergency($in_texto);
                    break;
                case 'noticia':
                    $log->addNotice($in_texto);
                    break;
                default:
                    $log->addInfo($in_texto);
                    break;
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}