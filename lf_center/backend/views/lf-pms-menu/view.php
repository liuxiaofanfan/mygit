<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LfPmsMenu */

$this->title = $model->menu_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_menu', 'Lf Pms Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend/pms_menu', 'Update'), ['update', 'id' => $model->menu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend/pms_menu', 'Delete'), ['delete', 'id' => $model->menu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend/pms_menu', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'menu_id',
            'menu_name',
            'menu_level',
            'parent_id',
            'target_url:url',
            'sequence',
            'icon',
        ],
    ]) ?>

</div>
