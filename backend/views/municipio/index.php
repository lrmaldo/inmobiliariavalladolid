<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MunicipioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Municipios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Municipio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id_municipio',
            'nombre_municipio',
             ['attribute'=>'Estado',
                    'format'=>'html',
                    'value'=>function ($model) {
                      $con = Yii::$app->db->createCommand("SELECT nombre_estado FROM estado WHERE id_estado ='".($model->id_estado)."'")->queryScalar();
            
            return   $con;
        }
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
