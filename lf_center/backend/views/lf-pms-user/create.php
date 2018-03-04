<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LfPmsUser */

$this->title = Yii::t('backend/pms_user', 'Create Lf Pms User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_user', 'Lf Pms Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
