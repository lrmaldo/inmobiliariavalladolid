<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Operacion */

$this->title = $model->id_operacion;
$this->params['breadcrumbs'][] = ['label' => 'Operaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_operacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_operacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Desea eliminar esta operación?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id_operacion',
            'nombre_operacion',
        ],
    ]) ?>

</div>
