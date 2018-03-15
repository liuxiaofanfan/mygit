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
?>

<div class="app">
    <div class="header">
        <div class="header-content"></div>
    </div>
    <div class="banner">
        <div class="login-div clearfix">
            <div class="login-table">
                <div class="login-label">登录</div>
                <form>
                    <div class="username-div">
                        <i class="con-user"></i>
                        <div></div>
                    </div>
                    <div class="password-div"></div>
                    <div class="rem-div"></div>
                    <div class="do-login"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>

