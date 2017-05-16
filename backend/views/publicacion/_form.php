<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
$date = new \DateTime('now', new \DateTimeZone('UTC'));
//modelos de las base de datos
use backend\models\Colonias;
use backend\models\Operacion;
use backend\models\Tipos;


/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */

/* @var $form yii\widgets\ActiveForm */

$colonias = Colonias::find()->all();
$listData1 = ArrayHelper::map($colonias,'nombre_colonia','nombre_colonia');
  //$listData1 = CHtml::listData($colonias,'id_colonia','nombre_colonia');
$operacion = Operacion::find()->all();
$listData2 = ArrayHelper::map($operacion,'nombre_operacion', 'nombre_operacion');
$tipos = Tipos::find()->all();
$listData3 = ArrayHelper::map($tipos, 'nombre_tipo', 'nombre_tipo');
?>

<div class="publicacion-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'url_imagen[]')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*','multiple'=> true],
]); ?>

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

    <?= $form->field($model, 'Colonia')->dropDownList($listData1,['prompt'=>'Elegir colonia...']) ?>

    <?= $form->field($model, 'Operacion')->dropDownList($listData2, ['prompt' => 'Elegir Operación...']) ?>

    <?= $form->field($model, 'Tipo')->dropDownList($listData3, ['prompt' => 'Elegir Tipo...']) ?>

    <?= $form->field($model, 'num_banio')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', ], ['empty'=>'--Seleccionar--']) ?>

    <?= $form->field($model, 'recamaras')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', ], ['empty'=>'--Seleccionar--']) ?>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
