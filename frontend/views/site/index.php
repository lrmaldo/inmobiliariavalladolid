<?php

/* @var $this yii\web\View */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use kartik\money\MaskMoney;
use backend\models\Colonias;
use backend\models\Estado;
use backend\models\Operacion;
use backend\models\Tipos;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;



$this->title = 'Inmobiliaria Valladolid';


$contador = Yii::$app->db->createCommand("SELECT contador from visitantes")->queryScalar();
$acumulador = ($contador+1);

$sql = Yii::$app->db->createCommand("UPDATE `visitantes` SET `contador`=".($acumulador)." WHERE 1");
$sql->execute();
?>
<div class="box">
<section>
<div class="large-10 medium-10 small-10 large-offset-1 medium-offset-1 small-offset-1">
  <?php
      $f = ActiveForm::begin([
        "method"=>"get",
        "action" =>Url::toRoute("site/index"),
        "enableClientValidation" => true,]);
    ?>
  <div class="input-group input-group-rounded large-10">
    <?= $f->field($form,"q")->input("search",['placeholder'=>'Buscar', 'class'=>'input-group-field']);?>
    <div class="input-group-button">
      <?= Html::submitButton("&#xf002",["class"=> "button secondary"]) ?>
    </div>
  </div>
  <?php $f->end() ?>
</div>


<div class="row column">

  <div class="large-4 medium-10 small-12 columns large-offset-1">
    <div class="translucent-form-overlay">
      <?php
        $f2 = ActiveForm::begin([
          "method"=>"get",
          "action" =>Url::toRoute("site/index"),
          "enableClientValidation" => true,
        ]);

        $estados = Estado::find()->all();
        $listData1 = ArrayHelper::map($estados, 'id_estado', 'nombre_estado');
        $operacion = Operacion::find()->all();
        $listData2 = ArrayHelper::map($operacion, 'nombre_operacion', 'nombre_operacion');
        $tipos = Tipos::find()->all();
        $listData3 = ArrayHelper::map($tipos, 'nombre_tipo', 'nombre_tipo');
      ?>
      <h3>Buscador Avanzado</h3>      
      <div class="row columns">
        <?= $f2->field($form1, "e")->dropDownList($listData1,['id'=>'id_estado','prompt'=>'Elegir Estado...']); ?>
      </div>
      <div class="row columns">
        <?= $f2->field($form1, 'm')->widget(DepDrop::classname(), [
          'options' => ['id' => 'id_municipio'],
          'pluginOptions' => [
          'depends' => ['id_estado'],
          'placeholder' => 'Selecionar...',
          'url' => Url::to(['/site/municipio'])
          ]
        ])?>
      </div>
      <div id="colonia" class="row colummns">                  
        <?= $f2->field($form1, 'c')->widget(DepDrop::classname(), [
          'options' => ['id' => 'id_colonia'],
          'pluginOptions' => [
          'depends' => ['id_municipio'],
          'placeholder' => 'Selecionar...',
          'url' => Url::to(['/site/colonia'])]])
        ?>              
      </div>
      <div class="row columns">
        <?= $f2->field($form1, "o")->dropDownList($listData2,['prompt'=>'Elegir tipo de propiedad...'])?>
      </div>
      <div class="row columns">
        <?= $f2->field($form1, "t")->dropDownList($listData3,['prompt'=>'Elegir tipo de transacción...']) ?>
      </div>
      <div class="row">
        <div class="columns small-6">
          <?= $f2->field($form1, "precioMin")->input("number",['placeholder'=>'Precio Min','min'=> 0]) ?>
        </div>
        <div class="columns small-6">
          <?= $f2->field($form1, "precioMax")->input("number",['placeholder'=>'Precio Max','min'=>0]) ?>
        </div>
      </div>
      <?= Html::submitButton("Buscar",["class"=> "primary button expanded search-button"]) ?>
      <?php $f2->end() ?>
    </div>
  </div>

  <div class="column large-7" id="container-orbit">
    <div class="news-image-gallery-container">
      <div class="row">
        <div class="small-12 medium-12 large-12 columns">
          <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
            <ul class="orbit-container">
              <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
              <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
             
               <?php foreach ($destacado as $dest): ?>
              
              <li class="is-active orbit-slide">
                  <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$dest->url_imagen,['alt'=>$dest->titulo,'class'=> 'orbit-image'])?>
<!--                <img class="orbit-image" src="https://images.homify.com/images/a_0,c_fill,f_auto,h_720,q_auto,w_1920/v1440055803/p/photo/image/833389/Bad_Vilbel_Au%C3%9Fenansicht_S%C3%BCd/fotos-de-casas-de-estilo-moderno-de-die-hausmanufaktur-gmbh.jpg" alt="Space">-->
              <figcaption class="orbit-caption"><?= Html::a(Html::encode($dest->titulo), ['detalle', 'id' => $dest->idpublicacion]); ?></figcaption>
              </li>
              <?php endforeach; ?>
