<?php

/* @var $this yii\web\View */


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use kartik\money\MaskMoney;
//use yii\bootstrap\Html;
$this->title = 'Inmobiliaria Valladolid';

?>
<div class="site-index">

    <div class="jumbotron">

    <?php
      $f = ActiveForm::begin([
          "method"=>"get",
          "action" =>Url::toRoute("site/index"),
          "enableClientValidation" => true,
      ]);
    ?>
        <div class="form-group">
     <?= $f ->field($form,"q")->input("search") ?>
            
                    </div>
      <?= Html::submitButton("Buscar",["class"=> "btn btn-primary"]) ?>
      
   <?php $f->end() ?>
        
        
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3" >
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                      <?php  foreach ($publi as $pub): ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <?= Html::img(Yii::$app->urlManagerBackend->baseUrl."/".$pub->url_imagen,[
                                'alt'=>$pub->titulo,
                                'class'=> 'img-responsive'
                            ]) ?>
                                    
                            <div class="caption">
                                
                                <h4>
                                    <?= Html::a(Html::encode($pub->titulo), ['detalle', 'id' => $pub->idpublicacion]) 
                              ?>
                                
                                </h4>
                                <h4 class="pull-right"><?= Html::encode('MXN '.Yii::$app->formatter->asCurrency($pub->precio)) ?></h4>
                                <p><?= Html::encode($pub->Descripcion) ?> </p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"> <?= Html::encode($pub->fecha_de_publicacion) ?></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?= yii\widgets\LinkPager::widget(['pagination'=>$pages]) ?>
<!--                    
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$64.99</h4>
                                <h4><a href="#">Second Product</a>     
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$74.99</h4>
                                <h4><a href="#">Third Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">31 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$84.99</h4>
                                <h4><a href="#">Fourth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">6 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$94.99</h4>
                                <h4><a href="#">Fifth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>-->

                </div>

            </div>
        </div>
    </div>

      
</div>







<div class="col-md-3 column margintop20">
            <ul class="nav nav-pills nav-stacked">
  <li class="active"><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Home</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 1</a></li>
  <li><a href="#" class="active2"><span class="glyphicon glyphicon-chevron-right"></span> Option 2 (active)</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 3</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 4</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 5</a></li>
</ul>
</div>

<div class="panel-group" id="accordion">
    <div class="panel panel-default panel-danger">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="http://nstp.org/member/login_success.php">                    
                    <h4><i class="fa fa-users"></i> Member Section </h4>
                </a>
            </h4>
        </div>                
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title text-primary">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b class="caret"></b> Contact Information </a>
                
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <tr>
                        <td>
                            <span class="fa fa-key"></span><a href="/Account/ChangePassword"> Password Management</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="fa fa-globe "></span><a href="//nstp.org/forms/contact_wufoo.php"> Contact Information Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="fa fa-user "></span><a href="/whyjoin.php"> Membership Renewal</a>                                       
                        </td>
                    </tr>                          
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title text-primary">
            <a href="//nstp.org/Account/Rewards"><span class="fa fa-money"></span> Dividend Rewards</a>
            </h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title text-primary">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><b class="caret"></b> Newsletters </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">                                                  
                <table class="table table-hover table-striped">
                    <tr>
                        <td>
                            <span class="fa fa-flash "></span><a href="/member/tax_alert.php"> Federal Tax Alert</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="fa fa-file-text-o "></span><a href="/member/client_newsletters.php"> Client Newsletter</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title text-primary">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><b class="caret"></b> Resources </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <tr>
                        <td>
                            <span class="fa fa-bell-o"></span><a href="//nstp.org/member/charitable_resources.php"> Charitable Contributions</a>
                        </td>               
                     </tr>
                     <tr>
                        <td>
                            <span class="fa fa-trophy"></span><a href="http://nstp.org/member/award.php"> Awards</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="fa fa-info-circle"></span><a href="//nstp.org/irs_tax_forum.php"> IRS Forums</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="fa fa-bookmark-o"></span><a href="/member/client_contracts.php"> Sample Client Contracts</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="fa fa-flag"></span><a href="http://nstp.org/member/state_resources.php"> State Tax Links</a>
                        </td>
                    </tr>
                      <tr>
                        <td>
                            <span class="fa fa-certificate "></span><a href="http://nstp.org/member/enrolled_agent_exam.php"> Enrolled Agent Information</a>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <span class="fa fa-rocket "></span><a href="http://nstp.org/member/resources.php"> NSTP Resources</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="fa fa-cloud-download "></span><a href="http://nstp.org/member/media_kit.php"> NSTP Media Kit</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="/member/hotline.php"><span class="fa fa-phone"></span> Tax Hotline</a>
            </h4>
        </div>
    </div>
</div>

