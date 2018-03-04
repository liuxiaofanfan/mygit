<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LfPmsRolemenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lf-pms-rolemenu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'role_id') ?>

    <?= $form->field($model, 'menu_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/pms_role_menu', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend/pms_role_menu', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
