<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BannerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'poster') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'show') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'topic') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
