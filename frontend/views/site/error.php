<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title ="Pagina no encontrada";
?>
<div class="full-width-testimonial">
  <div class="full-width-testimonial-section">
    <div class="full-width-testimonial-icon text-center">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="41px" height="34px" viewBox="-235 240 41 34" style="enable-background:new -235 240 41 34;" xml:space="preserve">
          <path class="quote-path" d="M-231.3,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4
            h8.1v12.8h-14.4V260.4z"/>
          <path class="quote-path" d="M-212,260.4c0-5,1.3-8.8,3.7-11.7c2.4-2.8,6-4.6,10.5-5.5v5c-3.5,1-6,2.8-7.1,5.5c-0.7,1.4-0.9,2.8-0.8,4h8.1
            v12.8H-212V260.4z"/>
      </svg>
    </div>
    <div class="full-width-testimonial-content">
      <h5 class="full-width-testimonial-text">Al parecer usted esta perdido, se esta perdiendo la oportunidad de comprar o rentar una casa, un cuarto o terreno, usted no debe estar aquí. <br>
      No se pierda la oportunidad
      </h5>
      <p class="full-width-testimonial-source"><?= Html::a('Regresa Aquí', ['/site/index'], ['id'=>'errorlink']); ?></p>
      <span class="full-width-testimonial-source-context">Inmobiliaria Valladolid</span>
    </div>
  </div>
</div>
