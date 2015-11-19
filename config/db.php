<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ra_main',
    'tablePrefix'=>'ra_',
    'username' => 'root',
    'password' => YII_ENV_DEV ? '' : '',
    'charset' => 'utf8',
];
