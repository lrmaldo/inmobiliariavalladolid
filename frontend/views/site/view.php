<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */

$this->title = $model->titulo;

?>
<div class="publicacion-view">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= $this->title ?>
                </h1>
            </div>
        </div>
    </div>


    <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <?=     Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$model->url_imagen,['alt'=>$model->titulo,'class'=>'img-responsive',
                'style'=>'width:750px; height:500px; margin:0 auto;']); ?>
            </div>

            <div class="col-md-4">
                <h3>Descripción General</h3>
                <p style="word-wrap: break-word"><?=
                    $model->Descripcion
                    ?>
                </p>

                <h3>Project Details</h3>
                <div class="col">
                <ul class="fa-ul">
                    <li><i class=" fa fa-money "></i>
                    MXN <?=
                    $model->precio ?>    
                    </li>
                    <li><i class="fa fa-globe" aria-hidden="true"></i>
                    <?=
                    $model->Colonia ?></li>
                    <li><i class="fa fa-home" aria-hidden="true"></i>
                    <?=
                    $model->Tipo ?></li>
                    <li><li><i class="fa fa-legal" aria-hidden="true"></i><?=
                    $model->Operacion ?></li>
                    <li><li><li><i class="fa fa-bath" aria-hidden="true"></i><?=
                    $model->num_banio?></li>
                    <li><li><li><i class="fa fa-bed" aria-hidden="true"></i><?=
                    $model->recamaras ?></li>
                </ul>
                </div>
            </div>

        </div> 
</div>
