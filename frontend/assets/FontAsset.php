<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class FontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Exo+2:300,400,400i,600" rel="stylesheet'
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}