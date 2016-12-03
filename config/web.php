<?php

$params = require( __DIR__ . '/params.php' );

$config = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'components' => [
        'request'    => [
            'cookieValidationKey' => 'WOgnCwNVE94fKTsG1S39pZobimFSQqYQ',
        ],
        'cache'      => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'       => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'log'        => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [
                        'error',
                        'warning',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login'    => 'login',
                'register' => 'register',
            ],
        ],
        'db'         => require( __DIR__ . '/db.php' ),
    ],
    'params'     => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
