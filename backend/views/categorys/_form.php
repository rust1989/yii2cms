<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Categorys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorys-form">

     <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
        'fieldConfig' => [  
            'template' => "{label}\n<div class=\"col-sm-8\">{input}</div>\n<div class=\"col-sm-2\">{error}</div>",  
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pid')->dropdownList($categorys,['prompt'=>'请选择父级id']) ?>
    <?= $form->field($model, 'short')->textarea(['row'=>3]) ?>
    <?= $form->field($model, 'short_en')->textarea(['row'=>3]) ?>
    <?= $form->field($model, 'status')->radioList(['1'=>Yii::t('app','Open'),'0'=>Yii::t('app','Close')],['value'=>1,'style'=>'margin-top:8px;']) ?>

    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
    <?//= $form->field($model, 'show')->radioList(['1'=>Yii::t('app','Open'),'0'=>Yii::t('app','Close')],['value'=>1]) ?>
     <div class="form-group">
        <label class=" col-sm-2 control-label">&nbsp;&nbsp;</label>
        <div class="col-sm-10">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
