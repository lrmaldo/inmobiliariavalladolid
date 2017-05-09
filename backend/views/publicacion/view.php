<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */

$this->title = $model->idpublicacion;
$this->params['breadcrumbs'][] = ['label' => 'Publicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idpublicacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idpublicacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Deseas eliminar esta publicación?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpublicacion',
            'titulo',
            //'url_imagen:url',
            'Descripcion:ntext',
            'precio',
            'fecha_de_publicacion',
            'Colonia',
            'Operacion',
            'Tipo',
            'num_banio',
            'recamaras',
           // 'id_user',
        ],
    ]) ?>
     </div> 
       <div class="com-md-6"> 
           <?=    Html::img('@web/'.$model->url_imagen,['alt'=>$model->titulo,'class'=>'img-responsive', 
               'style'=>'width:400px; margin:0 auto;']); ?> 
       </div> 
        
   </div> 
    

</div>
