<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Colonias */

$this->title = $model->id_colonia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colonias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_colonia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_colonia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_colonia',
            'nombre_colonia',
            'id_municipio',
        ],
    ]) ?>

</div>
