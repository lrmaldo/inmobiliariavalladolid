<?php

/* @var $this yii\web\View */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
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
                  <label class="columns small-12">Price</label>
                  <div class="columns small-6">
                    <input type="number" min="0" name="min" placeholder="Min">
                  </div>
                  <div class="columns small-6">
                    <input type="number" min="0" name="max" placeholder="Max">
                  </div>
                </div>
                <button type="button" class="primary button expanded search-button">
                  Search
                </button>
             </form>
        </div>
    </div>
</div>


