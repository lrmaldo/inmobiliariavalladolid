<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Operacion */

$this->title = 'Update Operacion: ' . $model->id_operacion;
$this->params['breadcrumbs'][] = ['label' => 'Operacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_operacion, 'url' => ['view', 'id' => $model->id_operacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
