<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PublicacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpublicacion') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'url_imagen') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'fecha_de_publicacion') ?>

    <?php // echo $form->field($model, 'Zona') ?>

    <?php // echo $form->field($model, 'Operacion') ?>

    <?php // echo $form->field($model, 'Tipo') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
