<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Publicidad */

$this->title = 'Publicidad';
$this->params['breadcrumbs'][] = ['label' => 'Publicidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
