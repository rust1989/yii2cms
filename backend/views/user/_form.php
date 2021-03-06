<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data','class' => 'form-horizontal'],
        'fieldConfig' => [  
            'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",  
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'status')->radioList(['1'=>'开启','0'=>'关闭'],['value'=>1,'style'=>'margin-top:8px;']) ?>

     <div class="form-group">
        <label class=" col-sm-2 control-label">&nbsp;&nbsp;</label>
        <div class="col-sm-10">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
