<?php
return [
    'adminEmail' => 'admin@example.com',

    'pic_position' => [
    	'0' => '-请选择图片位置-',
    	'1' => '顶部轮播',
    ],

    // 图片服务器的域名设置，拼接保存在数据库中的相对地址，可通过web进行展示
    'domain' => Yii::$app->request->hostInfo."/",
    'imageUploadRelativePath' => "../../backend/www/pic/uploads/wx_pic/", // 图片默认上传的目录
    'imageUploadSuccessPath' => "uploads/wx_pic/", // 图片上传成功后，路径前缀
    'webuploader' => [
        // 后端处理图片的地址，value 是相对的地址
        'uploadUrl' => 'site/upload',
        // 多文件分隔符
        'delimiter' => ',',
        // 基本配置
        'baseConfig' => [
            'defaultImage' => '/pic/nopic.png',
            'disableGlobalDnd' => true,
            'accept' => [
                'title' => 'Images',
                'extensions' => 'gif,jpg,jpeg,bmp,png',
                'mimeTypes' => 'image/*',
            ],
            'pick' => [
                'multiple' => false,
            ],
        ],
    ],
];
