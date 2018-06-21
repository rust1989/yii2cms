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
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/common.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/jquery.validate.min.js',
        'js/jquery.form.js',
        'js/kindeditor/kindeditor-min.js',
        'js/jquery-ui-1.10.3.min.js',
        'js/jquery.ui.widget.js',
        'js/jquery.fileupload.js',
        'js/bootstrap.min.js',
        'js/layer/layer.js',
        'js/base.js',
        'js/common.js'
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
    ];
}
