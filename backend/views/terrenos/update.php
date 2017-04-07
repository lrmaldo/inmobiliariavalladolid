<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Terrenos */

$this->title = 'Update Terrenos: ' . $model->ID_Terreno;
$this->params['breadcrumbs'][] = ['label' => 'Terrenos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_Terreno, 'url' => ['view', 'id' => $model->ID_Terreno]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terrenos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
