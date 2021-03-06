<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Downloads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="downloads-form">

     <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
        'fieldConfig' => [  
            'template' => "{label}\n<div class=\"col-sm-8\">{input}</div>\n<div class=\"col-sm-2\">{error}</div>",  
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'support')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'support_en')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'short')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'short_en')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6,'data-widget'=>"editor"]) ?>
    <?= $form->field($model, 'content_en')->textarea(['rows' => 6,'data-widget'=>"editor"]) ?>

    <div class="form-group field-banner-poster">
		<label class="col-sm-2 control-label">文件上传</label>
		<div class="col-sm-10">
		<input type="file" id="image" name="UploadForm[image]" style="display: inline-block;" data-file=" <?php if(file_exists($model->poster)){?><?=$model->poster?><?php } ?> " data-widget='uploadPic' data-key="poster" data-url="<?=Url::to(['upload','key'=>'image'])?>">
        <input type="hidden" id="poster" name="<?php echo ucfirst(Yii::$app->controller->id)?>[poster]" <?php if(file_exists($model->poster)){?>value="<?=$model->poster?>"<?php } ?>  />
        </div>
	</div>
    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'status')->radioList(['1'=>Yii::t('app','Open'),'0'=>Yii::t('app','Close')],['value'=>1,'style'=>'margin-top:8px;']) ?>

    <?//= $form->field($model, 'show')->radioList(['1'=>Yii::t('app','Open'),'0'=>Yii::t('app','Close')],['value'=>1]) ?>

    <div class="form-group">
        <label class=" col-sm-2 control-label">&nbsp;&nbsp;</label>
        <div class="col-sm-10">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
