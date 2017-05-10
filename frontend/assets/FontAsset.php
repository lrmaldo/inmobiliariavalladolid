<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class FontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Exo+2:300,400,400i,600',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        '//fonts.googleapis.com/css?family=Montserrat:400,400i'
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}