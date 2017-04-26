<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */

$this->title = 'Actualizar Publicacion: ' . $model->idpublicacion;
$this->params['breadcrumbs'][] = ['label' => 'Publicacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpublicacion, 'url' => ['view', 'id' => $model->idpublicacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publicacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
