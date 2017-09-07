<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publicidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Publicidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style'=>'word-wrap:break-word; width:auto; overflow: auto;'],
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

            //'id_publicidad',
            //'titulo',
            [
                    'attribute'=>'id',
                    'format'=>'html',
                    'value'=>function ($data) {
            return '<p style = "width: 2%;" >'.$data->id_publicidad.'</p>';
        }
        ],
            [
                    'attribute'=>'titulo',
                    'format'=>'html',
                    'value'=>function ($data) {
            return '<p style = " word-wrap: break-word;    width: 100%;" >'.$data->titulo.'</p>';
        },
                ],
                [
                    'attribute'=>'url_publicidad',
                    'format'=>'html',
                    'value'=>function ($data) {
            return Html::a("url publicidad", $data->url_publicidad);
        },
                ],
                  [
        'attribute' => 'imagen de publicidad',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img(Yii::getAlias('@web').'/'. $data->url_imagen_publicidad,
                ['width' => '240px']);
        },
    ],
            //'url_publicidad:ntext',
           // 'url_imagen_publicidad:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
                'responsive' => false,
        'hover' => true,
        //'showPageSummary' => true,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true,
        'toggleDataContainer' => ['class' => 'btn-group-sm'],
        
        
    ]); ?>
</div>
