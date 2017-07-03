<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $baseFront = "@frontend";
    public $css = [
        'css/site.css',
        'css/details.css',
        'css/fresco.css'
    ];
     public $js = [
        //'js/bootstrap.js',
        //'js/jquery.js',
        //'js/bootstrap.min.js',
        'js/details.js',
        'js/fresco.js'
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
        'yii\bootstrap\BootstrapAsset',
        'foundationize\foundation\FoundationAsset'
    ];
}
