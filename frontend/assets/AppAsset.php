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
    public $baseImg= '@web/assets/imagenes';
    public $sourcePath = '@bower/';
    public $css = [
       // 'css/bootstrap.min.css',
       // 'css/shop-homepage.css',
        //'css/bootstrap.css',
        'css/details.css',
       
    ];
    public $js = [
        //'js/bootstrap.js',
        //'js/jquery.js',
        //'js/bootstrap.min.js',
        'js/details.js'
      ];
    public $fonts = [
      'glyphicons-halflings-regular.eot',
      'glyphicons-halflings-regular.svg',
      'glyphicons-halflings-regular.ttf',
      'glyphicons-halflings-regular.woff',
      'glyphicons-halflings-regular.woff2',
    ];

   
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'foundationize\foundation\FoundationAsset'
    ];
}
