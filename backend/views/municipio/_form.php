<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Estado;
use yii\helpers\ArrayHelper;
$estado = Estado::find()->all(); 
$listEstado = ArrayHelper::map($estado, "id_estado", "nombre_estado"); 
/* @var $this yii\web\View */
/* @var $model backend\models\Municipio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="municipio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_municipio')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'id_estado')->dropDownList($listEstado,['prompt'=>'Elegir Estado...']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
