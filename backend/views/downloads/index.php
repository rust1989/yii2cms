<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DownloadsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$title =Yii::t('app','Downloads');
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
                                                        <a class="btn btn-default btn-sm" href="javascript:void(0);" id="selectAll" data-widget="#showTable">全選</a>
                                                        <a class="btn btn-success btn-sm" id="orderAll" href="<?=Url::to(['sort'])?>" data-widget="#showTable" data-table='<?=Yii::$app->controller->id?>'>排序</a>
                                                         <?= Html::a($create, ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                                                       
                                                           <input name="_csrf-backend"  type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
                                                    </div>
                                                     <?= GridView::widget([
												        'dataProvider' => $dataProvider,
												        'filterModel' => $searchModel,
												        'columns' => [
												            [
															'attribute'=>'id',
															'format' => 'raw',
															'headerOptions'=>['width'=>'30px'],
															'value'=>function($model){
																return '<input type="checkbox" class="list-child list-checkbox" value="'.$model->id.'">';
															}
															],
															[
															'attribute'=>'sort',
															'format' => 'raw',
															'headerOptions'=>['width'=>'50px'],
															'value'=>function($model){
																$val=$model->sort?$model->sort:$model->id;
																return '  <input type="text" class="form-control input-sm input-order" value="'.$val.'" />';
															}
																],
												            'id',
												            'title',
												            'title_en',
												            //'content:ntext',
												            'create_date',
												             [
															'attribute' => 'status',
															'value' => function ($model) {
                                                                   return funstatus($model->status);
                                                            }
                                                            ],
												            //'show:funShow',
												            //'poster',
												            //'keyword',
												            //'description:ntext',
												            //'topic',
												            //'sort',
												            //'short',
												            //'cid',
												
												            ['class' => 'yii\grid\ActionColumn','headerOptions'=>['width'=>'60px'],'header' =>yii::t('app','Action'),'template' =>'{update} {delete}'],
												        ],
												    ]); ?>
                                                    
                                               </div>
                              </section>
                       </div>
</div>