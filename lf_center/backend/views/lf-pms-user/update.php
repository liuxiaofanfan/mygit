<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsUser */

$this->title = Yii::t('backend/pms_user', 'Update Lf Pms User: {nameAttribute}', [
    'nameAttribute' => $model->user_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_user', 'Lf Pms Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('backend/pms_user', 'Update');
?>
<div class="lf-pms-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
