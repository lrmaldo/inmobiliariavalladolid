<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */

$this->title = $model->id_user;
//$this->params['breadcrumbs'][] = ['label' => 'Publicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_perfil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_perfil], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Desea eliminar esta publicación?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

   
    <div class='row'>
       
            
       
        <div class="com-md-6">
            <?=     Html::img('@web/foto_perfil/'.$model->url,['alt'=>$model->url,'class'=>'img-responsive',
                'style'=>'width:400px; margin:0 auto;']); ?>
        </div>
        
    </div>
    

</div>
