<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\FontAsset;
use common\widgets\Alert;
AppAsset::register($this);
FontAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<header class="subnav-hero-section">
    <h1 class="subnav-hero-headline">
       Inmobiliaria Valladolid
    </h1>
    <ul class="subnav-hero-subnav button-group">
        <li>
            <?= Html::a('Inicio', ['/site/index'], ['class' => 'active']); ?>
        </li>
        <li>
            <?= Html::a('Acerca', ['/site/about'],['class' => '']); ?>
        </li>
        <li>
            <?= Html::a('Contacto', ['/site/contact'],['class' => '']); ?>
        </li>
        <?php 
            if (Yii::$app->user->isGuest) {
                ?><li><?= Html::a('Signup', ['/site/signup']); ?></li>
                  <li><?= Html::a('Login', ['/site/login']); ?></li>
            <?php
            } else {
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
            }
        ?>
    </ul>
</header>


<div class="row" id="content">            
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>