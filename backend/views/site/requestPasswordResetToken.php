<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>Inmobiliaria</b> Valladolid</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Restablecer contraseña</p>
         <p>Por favor llene su correo electrónico. Y un enlace será enviada allí para restablecer la contraseña .</p>
       <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->input(['email','placeholder' => $model->getAttributeLabel('Email')]) ?>

       

        <div class="row">
           
            <!-- /.col -->
            <div class="col-xs-4">
               <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
        
<!--
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div>
-->
<!-- /.social-auth-links -->

      

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->





 