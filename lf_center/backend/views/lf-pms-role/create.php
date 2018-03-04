<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LfPmsRole */

$this->title = Yii::t('backend/pms_role', 'Create Lf Pms Role');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_role', 'Lf Pms Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
