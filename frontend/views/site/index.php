<?php

/* @var $this yii\web\View */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use kartik\money\MaskMoney;
use backend\models\Colonias;
use backend\models\Operacion;
use backend\models\Tipos;
use yii\helpers\ArrayHelper;



$this->title = 'Inmobiliaria Valladolid';

?>

<div class="large-10 medium-10 small-10 large-offset-1 medium-offset-1 small-offset-1">
    <div class="input-group input-group-rounded">
        <?php
          $f = ActiveForm::begin([
              "method"=>"get",
              "action" =>Url::toRoute("site/index"),
              "enableClientValidation" => true,
          ]);
        ?>
        <div class="input-group-button">
            <?= $f ->field($form,"q")->input("search",['placeholder'=>'Buscar', 'class'=>'input-group-field']); ?>        
        </div>

        <div class="input-group-button">
            <?= Html::submitButton("&#xf002",["class"=> "button secondary"]) ?>
        </div>
            <?php $f->end() ?>
    </div>
 
</div>

<div class="row">
        <div class="large-4 medium-10 small-12 columns large-offset-1">
            <div class="translucent-form-overlay">
                <?php
          $f2 = ActiveForm::begin([
              "method"=>"get",
              "action" =>Url::toRoute("site/index"),
              "enableClientValidation" => true,
          ]);
          
          $colonias = Colonias::find()->all();
$listData1 = ArrayHelper::map($colonias,'nombre_colonia','nombre_colonia');

$operacion = Operacion::find()->all();
$listData2 = ArrayHelper::map($operacion,'nombre_operacion', 'nombre_operacion');
$tipos = Tipos::find()->all();
$listData3 = ArrayHelper::map($tipos, 'nombre_tipo', 'nombre_tipo');
        ?>
                    <h3>Buscador Avanzado</h3>
                     
                    <div class="row columns">
<!--                      <label>Tipo de Transacción-->
<!--                        <select name="status" type="text">
                          <option>Escoje una Opción</option>
                          <option value="rent">Renta</option>
                          <option value="buy">Venta</option>
                        </select>-->
                        <?= $f2->field($form1, "f")->dropDownList($listData1,['prompt'=>'Elegir colonia...']); ?>
                      <!--</label>-->
                    </div>
                    <div class="row columns">
<!--                      <label>Tipo de Propiedad
                        <select name="status" type="text">
                          <option>Escoje una Opción</option>
                          <option value="office">Terreno</option>
                          <option value="building">Departamento</option>
                        </select>
                      </label>-->
                         <?= $f2->field($form1, "o")->dropDownList($listData2,['prompt'=>'Elegir tipo de propiedad...']) ?>

                    </div>
                    <div class="row columns">
                      <?= $f2->field($form1, "t")->dropDownList($listData3,['prompt'=>'Elegir tipo de transacción...']) ?>
                    </div>
                    <div class="row">
<!--                      <label class="columns small-12">Pr</label>-->
                      <div class="columns small-6">
<!--                        <input type="number" min="0" name="min" placeholder="Min">-->
                          <?= $f2->field($form1, "precioMin")->input("number",['placeholder'=>'Precio Min','min'=> 0]) ?>
                      </div>
                      <div class="columns small-6">
                          <?= $f2->field($form1, "precioMax")->input("number",['placeholder'=>'Precio Max']) ?>
                      </div>
                    </div>
                    
                       <?= Html::submitButton("Buscar",["class"=> "primary button expanded search-button"]) ?>
<!--                    <button type="button" class="primary button expanded search-button">
                      Search
                    </button>-->
                 
                    
                     <?php $f2->end() ?>
            </div>
        </div>



    <div class="column large-7 small-12" id="container-orbit">
        <div class="news-image-gallery-container">
          <div class="row">
            <div class="small-12 medium-12 large-12 columns">
              <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
                <ul class="orbit-container">
                  <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                  <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                  <li class="is-active orbit-slide">
                    <img class="orbit-image" src="https://images.homify.com/images/a_0,c_fill,f_auto,h_720,q_auto,w_1920/v1440055803/p/photo/image/833389/Bad_Vilbel_Au%C3%9Fenansicht_S%C3%BCd/fotos-de-casas-de-estilo-moderno-de-die-hausmanufaktur-gmbh.jpg" alt="Space">
                    <figcaption class="orbit-caption">Space, the final frontier.</figcaption>
                  </li>
                  <li class="orbit-slide">
                    <img class="orbit-image" src="https://vida-spyqpdxrgyld6rrkjib.netdna-ssl.com/wp-content/uploads/2015/03/JP-Torre-A-02.jpg" alt="Space">
                    <figcaption class="orbit-caption">Lets Rocket!</figcaption>
                  </li>
                  <li class="orbit-slide">
                    <img class="orbit-image" src="https://i.ytimg.com/vi/PYfbgddsAiY/maxresdefault.jpg" alt="Space">
                    <figcaption class="orbit-caption">Encapsulating</figcaption>
                  </li>
                  <li class="orbit-slide">
                    <img class="orbit-image" src="http://s3.amazonaws.com/assets.moveglobally.com/property_images/400620/6976230/EB-AN0620.jpg?1484193744" alt="Space">
                    <figcaption class="orbit-caption">Outta This World</figcaption>
                  </li>
                </ul>
                
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="row" id="separador-cards">
<?php foreach ($publi as $pub): ?>

        <div class="large-3 large-offset-1 column">
            <div class="card card-product">
              <div class="card-product-img-wrapper">
                <?= Html::a('Mas Información', ['detalle', 'id' => $pub->idpublicacion], ['class' => 'button expanded']); ?>
                <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$pub->url_imagen,[
                                'alt'=>$pub->titulo,
                                'class'=> 'imagenes-250'
                            ])?>
              </div>
              <div class="card-section">
                <a href="#"><h3 class="card-product-name"><?= Html::a(Html::encode($pub->titulo), ['detalle', 'id' => $pub->idpublicacion]) ?></h3></a>
                <h5 class="card-product-price">$ <?=Html::encode($pub->precio)?></h5>
                <p class="card-product-description"><?=Html::encode($pub->Descripcion)?></p>
              </div>
            </div>
        </div>

    <?php endforeach; ?>
    </div>
    <?= yii\widgets\LinkPager::widget(['pagination'=>$pages]) ?>

</div>


