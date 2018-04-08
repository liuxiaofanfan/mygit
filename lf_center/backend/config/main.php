<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    #多语言切换
    'on beforeRequest' => function($event){
        Yii::$app->language = isset(\Yii::$app->session['language']) ? \Yii::$app->session['language'] : 'zh-CN';
        return; 
    },    
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        #用户核心组件
        'user' => [
            'identityClass' => 'common\models\LfPmsUser',
            'enableAutoLogin' => false,
            // 'authTimeout' => 10, //use for test
            'authTimeout' => 10*60,
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        // 'log' => [
        //     'traceLevel' => YII_DEBUG ? 3 : 0,
        //     'targets' => [
        //         [
        //             'class' => 'yii\log\FileTarget',
        //             'levels' => ['error', 'warning'],
        //         ],
        //     ],
        // ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['LFTEST'],
                    'logFile' => '@backend/runtime/logs/MyLog/lf_test.log',
                    'maxFileSize' => 1024*2,
                    'maxLogFiles' => 20,
                    'logVars' => [],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
