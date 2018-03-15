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
        <div class="header-content"></div>
    </div>
    <div class="banner">
        <div class="login-div clearfix">
            <div class="login-table">
                <div class="login-label">登录</div>
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
                        <?= Html::submitButton('Sign in', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button', 'id' => 'do-login']) ?>
                    </div>
        <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="the-content">
        <div class="notice">
            <div class="role-label">账号分类说明</div>
            <div class="my-boxs">
                <div class="my-box role-item"></div>
                <div class="my-box role-item"></div>
                <div class="my-box role-item"></div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>

