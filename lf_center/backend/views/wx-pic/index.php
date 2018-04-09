<?php

use common\helper\DbHelper;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\WxPicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend/wx_pic', 'Wx Pics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-pic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend/wx_pic', 'Create Wx Pic'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'PIC_URL:url',
            [
                'attribute' => 'PIC_URL',
                'label' => Yii::t('common/wx_pic', 'PIC_URL'),
                'format' => [
                    'image',    
                    [
                        'width' => '40',
                        'height' => '40',
                    ],
                ],
                'value' => function($model){
                    return $model->PIC_URL ? Yii::$app->params['domain'].Yii::$app->params['imageUploadSuccessPath'].$model->PIC_URL: "@backend/web/pic/nopic.png";
                }
            ],
            [
                'attribute' => 'PIC_POS',
                'label' => Yii::t('common/wx_pic', 'PIC_POS'),
                'value' => function($model){
                    return Yii::$app->params['pic_position'][$model->PIC_POS];
                }
            ],
            'UTIME',
            [
                'attribute' => 'UADMIN',
                'label' => Yii::t('common/wx_pic', 'UADMIN'),
                'value' => function($model){
                    return DbHelper::getUserNameById($model->UADMIN);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
