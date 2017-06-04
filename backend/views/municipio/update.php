<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Municipio */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Municipio',
]) . $model->id_municipio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Municipios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_municipio, 'url' => ['view', 'id' => $model->id_municipio]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="municipio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
