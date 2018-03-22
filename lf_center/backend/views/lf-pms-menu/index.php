<?php

use backend\assets\AppAsset;
use common\helper\rbac\MenuHelper;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LfPmsMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/pms_menu', 'Lf Pms Menus');
$this->params['breadcrumbs'][] = $this->title;

AppAsset::register($this);
AppAsset::addScript($this, 'js/lf-pms-menu/index.js');

$this->registerJs('
    $("#content-wrapper").on("click", ".delete-batch", function(){
        var keys = $("#menu-grid").yiiGridView("getSelectedRows");
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
        <?= Html::a(Yii::t('backend/pms_menu', 'Delete Menu Batch'), 'javascript:void(0);', ['class' => 'btn btn-danger delete-menu-batch']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'menu-grid',
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn', 'name' => 'id'],
            'menu_id',
            'menu_name',
            'menu_level',
            [
                'attribute' => 'parent_id',
                'label' => Yii::t('common/pms_menu', 'Parent'),
                'value' => function($model){
                    return MenuHelper::getMenuNameById($model->parent_id);
                }
            ],
            'target_url',
            [
                'attribute' => 'sequence',
                'headerOptions' => ['width' => 60],
                'filter' => false,
            ],
            [
                'attribute' => 'icon',
                'value' => function($model){
                    return "<span class='glyphicon glyphicon-".$model->icon."'></span>";
                },
                'format' => 'raw',
                'headerOptions' => ['width' => '60'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function($url, $model, $key){
                        $options = [
                            'title' => Yii::t('common', 'Opt_View'),
                            'aria-label' => Yii::t('common', 'Opt_View'),
                            'data-pjax' => 'true',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'update' => function($url, $model, $key){
                        $options = [
                            'title' => Yii::t('common', 'Opt_Update'),
                            'aria-label' => Yii::t('common', 'Opt_Update'),
                            'data-pjax' => 'true',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    },
                    'delete' => function($url, $model, $key){
                        $options = [
                            'title' => Yii::t('common', 'Opt_Delete'),
                            'aria-label' => Yii::t('common', 'Opt_Delete'),
                            'data-pjax' => 'true',
                            'data-confirm' => Yii::t('common', 'Are you sure to delete it!'),
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
