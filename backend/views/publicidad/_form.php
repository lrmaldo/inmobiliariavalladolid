<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true])->label("Titulo de la publidad") ?>

    <?= $form->field($model, 'url_publicidad')->textarea(['rows' => 1]) ?>

    
    <?= $form->field($model, 'url_imagen_publicidad')->fileInput([ 'accept' => 'image/*'])->label("Subir imagen de publicidad") ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
