<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Terrenos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terrenos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Ubicacion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Propietario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Notas')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
