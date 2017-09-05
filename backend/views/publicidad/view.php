<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicidad */

$this->title = $model->id_publicidad;
$this->params['breadcrumbs'][] = ['label' => 'Publicidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_publicidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_publicidad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que quiere eliminar esta publicidad?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_publicidad',
            'titulo',
            //'url_publicidad:url',
            //'url_imagen_publicidad:url',
        ],
    ]) ?>
     <div class="com-md-6">
        <?= Html::a("url de publicidad", $model->url_publicidad) ?>
    </div>
     <div class="com-md-6">
            <?=     Html::img(Yii::getAlias("@web").'/'.$model->url_imagen_publicidad,['alt'=>$model->url_imagen_publicidad,'class'=>'img-responsive',
                'style'=>'width:400px; margin:0 auto;']); ?>
        </div>
   

</div>
