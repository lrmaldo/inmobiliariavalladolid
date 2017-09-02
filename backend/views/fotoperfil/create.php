<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fotoperfil */

$this->title = 'Create Fotoperfil';
$this->params['breadcrumbs'][] = ['label' => 'Fotoperfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotoperfil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
