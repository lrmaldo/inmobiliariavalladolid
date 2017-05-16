<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipos */

$this->title = 'Update Tipos: ' . $model->id_tipo;
$this->params['breadcrumbs'][] = ['label' => 'Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo, 'url' => ['view', 'id' => $model->id_tipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
