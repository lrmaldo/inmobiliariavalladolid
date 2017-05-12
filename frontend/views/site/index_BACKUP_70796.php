<?php

/* @var $this yii\web\View */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
<<<<<<< HEAD
=======
use kartik\money\MaskMoney;
//use yii\bootstrap\Html;
>>>>>>> origin
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

    <div class="large-4 medium-10 small-12">
        <div class="translucent-form-overlay">
            <form>
                <h3>Buscador Avanzado</h3>
                <div class="row columns">
                  <label>Tipo de Transacción
                    <select name="status" type="text">
                      <option>Escoje una Opción</option>
                      <option value="rent">Renta</option>
                      <option value="buy">Venta</option>
                    </select>
                  </label>
                </div>
                <div class="row columns">
                  <label>Tipo de Propiedad
                    <select name="status" type="text">
                      <option>Escoje una Opción</option>
                      <option value="office">Terreno</option>
                      <option value="building">Departamento</option>
                    </select>
                  </label>
                </div>
                <div class="row columns">
                  <label>Location
                    <input type="text" name="location" placeholder="Any">
                  </label>
                </div>
                <div class="row">
<<<<<<< HEAD
                  <label class="columns small-12">Price</label>
                  <div class="columns small-6">
                    <input type="number" min="0" name="min" placeholder="Min">
                  </div>
                  <div class="columns small-6">
                    <input type="number" min="0" name="max" placeholder="Max">
                  </div>
=======
                      <?php  foreach ($publi as $pub): ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$pub->url_imagen,[
                                'alt'=>$pub->titulo,
                                'class'=> 'img-responsive'
                            ]) ?>
                                    
                            <div class="caption">
                                
                                <h4>
                                    <?= Html::a(Html::encode($pub->titulo), ['detalle', 'id' => $pub->idpublicacion]) 
                              ?>
                                
                                </h4>
                                <h4 class="pull-right"><?= Html::encode('MXN '.Yii::$app->formatter->asCurrency($pub->precio)) ?></h4>
                                <p><?= Html::encode($pub->Descripcion) ?> </p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"> <?= Html::encode($pub->fecha_de_publicacion) ?></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?= yii\widgets\LinkPager::widget(['pagination'=>$pages]) ?>
<!--                    
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$64.99</h4>
                                <h4><a href="#">Second Product</a>     
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$74.99</h4>
                                <h4><a href="#">Third Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">31 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$84.99</h4>
                                <h4><a href="#">Fourth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">6 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$94.99</h4>
                                <h4><a href="#">Fifth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>-->

>>>>>>> origin
                </div>
                <button type="button" class="primary button expanded search-button">
                  Search
                </button>
             </form>
        </div>
    </div>
</div>


