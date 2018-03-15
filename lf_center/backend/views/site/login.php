<?php
use backend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

AppAsset::register($this);
AppAsset::addCss($this, Yii::$app->request->baseUrl.'/css/back_login.css');
?>

<div class="app">
    <div class="header"></div>
    <div class="banner"></div>
    <div class="footer"></div>
</div>