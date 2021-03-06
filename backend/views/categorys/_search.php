<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategorysSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorys-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'show') ?>

    <?= $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'pid') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'short') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
