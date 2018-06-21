<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?=Yii::$app->params['seotitle']?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="<?=Yii::$app->params['metadescription']?>">
    <meta name="keywords" content="<?=Yii::$app->params['metakeywords']?>">
    <?php $this->head() ?>
</head>
<body class="skin-black">
  <?php if (Yii::$app->user->isGuest) {?>
      <?php $this->beginBody() ?> 
        <?= Alert::widget() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
  <?php }else{?>       
       <?= $this->render('head') ?>
       <div class="wrapper row-offcanvas row-offcanvas-left">
       <?= $this->render('left') ?>
       </div>
       <div class="right-side"> 
        <div class="content" style="min-height:360px;">
        <?php $this->beginBody() ?> 
        <?= Alert::widget() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
        </div>
       </div>
  <?php }?>     
</body>
</html>
<?php $this->endPage() ?>
