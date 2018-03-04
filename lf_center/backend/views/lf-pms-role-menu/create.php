<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LfPmsRolemenu */

$this->title = Yii::t('backend/pms_role_menu', 'Create Lf Pms Rolemenu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_role_menu', 'Lf Pms Rolemenus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-rolemenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
