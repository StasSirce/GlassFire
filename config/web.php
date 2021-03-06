<?php



$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'name' => "Ensofon",
    'homeUrl' => '/',

    'bootstrap' => ['log'],

    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
            'layout'=>'/admin',
        ],
    ],

    'language'=>'ru-RU',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '0_OZnweO6i99kQRFF6gSeJiXb-9AJmUB',
            'enableCsrfValidation' => false,
            'baseUrl' => ''
        ],

        'MetrikaWidget' => [
            'class' => 'app\components\MetrikaWidget'
        ],

        'morphy' => [
            'class' => 'app\components\morphy\PHPMorphy'
        ],

        'accessControl' => [
            'class' => 'app\components\AccessControl'
        ],

        'assetManager' => [
            'bundles' => require(__DIR__ . '/assets.php'),
            'converter'=> [
                'class'=>'nizsheanez\assetConverter\Converter',
                'destinationDir' => '',
                'parsers' => [
                    'scss' => [ // file extension to parse
                        'class' => 'nizsheanez\assetConverter\Scss',
                        'output' => 'css', // parsed output file type
                        'options' => [ // optional options
                            'enableCompass' => false, // default is true
                            'importPaths' => [], // import paths, you may use path alias here,
                            // e.g., `['@path/to/dir', '@path/to/dir1', ...]`
                            'lineComments' => false, // if true — compiler will place line numbers in your compiled output
                            'outputStyle' => 'nested', // May be `compressed`, `crunched`, `expanded` or `nested`,
                            // see more at http://sass-lang.com/documentation/file.SASS_REFERENCE.html#output_style
                        ],
                    ],
                ],
            ]
        ],

        'view' => [
            'class' => 'app\components\View'
        ],

        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin', 'user']
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // стандартное правило для обработки '/' как 'site/index'
                '<action:\w+>' => 'site/<action>',

                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],

        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d-m-Y',
            'datetimeFormat' => 'php:d-m-Y H:i a',
            'timeFormat' => 'php:H:i A',
            'defaultTimeZone' => '+04:00',
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/login'],
            'class' => 'app\components\User'
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => YII_DEBUG ? ['*'] : []
    ];

    $config['components']['assetManager']['forceCopy'] = true;
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'app\components\gii\Module',
        'allowedIPs' => YII_DEBUG ? ['*']  : [],
        'generators' => [
            'crud'   => [
                'class'     => 'app\components\gii\generators\crud\Generator',
            ],
            'model'   => [
                'class'     => 'app\components\gii\generators\model\Generator',
            ]
        ]
    ];
}

return $config;
