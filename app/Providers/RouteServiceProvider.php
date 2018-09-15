<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();

    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        /* PROYECTO ACTUAL */

        // OK !!
        Route::middleware('consultas.incentivos')
            ->namespace($this->namespace)
            ->prefix('incentivos')
            ->group(base_path('routes/consultas/incentivos.php'));

        Route::middleware('consultas.crecimiento')
            ->namespace($this->namespace)
            ->prefix('crecimiento')
            ->group(base_path('routes/consultas/crecimiento.php'));


        Route::middleware('validar.etl')
            ->namespace($this->namespace)
            ->prefix('etl')
            ->group(base_path('routes/validar/etl.php'));

        Route::middleware('customer.customers')
            ->namespace($this->namespace)
            ->prefix('customers')
            ->group(base_path('routes/customer/customers.php'));
        /* Proyectos anteriores */

        // OK !!
        /*Route::middleware('consultas.nuevosclientes')
            ->namespace($this->namespace)
            ->prefix('bi_registro_cuentas/{apikey_usuario}/nuevosclientes')
            ->group(base_path('routes/consultas/nuevosclientes.php'));

        // OK !!
        Route::middleware('consultas.compras')
            ->namespace($this->namespace)
            ->prefix('bi_registro_ventas/{apikey_usuario}/compras')
            ->group(base_path('routes/consultas/compras.php'));



        // OK !!
        Route::middleware('publicas')
            ->namespace($this->namespace)
            ->prefix('publicas')
            ->group(base_path('routes/publicas/publicas.php'));*/
    }
}
