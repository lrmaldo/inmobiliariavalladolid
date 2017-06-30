<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\FontAsset;
use common\widgets\Alert;
$bundle=AppAsset::register($this);
$bundle2=FontAsset::register($this);

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
//            if (Yii::$app->user->isGuest) {
                ?><li><?php
//        Html::a('Signup', ['/site/signup']); 
                ?></li>
                  <li><?php 
//                Html::a('Login', ['/site/login']); 
                ?></li>
            <?php
//            } else {
//                $menuItems[] = '<li>'
//                    . Html::beginForm(['/site/logout'], 'post')
//                    . Html::submitButton(
//                        'Logout (' . Yii::$app->user->identity->username . ')',
//                        ['class' => 'btn btn-link logout']
//                    )
//                    . Html::endForm()
//                    . '</li>';
//            }
        ?>
    </ul>
</header>


<div class="row" id="content">            
    <?= $content ?>
</div>

<footer class="marketing-site-footer">
  <div class="row medium-unstack">
    <div class="medium-4 columns">
      <h4 class="marketing-site-footer-name">Inmobiliaria Valladolid</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita dolorem accusantium architecto id quidem, itaque nesciunt quam ducimus atque.</p>
      <ul class="menu marketing-site-footer-menu-social simple">
        <li><a href="#"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
         <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
         <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
      </ul>
    </div>
    <div class="medium-4 columns">
       <h4 class="marketing-site-footer-title">Información de Contacto</h4>
      <div class="marketing-site-footer-block">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <p>Calle 48 # entre 45 y 43 Sisal<br>Valladolid, Yucatán 97780</p>
      </div>
      <div class="marketing-site-footer-block">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <p id="tel"><a href="tel:+529851018671">9851018671</a></p>
      </div>
      <div class="marketing-site-footer-block">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
        <p id="mail"><a href="email:ederglez7@hotmail.com">ederglez7@hotmail.com</a></p>
      </div>
    </div>
    <div class="medium-4 columns">
      <h4 class="marketing-site-footer-title">Ubicación</h4>
      <div class="row small-up-3">
         <?= Html::img($bundle->baseImg."/mapimage.jpg");?> 
      </div>
    </div>
    <div class="column">
        <p>&copy; My Company <?= date('Y')?></p>
        
    </div>   
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>