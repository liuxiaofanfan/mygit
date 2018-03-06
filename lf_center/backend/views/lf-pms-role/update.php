<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsRole */

$this->title = Yii::t('backend/pms_role', 'Update Lf Pms Role: {nameAttribute}', [
    'nameAttribute' => $model->role_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_role', 'Lf Pms Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_id, 'url' => ['view', 'id' => $model->role_id]];
$this->params['breadcrumbs'][] = Yii::t('backend/pms_role', 'Update');
?>
<div class="lf-pms-role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
