<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LfPmsRoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lf-pms-role-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'role_id') ?>

    <?= $form->field($model, 'role_name') ?>

    <?= $form->field($model, 'role_describe') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/pms_role', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend/pms_role', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
