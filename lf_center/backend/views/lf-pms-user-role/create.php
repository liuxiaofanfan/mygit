<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LfPmsUserrole */

$this->title = Yii::t('backend/pms_user_role', 'Create Lf Pms Userrole');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/pms_user_role', 'Lf Pms Userroles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lf-pms-userrole-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
