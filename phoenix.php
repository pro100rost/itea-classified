<?php

$ini = parse_ini_file('configs/config.ini');

return [
    'migration_dirs' => [
        'tables' => __DIR__ . '/migrations/tables',
        'test_data' => __DIR__ . '/migrations/testData',
    ],
    'environments' => [
        'local' => [
            'adapter' => $ini['dbms'],
            'host' => $ini['db_host'],
            'username' => $ini['db_username'],
            'password' => $ini['db_password'],
            'db_name' => $ini['db_name'],
            'charset' => 'utf8',
        ],
    ],
    'default_environment' => 'local',
    'log_table_name' => 'phoenix_log',
];