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
    public $css = [
        'css/base.css',
        'css/style.css',
        'js/slick/slick.css',
    ];
    public $js = [
    'js/jquery.min.js',
    'js/slick/slick.min.js',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
    ];
}
