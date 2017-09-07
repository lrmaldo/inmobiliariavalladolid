<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FotoPerfil */

$this->title = 'Foto Perfil: ';
//$this->params['breadcrumbs'][] = ['label' => 'Foto Perfil', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_perfil, 'url' => ['view', 'id' => $model->id_perfil]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foto-perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
