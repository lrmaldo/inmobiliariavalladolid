<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Acerca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acerca-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model,'fb')->textInput(['maxlength'=>true]) ?>

    <?= $form->field($model,'tw')->textInput(['maxlength'=>true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
