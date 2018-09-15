<?php


Route::get('/', function() {
    return "Connection: OK";
});

Route::get('getAssignedExecutive/{customer_rut}', '\App\Helpers\Customer\CustomersHelper@getAssignedExcutive');