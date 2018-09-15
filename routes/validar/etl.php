<?php
/**
 * Created by Author.
 * User: rgzimics
 * Date: 21/06/2018
 * Time: 10:36
 */

Route::get('test', function() {
    return "etl-test";
});

Route::get('dropship/validationXml/{xml_file?}', '\App\Helpers\Validar\ValidarHelper@validateXml');
