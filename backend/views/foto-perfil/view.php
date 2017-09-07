<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FotoPerfil */

$this->title = 'Foto Perfil';
//$this->params['breadcrumbs'][] = ['label' => 'Foto Perfils', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualzar', ['update', 'id' => $model->id_perfil], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_perfil',
            //'url:url',
            //'id_user',
        ],
    ]) ?>
     <div class="com-md-6">
            <?=     Html::img(Yii::getAlias("@web").'/'.$model->url,['alt'=>$model->url,'class'=>'img-responsive',
                'style'=>'width:400px; margin:0 auto;']); ?>
        </div>

</div>
