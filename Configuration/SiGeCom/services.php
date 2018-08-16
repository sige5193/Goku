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
),/*
'XError'=>array (
    'enable' => true,
    'class' => 'X\\Service\\XError\\Service',
    'delay' => false,
    'params' => array(
        'types' => E_ALL,
        'handlers' => array(
            array(
                'handler' => 'Url',
                'url' => 'index.php?module=web&action=error500',
                'parameters' => array(),
                'gotoUrl' => true,
                'method' => 'get',
            ),
        ),
    ),
),*/
'XMail'=>array (
    'enable' => true,
    'class' => 'X\\Service\\XMail\\Service',
    'delay' => true,
    'params' => array(
        'handlers' => array(
            'emailVerification' => array(
                'handler' => 'smtp',
                'host' => 'smtp.163.com',
                'port' => '25',
                'from' => 'michaelluthor@163.com',
                'from_name' => 'GoKu',
                'auth_required' => true,
                'username' => 'michaelluthor@163.com',
                'password' => '163mail1215',
            ),
        ),
    ),
),
);