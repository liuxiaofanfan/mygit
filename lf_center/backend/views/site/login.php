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
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
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

                    <div class="row">
                        <div class="col-xs-8">
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                        </div>
                        <!-- /.col -->
                    </div>

        <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>

