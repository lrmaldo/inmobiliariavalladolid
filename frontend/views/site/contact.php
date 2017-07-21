<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
?>
<section class="footer-contact">
  <div class="row" id="row-contact">
    <div class="small-12 column text-center">
      <h5 class="homepage-section-subtitle lighter hide-me">Contáctanos</h5>
      <span class="homepage-section-subtitle-divider lighter small-centered hide-me"></span>
      <h1 class="homepage-section-title hide-me">Consulta Con Nosotros</h1>
    </div>
    <div class="small-11 medium-10 large-10 large-offset-1 text-center small-centered">
      <p class="homepage-section-desc hide-me">Si tienes preguntas relacionado con precios, ubicación o quieres saber más sobre el inmueble rellene el siguiente formulario para ponerse en contacto con nosotros. Gracias</p>
    </div>
    <div class="large-9 large-offset-1">
      <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
      <div class="form-icons">
        <div class="large-12 small-10 small-offset-1">
         <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="large-12 small-10 small-offset-1">
          <?= $form->field($model, 'email') ?>
        </div>
        <div class="large-12 small-10 small-offset-1">
         <?= $form->field($model, 'subject') ?>
        </div>
        <div class="large-12 small-10 small-offset-1">
         <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
        </div>
        <div class="large-12 small-10 small-offset-1">
         <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '
            <div class="row">
              <div class=column>
                <div class="large-4">{image}
                  <div class="large-8">{input}
                  </div>
                </div>
              </div>
            </div>',]) ?>
        </div>
      </div>
      <div class="large-5 large-offset-5">
        <?= Html::submitButton('Enviar Datos', ['class' => 'button expanded', 'name' => 'contact-button']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</section>