<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

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
     <title><?=$this->params['seotitle']?></title>
    <meta name="description" content="<?=$this->params['metadescription']?>">
    <meta name="keywords" content="<?=$this->params['metakeywords']?>">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="web">
    <?=$this->render('head',['categorys'=>$this->params['categorys']])?>
    <?= $content ?>
</div>

<?php $this->endBody() ?>
<?=$this->render('foot')?>
</body>
</html>
<?php $this->endPage() ?>
