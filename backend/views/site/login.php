<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>
       <div  style="margin:100px auto;width:320px;">
                          <section class="panel">
                              <header class="panel-heading text-center"><h3><?=Yii::$app->params['webname']?>後台管理系統</h3></header>
                              <div class="panel-body">
                                  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                                   <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
					                <?= $form->field($model, 'password')->passwordInput()  ?>
					                 <div class="form-group">
									<label class="col-sm-6 control-label text-left" style="padding:0px;"> <?= $form->field($model, 'rememberMe')->checkbox() ?></label>
									<div class="col-sm-6 text-right" style="padding:0px;">
									<?= Html::submitButton('登入', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
									</div>
									</div>
                                   <?php ActiveForm::end(); ?>
                              </div>
                          </section>
         </div>

