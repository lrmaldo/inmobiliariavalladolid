<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PublicacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publicaciones';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Publicacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpublicacion',
            'titulo',
          //  'url_imagen:url',
            'Descripcion:ntext',
             [
            
              'attribute' => 'precio',
              'format' => ['decimal',2],
              'label' => 'Precio',
            
         ],
            'fecha_de_publicacion',
             'Colonia',
             'Operacion',
             'Tipo',
            // 'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
