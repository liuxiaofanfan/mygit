<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WxPic */

$this->title = Yii::t('backend/wx-pic', 'Update Wx Pic: {nameAttribute}', [
    'nameAttribute' => $model->ID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/wx-pic', 'Wx Pics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('backend/wx-pic', 'Update');
?>
<div class="wx-pic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
