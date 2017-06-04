<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Municipio;
/* @var $this yii\web\View */
/* @var $model backend\models\Colonias */
/* @var $form yii\widgets\ActiveForm */
$municipios = Municipio::find()->all();
$listmunicipios = ArrayHelper::map($municipios, "id_municipio", "nombre_municipio")
?>

<div class="colonias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_municipio')->dropDownList($listmunicipios,['prompt'=>'Elegir Municipio...']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
