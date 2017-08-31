<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcercaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acerca';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acerca-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        Regrese al dashboard
    </p>
   
</div>
