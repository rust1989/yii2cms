<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$update=Yii::t('app','Update');
$title =Yii::t('app','User');
$this->params['breadcrumbs'][] = ['label' =>$title, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] =$update;
?>
<?= $this->render('../layouts/breadcrumb') ?>
<div class="row">
                      <div class="col-lg-12">
                          <div class="panel">
                              <div class="panel-heading"><?= Html::encode($update.$title) ?></div>
                              <div class="panel-body">
                              <?php $form = ActiveForm::begin([
								        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
								        'fieldConfig' => [  
								            'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",  
								            'labelOptions' => ['class' => 'col-sm-2 control-label'],
								        ],
								    ]); ?>
                                    <div class="form-group">
								        <label class=" col-sm-2 control-label"><?=Yii::t('app','Username')?></label>
								        <div class="col-sm-10" style="padding-top:8px;"><?=$model->username?></div>
								   </div>
					                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
					                <?= $form->field($model, 'status')->radioList(['10'=>'开启','0'=>'关闭'],['value'=>1,'style'=>'margin-top:8px;']) ?>
					                <div class="form-group">
								        <label class=" col-sm-2 control-label">&nbsp;&nbsp;</label>
								        <div class="col-sm-10">
					                    <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
					                    </div>
					                </div>
					
					            <?php ActiveForm::end(); ?>
                              </div>
                           </div>
                      </div>
</div>

