<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Estado */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Estado',
]) . $model->id_estado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estado, 'url' => ['view', 'id' => $model->id_estado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
