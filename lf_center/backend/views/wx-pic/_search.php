<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WxPicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-pic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PIC_URL') ?>

    <?= $form->field($model, 'PIC_POS') ?>

    <?= $form->field($model, 'UTIME') ?>

    <?= $form->field($model, 'UADMIN') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/wx-pic', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend/wx-pic', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
