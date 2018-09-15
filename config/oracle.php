<?php

return [
    'oracle' => [
        'driver' => 'oracle',
        'tns' => env('DB_TNS', ''),
        'host' => env('DB_HOST', ''),
        'port' => env('DB_PORT', '1521'),
        'database' => env('DB_DATABASE', ''),
        'username' => env('DB_USERNAME', ''),
        'password' => env('DB_PASSWORD', ''),
        'charset' => env('DB_CHARSET', 'AL32UTF8'),
        'prefix' => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
        'options'   => [
            \PDO::ATTR_EMULATE_PREPARES => true,
            \PDO::ATTR_CASE => \PDO::CASE_LOWER
        ]
    ],
];
/*
host: 10.10.180.152
port: 1521
database: DM_VENTAS
username: DM_VENTAS
password: dimerc
service_name -> 'DESA01'
*/