<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Acerca';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="footer-contact">
  <div class="row" id="row-contact">
    <div class="small-12 column text-center">
      <span class="homepage-section-subtitle-divider lighter small-centered hide-me"></span>
      <h1 class="homepage-section-title hide-me">Acerca de Nosotros</h1>
    </div>
    <div class="small-11 medium-10 large-10 large-offset-1 text-center small-centered">
      <p class="homepage-section-desc hide-me"> <?=$model->texto ?></p>
    </div>

</section>