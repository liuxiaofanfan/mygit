<?php
use backend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('backend', 'Backend Sign In');

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

<?php Pjax::begin(['id' => 'login-pjax']); ?>

<?php 
    if(Yii::$app->getSession()->hasFlash("loginTimeOut")){
        echo yii\bootstrap\Alert::widget([
            'options' => ['class' => 'alert-warning the-timeout'],
            'body' => Yii::t("backend", Yii::$app->getSession()->getFlash("loginTimeOut")),
        ]);
    }
?>

<div class="app">
    <div class="header">
        <div class="header-content">
            <div class="head-left">
                <span class="icon"></span>
                <span class="name"><?= Yii::t('backend', 'DianYing Backend Manager Web') ?></span>
            </div>
            <div class="head-right">
                <div class="langs">
                    <span id="lang-zh" class="lang <?php if(Yii::$app->session['language'] == 'zh-CN') echo 'lang-active'; ?>"><?= Html::a('简体中文', ['site/language', 'lang' => 'zh-CN']) ?></span>
                    <span class="divide">|</span>
                    <span id="lang-en" class="lang <?php if(Yii::$app->session['language'] == 'en') echo 'lang-active'; ?>"><?= Html::a('English', ['site/language', 'lang' => 'en'])?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <div class="login-div clearfix">
            <div class="login-table">
                <div class="login-label"><?= Yii::t('backend', 'Backend Sign In') ?></div>
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
                    <?= Html::submitButton(Yii::t('backend', 'Sign In'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button', 'id' => 'do-login']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="the-content">
        <div class="notice">
            <div class="role-label"><?= Yii::t('backend', 'Account description') ?></div>
            <div class="row">
                <div class="col-xs-12 col-md-4 role-item role-user">
                    <div class="role-item-border">
                        <div class="role-pic"></div>
                        <div class="role-msg">
                            <div class="name"><?= Yii::t('backend', 'normal user') ?></div>
                            <div class="msg"><?= Yii::t('backend', 'You can go to the front desk, browse through the data, and use the functions.') ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 role-item role-admin">
                    <div class="role-item-border">
                        <div class="role-pic"></div>
                            <div class="role-msg">
                                <div class="name"><?= Yii::t('backend', 'system manager') ?></div>
                                <div class="msg"><?= Yii::t('backend', 'Can enter the website foreground, the background, use the function of it, support file uploads.') ?></div>
                            </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 role-item role-god">
                    <div class="role-item-border">
                        <div class="role-pic"></div>
                        <div class="role-msg">
                            <div class="name"><?= Yii::t('backend', 'developer') ?></div>
                            <div class="msg"><?= Yii::t('backend', 'You can enter the foreground and background, and you can see the development menu.') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <strong>Copyright &copy; 2018 <a href="javascript:;"><?= Yii::t('backend', 'Jiangsu dian ying network technology co. LTD') ?></a>.</strong> All rights reserved.
    </div>
</div>
<?php Pjax::end(); ?>