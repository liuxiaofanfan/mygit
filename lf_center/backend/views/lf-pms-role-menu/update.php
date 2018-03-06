<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsRolemenu */

$this->title = Yii::t('backend/pms_role_menu', 'Update Lf Pms Rolemenu: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_role_menu', 'Lf Pms Rolemenus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend/pms_role_menu', 'Update');
?>
<div class="lf-pms-rolemenu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
