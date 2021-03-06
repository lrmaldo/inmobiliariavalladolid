<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Insertar Operacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_operacion',
            'nombre_operacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
