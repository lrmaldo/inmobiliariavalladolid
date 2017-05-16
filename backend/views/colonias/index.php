<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ColoniasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colonias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Insertar Colonia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_colonia',
            'nombre_colonia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
