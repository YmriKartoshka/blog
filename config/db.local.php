<?php

return [
    'components' => [
        'db' => [
            'class'       => 'yii\db\Connection',
            'dsn'         => 'pgsql:host=localhost;dbname=ov',
            'username'    => 'postgres',
            'password'    => 'Nescafe123',
            'charset'     => 'utf8',
            'tablePrefix' => 'ov_',
        ],
    ],
];
