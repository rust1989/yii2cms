<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DownloadsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="downloads-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'create_date') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'poster') ?>

    <?php // echo $form->field($model, 'show') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'topic') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'short') ?>

    <?php // echo $form->field($model, 'cid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
