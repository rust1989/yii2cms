<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">

     <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
        'fieldConfig' => [  
            'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",  
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'position')->dropDownList(['home'=>'首页','support'=>'技术支援','product'=>'产品展示','productcontent'=>'产品内页','aboutus'=>'关于我们','history'=>'发展历程','service'=>'售后服务','customer'=>'合作客户'],['prompt'=>'请选择位置']) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'short')->textarea(['row'=>3]) ?>
    <?= $form->field($model, 'short_en')->textarea(['row'=>3]) ?>
	<div class="form-group field-banner-poster">
		<label class="col-sm-2 control-label">图片</label>
		<div class="col-sm-10">
		<input type="file" id="image" name="UploadForm[image]" style="display: inline-block;" <?php if(file_exists($model->poster)){?>data-img="<?=$model->poster?>"<?php } ?>  data-widget='uploadPic' data-key="poster" data-url="<?=Url::to(['upload','key'=>'image'])?>">
        <input type="hidden" id="poster" name="<?php echo ucfirst(Yii::$app->controller->id)?>[poster]" <?php if(file_exists($model->poster)){?>value="<?=$model->poster?>"<?php } ?>  />
        </div>
	</div>
    <div class="form-group field-banner-avatar hide">
		<label class="col-sm-2 control-label">产品图片</label>
		<div class="col-sm-10">
		<input type="file" id="image2" name="UploadForm[image2]" style="display: inline-block;" <?php if(file_exists($model->avatar)){?>data-img="<?=$model->avatar?>"<?php } ?>  data-widget='uploadPic' data-key="avatar" data-url="<?=Url::to(['upload','key'=>'image2'])?>">
        <input type="hidden" id="avatar" name="<?php echo ucfirst(Yii::$app->controller->id)?>[avatar]" <?php if(file_exists($model->avatar)){?>value="<?=$model->avatar?>"<?php } ?>  />
        </div>
	</div>
	
    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    
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
<script>
  $(function(){
     $("#banner-position").change(function(){
          var val=$(this).val();
          if(val=='home'){
              $(".field-banner-avatar").removeClass('hide').addClass('show');
          }else{
        	  $(".field-banner-avatar").removeClass('show').addClass('hide');
          }
     });
  });
</script>
