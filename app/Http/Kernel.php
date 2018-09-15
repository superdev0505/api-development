<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\Validaciones\AddHeaders::class,
    ];

    protected $middlewareGroups = [
        /* PROYECTO ACTUAL */
        'consultas.incentivos' => array(
            \App\Http\Middleware\Validaciones\AddHeaders::class,
        ),

        'validar.etl' => array(
            \App\Http\Middleware\Validaciones\AddHeaders::class,
        ),
        'customer.customers' => array(
            \App\Http\Middleware\Validaciones\AddHeaders::class,
         //   \App\Http\Middleware\Validaciones\KeyValida::class,
        ),





        /* PROYECTOS ANTIGUOS */
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'consultas.crecimiento' => [
            \App\Http\Middleware\Validaciones\AddHeaders::class,
        ],

        /*'compras' => [
            \App\Http\Middleware\Validaciones\KeyValida::class,
            \App\Http\Middleware\Validaciones\LogRegister::class,
            \App\Http\Middleware\Validaciones\AddHeaders::class,
            \App\Http\Middleware\Validaciones\Proveedores\FillrateAuth::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],

        'general_api' => [
            \App\Http\Middleware\Validaciones\AddHeaders::class,
        ],



        'publicas' => array(

        ),*/
    ];

    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
