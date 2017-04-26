<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */

$this->title = 'Crear Publicación';
$this->params['breadcrumbs'][] = ['label' => 'Publicacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    
    
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