<!--              <li class="orbit-slide">
                <img class="orbit-image" src="http://localhost/inmobiliaria/backend/web/imagenes/iyAqn55-1-1.jpg" alt="Space">
                <figcaption class="orbit-caption">Lets Rocket!</figcaption>
              </li>
              <li class="orbit-slide">
                <img class="orbit-image" src="https://i.ytimg.com/vi/PYfbgddsAiY/maxresdefault.jpg" alt="Space">
                  <figcaption class="orbit-caption">Encapsulating</figcaption>
              </li>
              <li class="orbit-slide">
                <img class="orbit-image" src="http://s3.amazonaws.com/assets.moveglobally.com/property_images/400620/6976230/EB-AN0620.jpg?1484193744" alt="Space">
                <figcaption class="orbit-caption">Outta This World</figcaption>
              </li>-->
                <li class="orbit-slide">
                <img class="orbit-image" src="https://i.ytimg.com/vi/PYfbgddsAiY/maxresdefault.jpg" alt="Space">
                <figcaption class="orbit-caption">Destacados!!</figcaption>
              </li>-->
            </ul>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
//echo yii\bootstrap\Carousel::widget([
//      'items' => [
////          ['content'=>  Html::img('001.jpeg')],
////          ['content'=>  Html::img('images/slideshow/002.jpeg')],
////          ['content'=>  Html::img('images/slideshow/003.jpeg')],
//        ['content' => Html::img('http://52.179.21.10/backend/web/imagenes/1.jpg'),
//        ],
//        ['content' => Html::img('http://52.179.21.10/backend/web/imagenes/3.jpg'),
//            
//        ],
//    ],
//    'options' => [
//       'class' => 'slide', 'style' => 'width: 450px;']
//    ,
//]);
?>


<div class="row column" id="separador-cards">  
  <?php foreach ($publi as $pub): ?>
  <div class="large-3 medium-5 large-offset-1 medium-offset-1 column">
    <div class="card card-product">
      <div class="card-product-img-wrapper">
        <?= Html::a('Mas Información', ['detalle', 'id' => $pub->idpublicacion], ['class' => 'button expanded']); ?>
        <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$pub->url_imagen,['alt'=>$pub->titulo,'class'=> 'imagenes-250'])?>
      </div>
      <div class="card-section">
        <h3 class="card-product-name text-center"><?= Html::a(Html::encode($pub->titulo), ['detalle', 'id' => $pub->idpublicacion]) ?></h3>
        <p class="card-product-description">
        <h5 class="card-product-price" style="margin-bottom: 0"><i class=" fa fa-money "></i>&nbsp;
          <?=Yii::$app->formatter->asCurrency($pub->precio,'MXN')?>    
        </h5>
        
          <ul class="fa-ul">
            <li><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;
              <?=
                $consultaE = Yii::$app->db->createCommand("SELECT nombre_estado FROM estado WHERE id_estado ='".($pub->Estado )."'")->queryScalar();       
              ?>
            </li>
            <li><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;
              <?=        
                $consultaM = Yii::$app->db->createCommand("SELECT nombre_municipio FROM municipio WHERE id_municipio ='".($pub->Municipio)."'")->queryScalar();  
              ?>
            </li>
            <li><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;
              <?=        
                $consultaC = Yii::$app->db->createCommand("SELECT nombre_colonia FROM colonias WHERE id_colonia ='".($pub->Colonia)."'")->queryScalar();         
              ?>
            </li>
            <li><i class="fa fa-home" aria-hidden="true"></i>&nbsp;
              <?=$pub->Tipo ?>
            </li>
            <li><i class="fa fa-legal" aria-hidden="true"></i>&nbsp;
              <?=$pub->Operacion ?>
            </li>
            <li><i class="fa fa-bath" aria-hidden="true"></i>&nbsp;
              <?=$pub->num_banio?>
            </li>
            <li><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;
              <?=$pub->recamaras ?>
            </li>
          </ul>
        </p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?= yii\widgets\LinkPager::widget(['pagination'=>$pages]) ?>
</section>
</div>


    <div class="box2">
    <aside>
     <div class="button expanded">Publicidad</div>
     <?php foreach ($publicidad as $p): ?>
        <div class="publi">
           
            <div class="titulo-publi"><?=$p->titulo ?></div>
             <?php if (empty($p->url_imagen_publicidad)){ }else { ?>
              
             <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$p->url_imagen_publicidad,['alt'=>"imagen",'class'=> 'imagenes-publicidad'])?>
             <?php }?>
            <p></p>
            <?= Html::a('Mas Información', $p->url_publicidad, ['class' => 'button expanded']); ?>
        </div>
        <?php endforeach; ?>
        
    
    </aside>
    </div>