<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Colonias */

$this->title = Yii::t('app', 'Create Colonias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colonias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
