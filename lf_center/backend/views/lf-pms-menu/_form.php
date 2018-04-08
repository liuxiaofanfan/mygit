<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lf-pms-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'menu_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_level')->textInput() ?>

    <?= $form->field($model, 'parent_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sequence')->textInput() ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/pms_menu', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
