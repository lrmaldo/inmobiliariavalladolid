<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView; 
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Publicacions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicacion-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
       // 'containerOptions'=>['style'=>'overflow: auto'],
        'options'=>['style'=>'word-wrap:break-word; width:auto; overflow: auto;'],
        'columns' => [
          [
        'attribute' => 'imagen',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img(Yii::getAlias('@web').'/'. $data->url_imagen,
                ['width' => '240px']);
        },
    ],
                [
                    'attribute'=>'notas',
                    'format'=>'html',
                    'value'=>function ($data) {
            return '<p class= "card-product-description">'.$data->notas.'</p>';
        },
                ],
                
                //'notas:ntext',
                

            //'idpublicacion',
            //'titulo',
//            ['format' => 'image',
//'value'=>function($data) { return $data->url_imagen; },],
            //'url_imagen:url',
           // 'Descripcion:ntext',
            //'precio',
            // 'fecha_de_publicacion',
            // 'Colonia',
            // 'Operacion',
            // 'Tipo',
            // 'num_banio',
            // 'recamaras',
            // 'id_user',

         
        ],
          'responsive' => false,
        'hover' => true,
        'showPageSummary' => true,
        'containerOptions' => ['style' => 'overflow: auto'],
        
    ]); ?>
</div>