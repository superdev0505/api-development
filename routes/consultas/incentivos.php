<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 07/05/2018
 * Time: 10:36
 */

Route::get('test', function() {
    return "Conexión correctamente establecida";
});

Route::get('getInformationByUser/{in_usuario?}', '\App\Helpers\PortalEjecutivos\IncentivosHelper@getInformationByUser');
