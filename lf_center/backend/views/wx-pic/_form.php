<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WxPic */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs('
	$("#wxpic-pic_url").attr("readonly", "readonly");
', View::POS_READY);
?>

<div class="wx-pic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PIC_URL')->widget('manks\FileInput', []) ?>

    <?= $form->field($model, 'PIC_POS')->dropDownList(Yii::$app->params['pic_position']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
