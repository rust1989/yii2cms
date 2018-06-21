<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Categorys */
$update=Yii::t('app','Update');
$title =Yii::t('app','Categorys');
$this->params['breadcrumbs'][] = ['label' =>$title, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('../layouts/breadcrumb') ?>
<div class="row">
                      <div class="col-lg-12">
                          <div class="panel">
                              <div class="panel-heading"><?= Html::encode($update.$title) ?></div>
                              <div class="panel-body">
                               <?= $this->render('_form', ['model' => $model,'categorys'=>$categorys]) ?>
                              </div>
                           </div>
                      </div>
</div>
