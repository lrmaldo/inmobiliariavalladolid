<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Terrenos */

$this->title = 'Create Terrenos';
$this->params['breadcrumbs'][] = ['label' => 'Terrenos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terrenos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
