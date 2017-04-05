<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
<<<<<<< HEAD
    public $sourcePath = '@bower/startbootstrap/';
    public $css = [
        'css/bootstrap.min.css',
        'css/shop-homepage.css',
       
    ];
    public $js = [
        'js/jquery.js',
        'js/bootstrap.min.js',
      
=======
    public $css = [
        'css/site.css',
    ];
    public $js = [
>>>>>>> 1e466da33702a08968f88f61c2b77cb55a615679
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
