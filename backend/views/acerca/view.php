<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Acerca */

$this->title = 'Acerca';

?>
<div class="acerca-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_acerca], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id_acerca',
            'texto:ntext',
            'direccion',
            'telefono',
            'correo',
        ],
    ]) ?>

</div>
