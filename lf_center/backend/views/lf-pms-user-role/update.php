<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsUserrole */

$this->title = Yii::t('backend/pms_user_role', 'Update Lf Pms Userrole: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_user_role', 'Lf Pms Userroles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend/pms_user_role', 'Update');
?>
<div class="lf-pms-userrole-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
