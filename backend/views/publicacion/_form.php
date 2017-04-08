<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\money\MaskMoney;

$date = new \DateTime('now', new \DateTimeZone('UTC'));

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicacion-form">
    
     
     
   
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_imagen')->fileInput([ 'accept' => 'image/*'])->label("Subir imagen de la publicación") ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

   
    <?= $form->field($model, 'precio')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        'prefix' => '$ ',
        //'suffix' => ' €',
        'allowNegative' => false
    ]
]);?>

    <?= $form->field($model, 'fecha_de_publicacion')->textInput()->textInput(['readonly'=>true,'value'=>$date->
            format('Y-m-d')])->label('Fecha de Alta') ?>

    <?= $form->field($model, 'Zona')->dropDownList([ 'Candelaria' => 'Candelaria', 'Fernado Novelo' => 'Fernado Novelo', 'Flor Campestre' => 'Flor Campestre', 'Jardines de Oriente' => 'Jardines de Oriente', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Operacion')->dropDownList([ 'Venta' => 'Venta', 'Renta' => 'Renta', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Tipo')->dropDownList([ 'Casa' => 'Casa', 'Terreno' => 'Terreno', 'Departamento' => 'Departamento', ], ['prompt' => '']) ?>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
