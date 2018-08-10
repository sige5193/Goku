<?php
use X\Service\Database\Service as DatabaseService;
use X\Service\Database\Driver\Sqlite;
return array(
'XSession' => array(
    'class' => '\\X\\Service\\XSession\\Service',
    'enable' => true,
    'delay' => false,
    'params' => array(
        'autoStart' => true,
        'holders' => array('cookie', 'get', 'post', 'request'),
        'cookie' => array(
            'lifetime'=>3600,
            'path'=>'/',
            'domain'=>'',
            'secure'=> false,
            'httponly'=>false
        ),
        'storage' => null,
    ),
),
'XAction' => array(
    'class' => '\\X\\Service\\XAction\\Service',
    'enable' => true,
    'delay' => true,
    'params' => array(),
),
'Database' => array(
    'class' => DatabaseService::class,
    'enable' => true,
    'delay' => true,
    'params' => array(
        'databases' => array(
            'goku' => array(
                'driver' => Sqlite::class,
                'path' => __DIR__.'/../../Data/goku.db',
            ),
        ),
    ),
),
);