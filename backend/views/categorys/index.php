<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$title =Yii::t('app','Categorys');
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
                                                    <table id="showTable" class="table" style="border-bottom:1px solid #ddd;border-top:1px solid #ddd">
                                                      <thead>
                                                        <tr>
                                                          <th width="20">#</th>
                                                          <th width="50">排序</th>
                                                          <th>标题</th>
                                                          <th>层级</th>
                                                          <th>状态</th>
                                                          <th>创建时间</th>
                                                          <th width="100px">操作</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                   <?php foreach ($list as $vo){?>
                                                    <tr>
                                                      <td>
                                                          <input type="checkbox" class="list-child list-checkbox" value="<?=$vo['id']?>" />
                                                      </td>
                                                      <td>    
                                                          <input type="text" class="form-control input-sm input-order" value="<?=$vo['sort']?>" />
                                                      </td>
                                                      <td><?=$vo['title']?></td>
                                                      <td><?=$vo['catname']?></td>
                                                      <td>
                                                      <?php if($vo['status']==1){?>
                                                      <span class="label label-info">开启</span>
                                                      <?php }else{?>
                                                      <span class="label label-danger">关闭</span>
                                                      <?php }?>
                                                      </td>
                                                      <td><?=date("Y-m-d",strtotime($vo['create_date']))?></td>
                                                      <td>
                                                          <div class="hidden-phone">
                                                              <a href="<?=Url::to(['update','id'=>$vo['id']])?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                                              <a href="<?=Url::to(['delete','id'=>$vo['id']])?>" class="delbtn"><span class="glyphicon glyphicon-trash"></span></a>
                                                          </div>
                                                      </td>
                                                  </tr>
                                                  <?php }?>
                                              </tbody>
                                          </table>
                                                    
                                               </div>
                              </section>
                       </div>
</div>  
