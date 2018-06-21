<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
  <section class="panel general">
                                  <header class="panel-heading tab-bg-dark-navy-blue">
                                      <ul class="nav nav-tabs">
                                          <li class="active">
                                              <a data-toggle="tab" href="#home">网站设置</a>
                                          </li>
                                          <li class="">
                                              <a data-toggle="tab" href="#seo">SEO设置</a>
                                          </li>
                                          <li class="">
                                              <a data-toggle="tab" href="#other">其他设置</a>
                                          </li>
                                      </ul>
                                  </header>
                                  <div class="panel-body">
                                         <form id="postForm" class="form-horizontal" action="<?=Url::to(["setting/save"])?>" method="post" role="form">
                                         <input name="_csrf-backend" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
                                      <div class="tab-content">
                                          <div id="home" class="tab-pane active">
			                                      <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">网站名称</label>
			                                          <div class="col-sm-10">
			                                              <input type="text" class="form-control" id="webname" name="webname" value="<?=$list['webname']?>" placeholder="网站名称">
			                                          </div>
			                                      </div>
			                                      <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">网站 URL</label>
			                                          <div class="col-sm-10">
			                                              <input type="text" class="form-control" id="url" name="url" value="<?=$list['url']?>" placeholder="网站 URL">
			                                          </div>
			                                      </div>
			                                      <div class="form-group" style="display:none">
			                                          <label  class=" col-sm-2 control-label">网站备案信息</label>
			                                          <div class="col-sm-10">
			                                              <input type="text" class="form-control" id="icp" name="icp" value="<?=$list['icp']?>" placeholder="网站备案信息">
			                                          </div>
			                                      </div>
			                                       <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">网站关闭</label>
			                                          <div class="col-sm-10">
			                                              <label class="radio-inline">
			                                                  <input type="radio" id="isoff1" name="isoff" value="1" <?php if($list['isoff']==1){?>checked<?php }?>>是
			                                              </label>
			                                              <label class="radio-inline">
			                                                  <input type="radio" id="isoff2" name="isoff"  value="0" <?php if($list['isoff']==0){?>checked<?php }?>>否
			                                              </label>
			                                          </div>
			                                      </div>
			                                        <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">网站关闭原因</label>
			                                          <div class="col-sm-10">
			                                              <textarea id="offdetails" name="offdetails" class="form-control" rows="4"  ><?=$list['offdetails']?></textarea>
			                                          </div>
			                                      </div>
			                                         <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">第三方统计代码</label>
			                                          <div class="col-sm-10">
			                                              <textarea id="counter" name="counter" class="form-control" rows="4" ><?=$list['counter']?></textarea>
			                                          </div>
			                                      </div>
			                                        <div class="form-group">
			                                          <div class="col-sm-offset-2 col-sm-10">
			                                              <button type="submit" class="btn btn-info">提交</button>
			                                          </div>
			                                      </div>
                                          </div>
                                          <div id="seo" class="tab-pane">
			                                      <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">浏览器标题(Title):</label>
			                                          <div class="col-sm-10">
			                                              <input type="text" class="form-control" id="seotitle" name="seotitle" value="<?=$list['seotitle']?>" placeholder="浏览器标题">
			                                          </div>
			                                      </div>
			                                      <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">关键字(Meta Keywords)</label>
			                                          <div class="col-sm-10">
			                                              <input type="text" class="form-control" id="metakeywords" name="metakeywords" value="<?=$list['metakeywords']?>" placeholder="关键字">
			                                          </div>
			                                      </div>
			                                       <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">描述(Meta Description)</label>
			                                          <div class="col-sm-10">
			                                               <textarea id="metadescription" name="metadescription" class="form-control" rows="4"  ><?=$list['metadescription']?></textarea>
			                                          </div>
			                                      </div>
			                                      
			                                      
			                                        <div class="form-group">
			                                          <div class="col-sm-offset-2 col-sm-10">
			                                              <button type="submit" class="btn btn-info">提交</button>
			                                          </div>
			                                      </div>
                                          </div>
                                          
                                            
			                              <div id="other" class="tab-pane">
			                                      <div class="form-group">
			                                          <label  class=" col-sm-2 control-label">列表每页显示数量:</label>
			                                          <div class="col-sm-10">
			                                              <input type="text" class="form-control" id="perpage" name="perpage" value="<?=$list['perpage']?>" placeholder="列表每页显示数量">
			                                          </div>
			                                      </div>
			                                        <div class="form-group">
			                                          <div class="col-sm-offset-2 col-sm-10">
			                                              <button type="submit" class="btn btn-info">提交</button>
			                                          </div>
			                                      </div>
                                          </div>
                                          
                                      </div>
                                          </form>
                                  </div>
       </section>
 <script>
            jQuery(function(){
                var rules={
                		webname:"required"
                		
                };
                var msgs={
                		webname:"请输入网站名称"
                };
                tool.commonForm("#postForm",rules,msgs,tool.tipError);
                
                
            });
</script>    
