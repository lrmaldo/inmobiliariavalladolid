<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Acerca */

$this->title = 'Create Acerca';
$this->params['breadcrumbs'][] = ['label' => 'Acercas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acerca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
