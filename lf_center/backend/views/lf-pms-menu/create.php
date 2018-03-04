<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LfPmsMenu */

$this->title = Yii::t('backend/pms_menu', 'Create Lf Pms Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_menu', 'Lf Pms Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
