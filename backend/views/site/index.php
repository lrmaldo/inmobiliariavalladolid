<?php

/* @var $this yii\web\View */

$this->title = 'Inmobiliaria Valladolid';
?>
<div class="site-index">
    
    <div class="jumbotron">
        <h1>Bienvenido</h1>

       
        <div class="row">
            <div class="col-lg-4">
              <?php 
              echo yii\helpers\Url::to(Yii::getAlias("@frontend")."/web/");
                $consulta = Yii::$app->db->createCommand('SELECT COUNT(*) FROM publicacion')->queryScalar();
              echo \insolita\wgadminlte\LteInfoBox::widget([
                      'bgIconColor'=>\insolita\wgadminlte\LteConst::COLOR_AQUA,
                      'bgColor'=>'',
                      'number'=>$consulta,
                      'text'=>'Publicaciones',
                      'icon'=>'fa fa-upload',
                      'showProgress'=>true,
                      'progressNumber'=>$consulta,
                      'description'=>'Número de publicaciones',
                      
                    
                  ])?>
            </div>
            <div class="col-lg-4">
                <?php echo \insolita\wgadminlte\LteSmallBox::widget([
                       'type'=>\insolita\wgadminlte\LteConst::COLOR_GREEN,
                       'title'=>($consulta*100/1000).'%',
                       'text'=>'Porcentaje',
                       'icon'=>'fa fa-upload',
                       'footer'=>'Insertar publicación <i class="fa fa-hand-o-right"></i>',
                       'link'=> yii\helpers\Url::to(Yii::getAlias("@web")."/index.php/publicacion/create")
                   ]);?>
            </div>
            <div class="col-lg-4">
               <?php
               $numvisitantes = Yii::$app->db->createCommand("SELECT contador from visitantes")->queryScalar();
               echo \insolita\wgadminlte\LteInfoBox::widget([
                      'bgIconColor'=>\insolita\wgadminlte\LteConst::COLOR_AQUA,
                      'bgColor'=>'',
                      'number'=>$numvisitantes,
                      'text'=>'visitantes',
                      'icon'=>'fa fa-line-chart',
                      'showProgress'=>false,
                      'progressNumber'=>66,
                      'description'=>'Número de visitas',
                      
                    
                  ])?>
            </div>
        </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
               <?php 
                $consulEstados = Yii::$app->db->createCommand('SELECT COUNT(*) FROM estado')->queryScalar();
               echo \insolita\wgadminlte\LteSmallBox::widget([
                       'type'=>\insolita\wgadminlte\LteConst::COLOR_MAROON,
                       'title'=>$consulEstados,
                       'text'=>'Estados',
                       'icon'=>'fa fa-circle-o',
                       'footer'=>'Ver estados <i class="fa fa-hand-o-right"></i>',
                       'link'=> yii\helpers\Url::to(Yii::getAlias("@web")."/index.php/estado")
                   ]);?>
                
            </div>
            <div class="col-lg-4">
               <?php 
             
             $consulMuni = Yii::$app->db->createCommand('SELECT COUNT(*) FROM municipio')->queryScalar();
             echo \insolita\wgadminlte\LteSmallBox::widget([
                       'type'=>\insolita\wgadminlte\LteConst::COLOR_TEAL,
                       'title'=>$consulMuni,
                       'text'=>'Municipios',
                       'icon'=>'fa fa-circle-o',
                       'footer'=>'Ver Municipios <i class="fa fa-hand-o-right"></i>',
                       'link'=> yii\helpers\Url::to(Yii::getAlias("@web")."/index.php/municipio")
                   ]);?>
              
            </div>
            <div class="col-lg-4">
              
                
                 <?php 
               $consulColonia = Yii::$app->db->createCommand('SELECT COUNT(*) FROM colonias')->queryScalar();
               echo \insolita\wgadminlte\LteSmallBox::widget([
                       'type'=>\insolita\wgadminlte\LteConst::COLOR_YELLOW,
                       'title'=>$consulColonia,
                       'text'=>"Colonias",
                       'icon'=>'fa fa-circle-o',
                       'footer'=>'Ver Colonias <i class="fa fa-hand-o-right"></i>',
                       'link'=> yii\helpers\Url::to(Yii::getAlias("@web")."/index.php/colonias")
                   ]);?>
            </div>
        </div>
 <div class="row">
            <div class="col-lg-4">
                <?php echo \insolita\wgadminlte\LteSmallBox::widget([
                       'type'=>\insolita\wgadminlte\LteConst::COLOR_BLUE,
                       'title'=>'Operaciones',
                       'text'=>'',
                       'icon'=>'fa fa-random',
                       'footer'=>'Insertar operación <i class="fa fa-hand-o-right"></i>',
                       'link'=> yii\helpers\Url::to(Yii::getAlias("@web")."/index.php/operacion/create")
                   ]);?>
            
            </div>
            <div class="col-lg-4">
               
              
            </div>
            <div class="col-lg-4">
               <?php echo \insolita\wgadminlte\LteSmallBox::widget([
                       'type'=>\insolita\wgadminlte\LteConst::COLOR_RED,
                       'title'=>'Tipos',
                       'text'=>'',
                       'icon'=>'fa fa-institution',
                       'footer'=>'Insertar tipos <i class="fa fa-hand-o-right"></i>',
                       'link'=> yii\helpers\Url::to(Yii::getAlias("@web")."/index.php/tipos/create")
                   ]);?>
            </div>
        </div>
    </div>
</div>
