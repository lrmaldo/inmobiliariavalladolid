<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name'=>'Inmobiliaría Valladolid',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [ function () {
            $path = '/inmobiliaria/';

            $filename = basename(Yii::$app->getRequest()->getScriptFile());
            Yii::$app->getRequest()->setScriptUrl($path . $filename);
            Yii::$app->getRequest()->setBaseUrl(rtrim($path, '/'));
        },'log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

         'urlManager' => [
        'class' => 'yii\web\UrlManager',
        // Disable r= routes
        'enablePrettyUrl' => true,
        'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ),
        ],
        'urlManagerBackend' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => 'http://localhost/inmobiliaria/backend/web/',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
        ],
      
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
