<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 23-01-2018
 * Time: 14:53
 */

Route::get ('/', '\App\Http\Controllers\Api\ControlRegistros\ClientesController@notDefined');

Route::get ('test', '\App\Http\Controllers\Api\ControlRegistros\ClientesController@test');

Route::get ('ahora', '\App\Helpers\ControlRegistros\ClientesHelper@ahora');

Route::get ('porfecha', '\App\Helpers\ControlRegistros\ClientesHelper@porFecha');
Route::get ('porfecha/{in_fecha}', '\App\Helpers\ControlRegistros\ClientesHelper@porFecha');

Route::get ('porfecha/{in_fecha}/bienvenido-no', '\App\Helpers\ControlRegistros\ClientesHelper@porFechaNo');
Route::get ('porfecha/{in_fecha}/bienvenido-si', '\App\Helpers\ControlRegistros\ClientesHelper@porFechaSi');