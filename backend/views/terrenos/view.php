<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Terrenos */

$this->title = $model->ID_Terreno;
$this->params['breadcrumbs'][] = ['label' => 'Terrenos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terrenos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_Terreno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_Terreno], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_Terreno',
            'Nombre',
            'Descripcion:ntext',
            'Ubicacion:ntext',
            'Precio',
            'Propietario',
            'Notas:ntext',
        ],
    ]) ?>

</div>
