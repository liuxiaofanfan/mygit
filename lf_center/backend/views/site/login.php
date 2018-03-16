<?php
use backend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

AppAsset::register($this);
AppAsset::addCss($this, 'css/back_login.css');
AppAsset::addScript($this, 'js/site/login.js');

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback login-input'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback login-input'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="app">
    <div class="header">
        <div class="header-content">
            <div class="head-left">
                <span class="icon"></span>
                <span class="name">点盈后台管理平台</span>
            </div>
            <div class="head-right">
                <div class="langs">
                    <span id="lang-zh" class="lang lang-active">简体中文</span>
                    <span class="divide">|</span>
                    <span id="lang-en" class="lang">English</span>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="login-div clearfix">
            <div class="login-table">
                <div class="login-label">后台登录</div>
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

                <?= $form
                    ->field($model, 'username', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

                <?= $form
                    ->field($model, 'password', $fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

                <div>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>

                <div>
                    <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button', 'id' => 'do-login']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="the-content">
        <div class="notice">
            <div class="role-label">账号分类说明</div>
            <div class="row">
                <div class="col-xs-12 col-md-4 role-item role-user">
                    <div class="role-item-border">
                        <div class="role-pic"></div>
                        <div class="role-msg">
                            <div class="name">普通用户</div>
                            <div class="msg">可以进入网站前台，浏览其中的数据，使用其中的功能</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 role-item role-admin">
                    <div class="role-item-border">
                        <div class="role-pic"></div>
                            <div class="role-msg">
                                <div class="name">管理员</div>
                                <div class="msg">可以进入网站前台、后台，使用其中的功能，支持文件上传</div>
                            </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 role-item role-god">
                    <div class="role-item-border">
                        <div class="role-pic"></div>
                        <div class="role-msg">
                            <div class="name">开发者</div>
                            <div class="msg">能进入前台、后台，可以看到开发菜单</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <strong>Copyright &copy; 2018 <a href="javascript:;">江苏点盈网络科技有限公司</a>.</strong> All rights reserved.
    </div>
</div>

