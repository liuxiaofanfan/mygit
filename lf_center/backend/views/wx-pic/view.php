<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WxPic */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/wx_pic', 'Wx Pics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-pic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
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
        ],
    ]) ?>

</div>
