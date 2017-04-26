<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FotoPerfil */
/* @var $form ActiveForm */
?>
<div class="subir-foto">

    <?php echo $msg ?>
    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        
       
    <?= $form->field($model, 'url')->fileInput([ 'accept' => 'image/*'])->label("Subir imagen de perfil") ?>
    
        <div class="form-group">
            <?= Html::submitButton('Subir foto', ['class' => 'btn btn-primary']) ?>
        </div>
    
      <div class="com-md-6">
            <?=     Html::img('@web/'.$msg,['alt'=>$msg,'class'=>'img-responsive',
                'style'=>'width:400px; margin:0 auto;']); ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- subir-foto -->
