<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Downloads */

$create=Yii::t('app','Create');
$title =Yii::t('app','Downloads');
$this->params['breadcrumbs'][] = ['label' =>$title, 'url' => ['index']];
$this->params['breadcrumbs'][] = $create.$title;
?>
<?= $this->render('../layouts/breadcrumb') ?>
<div class="row">
                      <div class="col-lg-12">
                          <div class="panel">
                              <div class="panel-heading"><?= Html::encode($create.$title) ?></div>
                              <div class="panel-body">
                               <?= $this->render('_form', ['model' => $model,]) ?>
                              </div>
                           </div>
                      </div>
</div>