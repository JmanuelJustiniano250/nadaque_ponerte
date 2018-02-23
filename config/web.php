<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'mymcms',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'jsOptions' => ['position' => \yii\web\View::POS_HEAD],
                ],
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'key' => 'AIzaSyC2Tvqo1imX5PWQAiHzOFmtw9UbiPCj9ko',
                        'language' => 'es',
                        'version' => '3.1.18'
                    ]
                ],

            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'nqp*2017/#',
            //'baseUrl'=>'',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            //'class' => 'yii\caching\MemCache',
            //'useMemcached' => true,
        ],
        'user' => [
            'identityClass' => 'app\models\Usuarios',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
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


        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            //'scriptUrl'=>'/admin/index.php',
            //'class'=>'yii\web\UrlManager',
            //'baseUrl'=>'admin',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '<action>' => 'site/<action>',
                '<action>/<id:\d+>' => 'site/<action>',
            ],
        ],

        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'cart_nqp',
        ]

    ],

    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
