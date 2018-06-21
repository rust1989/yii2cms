<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Url;
$this->params['breadcrumbs'][] =yii::t('app',ucfirst($kind));
?>

<?= $this->render('../layouts/breadcrumb') ?>
  <section class="panel general">
     <div class="panel-body">
                                     <form id="postForm" class="form-horizontal" action="<?=Url::to(["save",'id'=>$id,'kind'=>$kind])?>" method="post" role="form">
                                         <input name="_csrf-backend" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
                                       <div class="tab-content">
		                                       <div class="form-group">
                                          <label  class=" col-sm-2 control-label">SEO标题</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="topic" name="<?php echo ucfirst(Yii::$app->controller->id)?>[topic]" value="<?=$item['topic']?>" placeholder="SEO标题">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class=" col-sm-2 control-label">SEO关键词</label>
                                          <div class="col-sm-10">
                                              <textarea  class="form-control" id="keyword" name="<?php echo ucfirst(Yii::$app->controller->id)?>[keyword]" ><?=$item['keyword']?></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class=" col-sm-2 control-label">SEO描述</label>
                                          <div class="col-sm-10">
                                              <textarea  class="form-control" id="description" name="<?php echo ucfirst(Yii::$app->controller->id)?>[description]" ><?=$item['description']?></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group field-banner-poster">
										<label class="col-sm-2 control-label">图片</label>
										<div class="col-sm-10">
										<input type="file" id="image" name="UploadForm[image]" style="display: inline-block;" data-img=" <?php if($item['poster']&&file_exists($item['poster'])){?><?=$item['poster']?><?php } ?> " data-widget='uploadPic' data-key="poster" data-url="<?=Url::to(['upload','key'=>'image'])?>">
								        <input type="hidden" id="poster" name="<?php echo ucfirst(Yii::$app->controller->id)?>[poster]" <?php if($item['poster']&&file_exists($item['poster'])){?>value="<?=$item['poster']?>"<?php } ?>  />
								        </div>
									</div>
                                      <div class="form-group">
                                          <label  class="col-sm-2 control-label">内容</label>
                                          <div class="col-sm-10">
                                              <textarea class="form-control"  data-widget="editor" style="width:100%;height:400px;"  id="content" name="<?php echo ucfirst(Yii::$app->controller->id)?>[content]"><?=$item['content']?></textarea>
                                          </div>
                                      </div>
                                    <div class="form-group">
                                          <label  class="col-sm-2 control-label">内容(en)</label>
                                          <div class="col-sm-10">
                                              <textarea class="form-control"  data-widget="editor" style="width:100%;height:400px;"  id="content_en" name="<?php echo ucfirst(Yii::$app->controller->id)?>[content_en]"><?=$item['content_en']?></textarea>
                                          </div>
                                      </div>
                                      <?php if(isset($item['id'])&&$item['id']){?><input type="hidden" id="id" name="<?php echo ucfirst(Yii::$app->controller->id)?>[id]" value="<?=$item['id']?>" /><?php }?>
                                      <input type="hidden" id="kind" name="<?php echo ucfirst(Yii::$app->controller->id)?>[kind]" value="<?=$kind?>" />
					                            <div class="form-group">
					                                          <div class="col-sm-offset-2 col-sm-10">
					                                              <button type="submit" class="btn btn-info">提交</button>
					                                          </div>
					                            </div>
                                      </div>
                                      </form>
     </div>                                      
  </section>
 <script>
            jQuery(function(){
                var rules={};
                var msgs={};
                tool.commonForm("#postForm",rules,msgs,tool.tipError);
            });
</script> 