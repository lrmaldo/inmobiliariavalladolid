<?php
use kartik\mpdf\Pdf;
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name'=>'Inmobiliaria Valladolid',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [ 'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
        [
    'class' => 'yii\i18n\PhpMessageSource',
    'basePath' => '@kvgrid/messages',
    'forceTranslation' => true
]
        ],
    'components' => ['view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@backend/views'
             ],
         ],
    ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        
         'urlManagerFrontend' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => 'http://localhost/inmobiliaria/frontend/web/',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
        ],
        'urlManager' => [
        'class' => 'yii\web\UrlManager',
        // Disable r= routes
        'enablePrettyUrl' => true,
             //'suffix' => '.html',
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
        'urlManagerBackend1' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => 'http://localhost/inmobiliaria/backend/',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
        ],
        
        'formatter' => [
                 'class' => 'yii\i18n\Formatter',
                 'thousandSeparator' => ',',
                 'decimalSeparator' => '.',
                 'currencyCode' => 'MXN',
    ],
//         'pdf' => [
//        'class' => Pdf::classname(),
//        'format' => Pdf::FORMAT_LETTER,
//        'orientation' => Pdf::ORIENT_PORTRAIT,
//        'destination' => Pdf::DEST_BROWSER,
//         'title'=>"Reporte de publicaciones",    
//        // refer settings section for all configuration options
//    ]
        
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'as beforeRequest' => [
    'class' => 'yii\filters\AccessControl',
    'rules' => [
        [
            'allow' => true,
            'actions' => ['login'],
        ],
        [
            'allow' => true,
            'roles' => ['@'],
        ],
         [
            'actions' => ['request-password-reset','reset-password'],
                'allow' => true,
                'roles' => ['?'],
            ],
    ],
    'denyCallback' => function () {
        return Yii::$app->response->redirect(['site/login']);
    },
],
    'params' => $params,
];
