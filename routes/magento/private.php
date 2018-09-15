<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 23/03/2018
 * Time: 15:30
 */


Route::get('getCustomersResumenByDates/{in_fechadesde?}/{in_fechahasta?}/{in_formatooutput?}', '\App\Helpers\Magento\CustomersHelper@getCustomersResumenByDates');
Route::get('getCustomersResumenByDate/{in_fechadesde?}/{in_formatooutput?}', '\App\Helpers\Magento\CustomersHelper@getCustomersResumenByDate');