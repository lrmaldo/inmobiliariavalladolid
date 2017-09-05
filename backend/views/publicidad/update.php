<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicidad */

$this->title = 'Actualizar Publicidad: ' . $model->id_publicidad;
$this->params['breadcrumbs'][] = ['label' => 'Publicidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_publicidad, 'url' => ['view', 'id' => $model->id_publicidad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="publicidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
