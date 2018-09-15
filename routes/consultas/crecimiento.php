<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/06/2018
 * Time: 10:00
 */

Route::prefix('ejecutivos')->group(function () {
    Route::get('especifico/{userid?}', '\App\Helpers\Publicas\CrecimientoHelper@consultaPorEjecutivo');
    Route::get('por-grupo-de-venta/{codcnl?}', '\App\Helpers\Publicas\CrecimientoHelper@consultaPorGrupoVenta');
});

Route::prefix('grupos-de-venta')->group(function () {
    Route::get('/', '\App\Helpers\Publicas\CrecimientoHelper@consultaDeGrupos');
});

Route::prefix('supervisores')->group(function () {
    Route::get('especifico/{in_supervisor?}', '\App\Helpers\Publicas\CrecimientoHelper@consultaPorSupervisor');
    Route::get('/', '\App\Helpers\Publicas\CrecimientoHelper@consultaDeSupervisores');
});
