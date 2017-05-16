<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Colonias */

$this->title = 'Update Colonias: ' . $model->id_colonia;
$this->params['breadcrumbs'][] = ['label' => 'Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_colonia, 'url' => ['view', 'id' => $model->id_colonia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="colonias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
