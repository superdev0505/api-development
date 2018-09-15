<?php

return [
    'default' => env('DB_CONNECTION', 'mysql'),
    
    'connections' => [
        'mysqlmagento' => [
            'driver' => 'mysql',
            'host' => (env('DATABASE_ENV', 'dev') == 'prod') ? '192.168.0.2' : '10.10.201.101',
            'port' => env('DB_PORT', '3306'),
            'database' => 'dm_portal_proveedores',
            'username' => 'dimerc_api', //'fburgos',
            'password' => '7eLX7GSkhVP', // '6aUJ83MNER032s',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'strict' => false,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true
            ],
            'engine' => null,
        ],

        'mysqlmagento_dimerc' => [
            'driver' => 'mysql',
            'host' => (env('DATABAE_ENV', 'dev') == 'prod') ? '192.168.0.2' : '10.10.201.101',
            'port' => env('DB_PORT', 3306),
            'database' => 'dimerc',
            'username' => 'dimerc_api', //'fburgos',
            'password' => '7eLX7GSkhVP', // '6aUJ83MNER032s',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'strict' => false,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true
            ],
            'engine' => null,
        ],

        'mysqlmagento_controlregistros' => [
            'driver' => 'mysql',
            'host' => (env('DATABAE_ENV', 'dev') == 'prod') ? '192.168.0.2' : '10.10.201.101',
            'port' => env('DB_PORT', 3306),
            'database' => 'control_registros',
            'username' => 'dimerc_api', //'fburgos',
            'password' => '7eLX7GSkhVP', // '6aUJ83MNER032s',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'strict' => false,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true
            ],
            'engine' => null,
        ],

        'mysqlmagento_dev' => [
            'driver' => 'mysql',
            'host' => '10.10.201.105',
            'port' => env('DB_PORT', 3306),
            'database' => 'dm_portal_proveedores',
            'username' => 'root',
            'password' => 'dimsql',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'strict' => false,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true
            ],
            'engine' => null,
        ],

        'mysqlcerkerus' => [
            'driver' => 'mysql',
            'host' => '10.10.201.110',
            'port' => env('DB_PORT', 3306),
            'database' => 'dm_api_modules',
            'username' => 'root',
            'password' => 'mysqlcerberusbi2017',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'strict' => false,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true
            ],
            'engine' => null,
        ],

        'mysqlcerberus_marketingdigital' => [
            'driver' => 'mysql',
            'host' => '10.10.201.110',
            'port' => env('DB_PORT', 3306),
            'database' => 'marketing_digital',
            'username' => 'root',
            'password' => 'mysqlcerberusbi2017',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'strict' => false,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true
            ],
            'engine' => null,
        ],

        'oracle_dmventas' => array(
            'driver' => 'oracle',
            'host' => '10.10.20.1',
            'port' => '1521',
            'database' => 'DM_VENTAS',
            'username' => 'DM_VENTAS',
            'password' => 'dimerc',
            'charset' => 'AL32UTF8',
            'prefix' => '',
            'strict' => false,
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER
            ],
            'engine' => null,
            'service_name' => 'prod'
        ),

        'oracle_catalogacion' => array(
            'driver' => 'oracle',
            'host' => '10.10.40.210',
            'port' => '1521',
            'database' => 'CATALOGO',
            'username' => 'cataxml',
            'password' => 'interfazxml2017',
            'charset' => 'AL32UTF8',
            'prefix' => '',
            'strict' => false,
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER
            ],
            'engine' => null,
            'service_name' => 'ora92'
        ),

        'oracle_dmventas1' => array(
            'driver' => 'oracle',
            'host' => '10.10.20.1',
            'port' => '1521',
            'database' => 'DM_VENTAS',
            'username' => 'DM_VENTAS',
            'password' => 'dimerc',
            'charset' => 'AL32UTF8',
            'prefix' => '',
            'strict' => false,
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER
            ],
        ),
        
        'oracle_dmtransferweb' => array(
            'driver' => 'oracle',
            'host' => '10.10.20.1',
            'port' => '1521',
            'database' => 'DM_TRANSFER_WEB',
            'username' => 'DM_TRANSFER_WEB',
            'password' => 'dm_ventas',
            'charset' => 'utf8',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER
            ],
        ),

        'oracle_dmventas_dev' => array(
            'driver' => 'oracle',
            'host' => '10.10.180.152',
            'port' => '1521',
            'database' => 'DM_VENTAS',
            'username' => 'DM_VENTAS',
            'password' => 'DesaQA',
            'charset' => 'AL32UTF8',
            'prefix' => '',
            'strict' => false,
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            'options' => [
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_CASE => PDO::CASE_LOWER
            ],
            'engine' => null,
            'service_name' => 'DESA01',
        ),

        /* CONEXTIONES POR DEFECTO */
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ],
];
