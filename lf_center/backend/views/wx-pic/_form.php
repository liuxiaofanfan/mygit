<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WxPic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wx-pic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PIC_URL', [
    	'inputOptions' => [
    		'readonly' => 'readonly',
    		'placeholder' => '123',
    	]
    ])->widget('manks\FileInput', []) ?>

    <?= $form->field($model, 'PIC_POS')->dropDownList(Yii::$app->params['pic_position']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
