<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Acerca */

$this->title = 'Actualizar: ';

?>
<div class="acerca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
