<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView; 
use backend\models\PublicacionSearch;
use backend\models\Publicacion;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$UTC = new DateTimeZone("UTC");
$newTZ = new DateTimeZone("America/Merida");
$date = new DateTime( "now", $UTC );
$date->setTimezone( $newTZ );
$this->title = Yii::t('app', 'Publicaciones');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="publicacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Publicacion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= 
            //$datapubli = Publicacion::find()->all();
           GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style'=>'word-wrap:break-word; width:auto;'],
        'columns' => [
            'idpublicacion',
            [
                'class'=> 'kartik\grid\ExpandRowColumn',
                'value'=> function ($model,$key,$index,$column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=> function($model ,$key ,$index, $column){
                    $searchModel = new PublicacionSearch();
                    $searchModel->idpublicacion = $model->idpublicacion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    return Yii::$app->controller->renderPartial('indexdetail',
                            ['searchModel'=>$searchModel,
                              'dataProvider'=>$dataProvider]);
                },
                'expandTitle'=>'Detalle',
            ],
            'titulo',
            // 'url_imagen:url',
           // 'Descripcion:ntext',
            [
                'format' => 'Currency',
                'attribute' => 'precio',
                'label' => 'Precio',
                'pageSummary' => true
            ],
             [
                'format' => 'Currency',
                'attribute' => 'precio_neto',
                'label' => 'Precio neto',
                'pageSummary' => true
            ],
//             [
//            'attribute'=>'Colonias', 
//            'width'=>'250px',
//            'value'=>function ($model, $key, $index, $widget) { 
//                return $model->Colonia;
//            },
//            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map($datapubli, 'Colonia', 'Colonia'), 
//            'filterWidgetOptions'=>[
//                'pluginOptions'=>['allowClear'=>true],
//            ],
//            'filterInputOptions'=>['placeholder'=>'Any category']
//        ],
            'Colonia',
            'Tipo',
            'Operacion',
            'num_banio',
            'recamaras',
            [ 'class' => '\kartik\grid\ActionColumn',
        'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>']]
        ],
        'toolbar' => [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'Reset Grid')])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true,
            'messages' => [
                'allowPopups' => 'Esta seguro que quiere descargar los datos de publicación',
                'confirmDownload' => 'Ok, seguir?',
                'downloadProgress' => 'Generado archivo, por favor espere...',
            ],
            'header' => 'Exportar hoja de datos',
            'target' => [GridView::TARGET_SELF],
        ],
        'responsive' => false,
        'hover' => true,
        'showPageSummary' => true,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true,
        'toggleDataContainer' => ['class' => 'btn-group-sm'],
        'exportContainer' => ['class' => 'btn-group-sm'],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => true,
        ],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
        'exportConfig' => [
            GridView::PDF => ['label' => 'Guardar como PDF',
                'filename' => Yii :: t('app', 'Reporte de publicaciones'),
                'alertMsg' => Yii :: t('app', 'El archivo de exportación de PDF se generará para su descarga.'),
                'opcions' => ['title' => Yii :: t('app', 'Formato de Documento Portátil')],
                'config' => [
                    'methods' => [
                        'SetHeader' => ['Reporte de Pubicaciones||Generado : ' . $date->format('d-m-Y H:i:s')],
                        'SetFooter' => ['|Página {PAGENO}|'],
                    ],
                    'options' => [
                        'title' => "Reporte de publicaciones",
                        'subject' => Yii::t('app', ' Generador de PDF'),
                        'keywords' => Yii::t('app', 'krajee, grid, export, yii2-grid, pdf')
                    ],
                    'contentBefore' => '',
                    'contentAfter' => ''
                ]
            ],
            GridView::EXCEL => [
                'label' => Yii::t('app', 'Excel'),
                'icon' => 'file-excel-o',
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => Yii::t('app', 'Reporte de publicaciones'),
                'alertMsg' => Yii::t('app', 'El archivo EXCEL se generará para su descarga.'),
                'options' => ['title' => Yii::t('app', 'Microsoft Excel 2007')],
            ],
        ],
    ]);


//            GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'idpublicacion',
//            'titulo',
//            'url_imagen:url',
//            'Descripcion:ntext',
//             [
//              'format' => 'Currency',
//              'attribute' => 'precio',
//              'label' => 'Precio',
//            
//         ],
//            // 'fecha_de_publicacion',
//            // 'Colonia',
//            // 'Operacion',
//            // 'Tipo',
//            // 'num_banio',
//            // 'recamaras',
//            // 'id_user',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);
    
    ?>
</div>
