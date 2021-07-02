<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
	'name' => '2051',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'GqPju7Kv52ghCF7ehIB2AZ0lt27wA6AE',
			'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
	        'messageConfig' => [
		        'charset' => 'UTF-8',
		        'from' => ['info@2051.kyiv.ua' => '2051. Доставка коктейлів'],
	        ],
	        'transport' => [
		        'class' => 'Swift_SmtpTransport',
		        'host' => 'mail.adm.tools',
		        'username' => 'info@2051.kyiv.ua',
		        'password' => '5#4i8&A(KcdV',
		        'port' => '465', // Port 25 is a very common port too
		        'encryption' => 'ssl', // It is often used, check your provider or mail server specs
	        ],
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
	            '<action:(payment-and-delivery|contacts)>' => 'site/<action>',
				'<module:crm>/<controller:[a-zA-Z0-9\-]+>/<id:\d+>' => '<module>/<controller>/view',
				'<module:crm>/<controller:[a-zA-Z0-9\-]+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
				'<module:crm>/<controller:[a-zA-Z0-9\-]+>/<action:\w+>' => '<module>/<controller>/<action>',
				'<module:crm>/<controller:[a-zA-Z0-9\-]+>' => '<module>/<controller>/index',
				'<module:crm>' => '<module>/default/index',
            ],
        ],
    ],
	'modules' => [
		'crm' => [
			'class' => 'app\modules\crm\Module',
			'layout' => 'main',
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
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
