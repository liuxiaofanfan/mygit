<?php
return [
    'language' => "zh-CN",
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        #国际化支持
        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'common' => 'common.php',
                        'common/login_form' => 'login_form.php',
                        'common/pms_user' => 'pms_user.php',
                        'common/pms_role' => 'pms_role.php',
                        'common/pms_menu' => 'pms_menu.php',
                        'common/pms_role_menu' => 'pms_role_menu.php',
                        'common/pms_user_role' => 'pms_user_role.php',
                        'common/wx_pic' => 'wx_pic.php',
                    ],
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'fileMap' => [
                        'backend' => 'backend.php',
                        'backend/pms_user' => 'pms_user.php',
                        'backend/pms_role' => 'pms_role.php',
                        'backend/pms_menu' => 'pms_menu.php',
                        'backend/pms_role_menu' => 'pms_role_menu.php',
                        'backend/pms_user_role' => 'pms_user_role.php',
                        'backend/wx_pic' => 'wx_pic.php',
                    ],
                ],
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'fileMap' => [
                        'frontend' => 'frontend.php',
                        'frontend/pms_user' => 'pms_user.php',
                        'frontend/pms_role' => 'pms_role.php',
                        'frontend/pms_menu' => 'pms_menu.php',
                        'frontend/pms_role_menu' => 'pms_role_menu.php',
                        'frontend/pms_user_role' => 'pms_user_role.php',
                    ],
                ],
                'api*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@api/messages',
                    'fileMap' => [
                        'api' => 'api.php',
                        'api/section' => 'section.php',
                        'api/comment' => 'comment.php',
                    ],
                ],
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ],
        ],
        
    ],
];
