<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Imagenes;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */
$this->title = $model->titulo;

?>

<div class="simple-article-header">
  <!-- Article Published Date & Reading Time -->
  <p class="article-date-read large-offset-5">Publicado el: <?=$model->fecha_de_publicacion?></p>
  
  <!-- Article Title -->
<h1 class="page-header" style="text-align: center;">
    <?= $this->title ?>
</h1>
  <div class="article-post-image large-offset-2">
    <div class="thumbnail">
       <?=     Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$model->url_imagen,['alt'=>$model->titulo,'class'=>'img-responsive',
                'style'=>'width:750px; height:500px; margin:0 auto;']); ?>
    </div>
  </div>

  <!-- Article Post Content -->
    <div class="large-offset-1">
        <div class="large-5 large-offset-1 column">
            <div class="article-post-content">
                <h3>Descripción General</h3>
                <p style="text-align: justify"><?=$model->Descripcion?></p>
            </div>
        </div>
        <div class="large-5 large-offset-1 column">
            <h4>Detalles</h4>         
                <ul class="fa-ul">
                    <li><i class=" fa fa-money "></i>&nbsp
                     <?=Yii::$app->formatter->asCurrency($model->precio, 'MXN')
                    ?>    
                    </li>
                    <li><i class="fa fa-globe" aria-hidden="true"></i>&nbsp
                    <?=
                    
                         $consultaE = Yii::$app->db->createCommand("SELECT nombre_estado FROM estado WHERE id_estado ='".($model->Estado )."'")->queryScalar();
                       
                ?></li>
                    <li><i class="fa fa-globe" aria-hidden="true"></i>&nbsp
                    <?=
                    
                     $consultaM = Yii::$app->db->createCommand("SELECT nombre_municipio FROM municipio WHERE id_municipio ='".($model->Municipio)."'")->queryScalar();           
                                ?></li>
                    <li><i class="fa fa-globe" aria-hidden="true"></i>&nbsp
                    <?=
                    
                            $consultaC = Yii::$app->db->createCommand("SELECT nombre_colonia FROM colonias WHERE id_colonia ='".($model->Colonia)."'")->queryScalar(); 
                                ?></li>
                    <li><i class="fa fa-home" aria-hidden="true"></i>&nbsp
                    <?=
                    $model->Tipo ?></li>
                    <li><i class="fa fa-legal" aria-hidden="true"></i>&nbsp
                    <?=
                    $model->Operacion ?></li>
                    <li><i class="fa fa-bath" aria-hidden="true"></i>&nbsp
                    <?=
                    $model->num_banio?></li>
                    <li><i class="fa fa-bed" aria-hidden="true"></i>&nbsp
                    <?=
                    $model->recamaras ?></li>
                </ul>
        </div>
    </div>

<div class="row">
<div class="small-11 large-centered columns">
    <div class="featured-image-block-grid">
      <div class="featured-image-block-grid-header small-12 medium-12 large-12 columns text-center">
        <h2>Mas Imágenes</h2>
      </div>
      <div class="row large-up-4 small-up-1">
      <?php  foreach ($publ as $img): ?> 
        <div class="featured-image-block column">
            <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$img->url_imagen,['alt'=>$img->url_imagen,'class'=>'img-responsive','id'=>'img-view-list']);?>   
        </div>
        <?php endforeach; ?>
         <?= yii\widgets\LinkPager::widget(['pagination'=>$pag]) ?>
      </div>
    </div>
</div>
</div>
</div>