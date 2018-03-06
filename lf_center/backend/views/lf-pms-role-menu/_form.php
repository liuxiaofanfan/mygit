<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsRolemenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lf-pms-rolemenu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/pms_role_menu', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
