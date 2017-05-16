<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Colonias */

$this->title = $model->nombre_colonia;
$this->params['breadcrumbs'][] = ['label' => 'Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_colonia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_colonia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Deseas eliminar esta colonia?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_colonia',
            'nombre_colonia',
        ],
    ]) ?>

</div>
