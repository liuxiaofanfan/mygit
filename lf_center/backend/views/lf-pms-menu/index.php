<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LfPmsMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/pms_menu', 'Lf Pms Menus');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
    $("#out-content").on("click", ".delete-batch", function(){
        var keys = $("#grid").yiiGridView("getSelectedRows");
        console.log(keys);
    });
', View::POS_END);
?>
<div class="lf-pms-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend/pms_menu', 'Create Lf Pms Menu'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('backend/pms_menu', 'Delete Menu Batch'), 'javascript:void(0);', ['class' => 'btn btn-danger delete-batch']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'grid',
        'showFooter' => true,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // ['class' => 'yii\grid\CheckboxColumn', 'name' => 'id'],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'name'  => 'id',
                'headerOptions' => ['width' => 30],
                'footer' => '<button href="#" class="btn btn-default btn-xs delete-batch">删除</button>',
                'footerOptions' => ['colspan' => 2],
            ],
            ['attribute' => 'menu_id', 'footerOptions' => ['class'=>'hide']],
            // 'menu_name',
            // 'menu_level',
            // 'parent_id',
            // 'target_url:url',
            // 'sequence',
            // 'icon',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
