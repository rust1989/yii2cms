 <?php 
 use yii\helpers\Url;
 $con=Yii::$app->controller->id;
 $act=Yii::$app->controller->action->id;
 ?>
 <div class="topnav">
            <div class="container">
                <div class="langs">
                    <a href="<?=Url::to(['language','lang'=>'zh-CN'])?>" class="cn">简体中文</a>
                    <a href="<?=Url::to(['language','lang'=>'en'])?>" class="en">English</a>
                </div>
            </div>
        </div>
        <!--header-->
        <div class="header bc">
             <div class="container">
                  <div class="logo"><a href="<?=Url::to(['site/index'])?>"><img src="/img/logo.png" class="wid100"/> </a></div>
                 <div class="menu">
                     <div class="row"><a href="<?=Url::to(['site/index'])?>"  <?php if($con=='site'){?>class="active"<?php }?>><?=yii::t('app','home')?></a></div>
                     <div class="row hasChild">
                         <a href="<?=Url::to(['common/aboutus'])?>" <?php if($con=='common'&&in_array($act,['aboutus','history','service','customer','contactus'])){?>class="active"<?php }?>><?=yii::t('app','aboutus')?></a>
                         <div class="childs">
                             <div class="child"><a href="<?=Url::to(['common/aboutus'])?>"><?=yii::t('app','aboutus')?></a></div>
                             <div class="child"><a href="<?=Url::to(['common/history'])?>"><?=yii::t('app','history')?></a></div>
                             <div class="child"><a href="<?=Url::to(['common/service'])?>"><?=yii::t('app','service')?></a></div>
                             <div class="child"><a href="<?=Url::to(['common/customer'])?>"><?=yii::t('app','customer')?></a></div>
                             <div class="child"><a href="<?=Url::to(['common/contactus'])?>"><?=yii::t('app','contactus')?></a></div>

                         </div>
                     </div>
                     <div class="row pdu hasChild">
                         <a href="<?=Url::to(['product/index'])?>" <?php if($con=='product'){?>class="active"<?php }?>><?=yii::t('app','product')?></a>
                         <div class="childs">
                             <?php foreach ($categorys as $item){?>
                             <div class="child"><a href="<?=Url::to(['product/index'])?>"><?=$item['title']?></a></div>
                             <?php }?> 
                         </div>
                     </div>
                     <div class="row"><a href="<?=Url::to(['common/support'])?>" <?php if($con=='common'&&$act=='support'){?>class="active"<?php }?>><?=yii::t('app','support')?></a></div>
                 </div>
             </div>
        </div>
        <!--header end-->