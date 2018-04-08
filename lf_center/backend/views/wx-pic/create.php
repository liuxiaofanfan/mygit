<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WxPic */

$this->title = Yii::t('backend/wx_pic', 'Create Wx Pic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/wx_pic', 'Wx Pics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wx-pic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
