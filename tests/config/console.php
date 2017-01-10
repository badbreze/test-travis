<?php

Yii::setAlias('@tests', dirname(__DIR__));

$config = [
    'id' => 'unit',
    'basePath' => Yii::getAlias('@tests'),
    'components' => [
        'user' => [
            'class' => 'tests\data\models\User',
            'id' => 0
        ],
        'db' => [
            'class'             => 'yii\db\Connection',
            'dsn'               => 'mysql:host=linnova.demotestwip.it:3307;dbname=test',
            'username'          => 'root',
            'password'          => 'ricordala',
            'emulatePrepare'    => true,
            'charset'           => 'utf8',
            'enableSchemaCache' => false
        ],
        'session' => [
            'class' => 'yii\web\Session',
        ],
        'fileManager' => [
            'class' => 'rkit\filemanager\FileManager',
            // 'sessionName' => 'filemanager.uploads',
        ],
        // any flysystem component for storage
        'localFs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@tests/tmp/public',
        ],
    ]
];

if (file_exists(__DIR__ . '/local/config.php')) {
    require_once __DIR__ . '/local/config.php';
}

return $config;
