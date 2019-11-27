<?php

return [
    'default' => [
        'driver' => env('DB_DRIVER', 'mysql'),
        'write' => [
            'host' => [ env('MYSQL_MASTER_SERVICE_HOST') ],
        ],
        'read' => [
            'host' => [ env('MYSQL_SLAVE_SERVICE_HOST') ],
        ],
        'sticky'   => true,
        'database' => env('DB_DATABASE', 'fatcat_db'),
        'port'     => env('DB_PORT', 3306),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset'  => env('DB_CHARSET', 'utf8mb4'),
        'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
        'prefix'    => env('DB_PREFIX', ''),
        'pool' => [
            'min_connections' => 1,
            'max_connections' => 20,
            'connect_timeout' => 5.0,
            'wait_timeout'    => 3.0,
            'heartbeat'       => -1,
            'max_idle_time'   => (float) env('DB_MAX_IDLE_TIME', 60),
        ],
    ],
];

