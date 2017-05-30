<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    
<body>
    <?php $this->beginBody() ?>
    <header     height="40%" >
    <h1  text-align="center" 
    background ="#1779ba"
    background-size="cover"
    position ="relative"
    overflow = "visible"
    display="-webkit-flex"
    display="-ms-flexbox"
    display="flex"
    webkit-align-items="center"
    ms-flex-align="center"
    
   
    
    justify-content="center"
    height="300px">
       Inmobiliaria Valladolid
    </h1>
        </header>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
