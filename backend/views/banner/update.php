<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */

$update=Yii::t('app','Update');
$title =Yii::t('app','Banner');
$this->params['breadcrumbs'][] = ['label' =>$title, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $update;
?>
<?= $this->render('../layouts/breadcrumb') ?>
<div class="row">
                      <div class="col-lg-12">
                          <div class="panel">
                              <div class="panel-heading"><?= Html::encode($update.$title) ?></div>
                              <div class="panel-body">
                                <?= $this->render('_form', ['model' => $model,]) ?>
                              </div>
                           </div>
                      </div>
</div>
