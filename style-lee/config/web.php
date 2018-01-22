<?php

$params = require(__DIR__ . '/params.php');

$config = [

	'defaultRoute' => 'site/index',
    	'id' => 'basic',
    	'basePath' => dirname(__DIR__),
    	'bootstrap' => ['log'],
    	'components' => [
	        	'request' => [
	            	// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
	            	'cookieValidationKey' => 'OFJb7BiV3qGdQk7kWeS7kNO-y258FiEJ',
	        	],
        		'cache' => [
            		'class' => 'yii\caching\FileCache',
        		],
        		'assetManager' => [ 
			        'linkAssets' => true, 
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
	        	],
	        	'log' => [
	        		// 'flushInterval' => 1,
	            	'traceLevel' => YII_DEBUG ? 3 : 0,
	            	'targets' => [
	                		[
	                    			'class' => 'yii\log\FileTarget',
	                    			'levels' => ['error', 'warning','trace'],
	                		],
	            	],
	        	],
	        	'db' => require(__DIR__ . '/db.php'),
	        	'urlManager' => [
	            	'enablePrettyUrl' => true,
	            	'showScriptName' => true,
	            	'rules' => [
	            		'collectiveWeiXin/callable'=>'collectiveWeiXin/callable/index',
	            		// 'collectiveWeiXin/callable/index'=>'collectiveWeiXin/callable/index',
	            	],
	        	],


    	],
    	'params' => $params,

    	'modules'=>[
        		'collectiveWeiXin'=>[
        			'class'=>'app\collectiveWeiXin\weixin'
        		]
        	],
];

if (YII_ENV_DEV) {
    	// configuration adjustments for 'dev' environment
    	$config['bootstrap'][] = 'debug';
    	$config['modules']['debug'] = [
        		'class' => 'yii\debug\Module',
    	];
    	$config['bootstrap'][] = 'gii';
    	$config['modules']['gii'] = [
        		'class' => 'yii\gii\Module',
    	];
}

return $config;
