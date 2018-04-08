<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsMenu */

$this->title = Yii::t('backend/pms_menu', 'Update Lf Pms Menu: {nameAttribute}', [
    'nameAttribute' => $model->menu_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_menu', 'Lf Pms Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->menu_id, 'url' => ['view', 'id' => $model->menu_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="lf-pms-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
