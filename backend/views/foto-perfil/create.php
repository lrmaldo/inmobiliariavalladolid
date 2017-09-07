<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FotoPerfil */

$this->title = 'Create Foto Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Foto Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-perfil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
