<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Fotoperfil */
$user = new User();

$this->title = "Foto de perfil";
//$this->params['breadcrumbs'][] = ['label' => 'Fotoperfils', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotoperfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_perfil], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_perfil',
            //'url:url',
           
           // 'id_user',
             //$user->username,
            
        ],
    ]) ?>
    <div class="com-md-6">
        <h3><?= Html::encode($user->username)?></h3>
    </div>
    <div class="com-md-6">
            <?=     Html::img(Yii::getAlias("@web").'/'.$model->url,['alt'=>$model->url,'class'=>'img-responsive',
                'style'=>'width:400px; margin:0 auto;']); ?>
        </div>

</div>
