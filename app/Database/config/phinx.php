<?php

/**
 * Init phinx config.
 */

return [
    'paths' => [
        'migrations' => __DIR__ . '/Migrations'
    ],
    'migration_base_class' => 'App\Database\Migrations\MigrationBase',
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'name' => env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'port' => env('DB_PORT'),
        ]
    ]
];