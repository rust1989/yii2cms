<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$title =Yii::t('app','User');
$create=Yii::t('app','Create');
$this->params['breadcrumbs'][] = $title;
?>
<?= $this->render('../layouts/breadcrumb') ?>
<div class="row">
                        <div class="col-md-12">
                               <section class="panel">
                                                <header class="panel-heading">列表頁</header>
                                                <div class="panel-body table-responsive">
                                                    <div class=" add-task-row" style="padding-bottom:15px;">
                                                         <?= Html::a($create, ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                                                    </div>
                                                    <?= GridView::widget([
												        'dataProvider' => $dataProvider,
												        'filterModel' => $searchModel,
												        'columns' => [
												            ['class' => 'yii\grid\SerialColumn'],
												
												            'id',
												            'username',
												            //'auth_key',
												            //'password_hash',
												            //'password_reset_token',
												            //'email:email',
												            [
																'attribute' => 'status',
																'value' => function ($model) {
	                                                                   return funstatus($model->status);
	                                                            }
	                                                        ],
												            'created_at:date',
												            'updated_at:date',
												            [
															'class' => 'yii\grid\ActionColumn',
															'headerOptions'=>['width'=>'60px'],
															'header' =>yii::t('app','Action'),
															'template' =>'{update} {delete}',
															'buttons'=>[
																   'delete' => function ($url, $model, $key) {
                                                                        if($model->id==1)return '';
																		$options = [
																		'title' => Yii::t('yii', 'Delete'),
																		'aria-label' => Yii::t('yii', 'Delete'),
																		'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
																		'data-method' => 'post',
																		'data-pjax' => '0',
																		];
																	    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
																},
															]
												        	],
												        ],
												    ]); ?>
                                               </div>
                              </section>
                       </div>
</div>