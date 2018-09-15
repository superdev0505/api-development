<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 08/03/2018
 * Time: 18:03
 */

Route::get('/', function() {
    return "Connection: OK";
});
Route::get('getGuiaIdByMgnNumord', '\App\Helpers\Magento\OrdersHelper@getGuiaIdByMgnOrdnum');
Route::get('getGuiaIdByMgnNumord/{in_numord}', '\App\Helpers\Magento\OrdersHelper@getGuiaIdByMgnOrdnum');

