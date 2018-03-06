<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsRole */

$this->title = $model->role_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_role', 'Lf Pms Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-role-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend/pms_role', 'Update'), ['update', 'id' => $model->role_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend/pms_role', 'Delete'), ['delete', 'id' => $model->role_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend/pms_role', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'role_id',
            'role_name',
            'role_describe',
        ],
    ]) ?>

</div>
