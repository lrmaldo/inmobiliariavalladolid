<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Fotoperfil */

$this->title = 'Actualizar foto ';
//$this->params['breadcrumbs'][] = ['label' => 'Fotoperfils', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_perfil, 'url' => ['view', 'id' => $model->id_perfil]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fotoperfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
