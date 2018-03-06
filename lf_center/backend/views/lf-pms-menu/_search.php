<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LfPmsMenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lf-pms-menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'menu_id') ?>

    <?= $form->field($model, 'menu_name') ?>

    <?= $form->field($model, 'menu_level') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'target_url') ?>

    <?php // echo $form->field($model, 'sequence') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend/pms_menu', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend/pms_menu', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
