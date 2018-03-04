<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LfPmsUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lf-pms-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_name') ?>

    <?= $form->field($model, 'account') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'isDel') ?>

    <?php // echo $form->field($model, 'isModPwd') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/pms_user', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend/pms_user', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
