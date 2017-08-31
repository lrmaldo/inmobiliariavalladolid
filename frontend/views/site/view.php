<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Imagenes;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */
$this->title = $model->titulo;

?>
<style type="text/css">
    @media print{
        
    }
    
</style>
<script type="text/javascript">
function printlayer(layer){
    var generador = window.open(",'name,");
    var layetext =  document.getElementById(layer);
    generador.document.write(layetext.innerHTML.replace("Imprimir"));
    generador.document.close();
    generador.print();
    generador.close();
}

</script>
<a href="#" id="print" onclick="javascript:printlayer('div-id-name')" >Imprimir</a>
<div class="simple-article-header" id="div-id-name">
  <p class="article-date-read large-offset-5">Publicado el: <?=$model->fecha_de_publicacion?>  </p>
  <h1 class="page-header" style="text-align: center;">
    <?= $this->title ?>
  </h1>
  <div class="article-post-image large-offset-2">
    <div class="thumbnail">
      <?=     Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$model->url_imagen,['alt'=>$model->titulo,'class'=>'img-responsive','style'=>'width:750px; height:500px; margin:0 auto;']); ?>
    </div>
  </div>


  <div style="text-align: center;" class="large-10 large-offset-1">
<!--      <a href='javascript:window.print(); void 0;'>Imprimir</a> -->
    <div class="large-10 large-offset-1 column">
      <h3>Detalles</h3>
      <ul class="pricing-table">
        <li class="title"><i class="fa fa-money"></i>&nbsp Precio</li>
        <li class="price"><?=Yii::$app->formatter->asCurrency($model->precio, 'MXN')?> </li>
        <li class="title"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp Estado</li>
        <li>
          <?= $consultaE = Yii::$app->db->createCommand("SELECT nombre_estado FROM estado WHERE id_estado ='".($model->Estado )."'")->queryScalar(); ?>
        </li>
        <li class="title"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp Municipio</li>
        <li>
          <?= $consultaM = Yii::$app->db->createCommand("SELECT nombre_municipio FROM municipio WHERE id_municipio ='".($model->Municipio)."'")->queryScalar(); ?>
        </li>
        <li class="title"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp Colonia</li>
        <li>
          <?= $consultaC = Yii::$app->db->createCommand("SELECT nombre_colonia FROM colonias WHERE id_colonia ='".($model->Colonia)."'")->queryScalar(); ?>
        </li>
        <li class="title"><i class="fa fa-home" aria-hidden="true"></i>&nbsp Tipo</li>
        <li> <?= $model->Tipo ?></li>
        <li class="title"><i class="fa fa-legal" aria-hidden="true"></i>&nbsp Operación</li>
        <li> <?= $model->Operacion ?> </li>
        <li class="title"><i class="fa fa-bath" aria-hidden="true"></i>&nbsp Número de Baños</li>
        <li><?= $model->num_banio ?></li>
        <li class="title"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp Número de Recámaras</li>
        <li><?= $model->recamaras ?></li>
      </ul>
    </div>
  </div>

  <div style="text-align: center;" class="large-10 large-offset-1">
    <div class="large-10 large-offset-1 column">
      <div class="article-post-content">
        <h3>Descripción General</h3>
        <p style="text-align: justify"><?=$model->Descripcion?></p>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="small-11 large-centered columns">
      <div class="featured-image-block-grid">
        <div class="featured-image-block-grid-header small-12 medium-12 large-12 columns text-center">
          <h2 >Mas Imágenes</h2>
        </div>
        <div class="row large-up-4 small-up-1" id="more">
          <?php  foreach ($publ as $img): ?> 
            <div class="featured-image-block column">
              <a href= <?= Yii::$app->urlManagerBackend->baseUrl."/".$img->url_imagen;?> class="fresco" data-fresco-group="image_data">
                <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$img->url_imagen,['alt'=>$img->url_imagen,'class'=>'img-responsive','id'=>'img-view-list']);?>  
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <div>
    <?= yii\widgets\LinkPager::widget(['pagination'=>$pag]) ?>
  </div>
</div>