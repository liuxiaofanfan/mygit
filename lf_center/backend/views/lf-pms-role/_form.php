<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsRole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lf-pms-role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_describe')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/pms_role', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
