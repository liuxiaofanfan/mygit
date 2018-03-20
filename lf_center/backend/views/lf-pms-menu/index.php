<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LfPmsMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/pms_menu', 'Lf Pms Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend/pms_menu', 'Create Lf Pms Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'menu_id',
            'menu_name',
            'menu_level',
            'parent_id',
            'target_url:url',
            'sequence',
            'icon',
            ['class' => 'yii\grid\ActionColumn','buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-pjax'=>'w0',
                ]);
            }
        ]],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
