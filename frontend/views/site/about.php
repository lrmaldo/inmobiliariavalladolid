<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$arrayDe100Valores = array();
for($i = 0; $i < 100; $i++) {
    $arrayDe100Valores[] = $i;
}
print_r($arrayDe100Valores);
