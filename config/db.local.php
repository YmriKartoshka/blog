<?php

return [
    'components' => [
        'db' => [
            'class'       => 'yii\db\Connection',
            'dsn'         => 'pgsql:host=localhost;dbname=b',
            'username'    => 'postgres',
            'password'    => 'gfhjkzrf',
            'charset'     => 'utf8',
            'tablePrefix' => 'b_',
        ],
    ],
];
