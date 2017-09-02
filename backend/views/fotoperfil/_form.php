<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Fotoperfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotoperfil-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'url')->fileInput([ 'accept' => 'image/*'])->label("Subir imagen de perfil") ?>
    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
