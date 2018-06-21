 <?php 
 use yii\helpers\Url;
 $path='http://mttekback/';
 $lang=\Yii::$app->session['language'];
 ?>
 <!--banner-->
       <div class="banners">
           <?php if(isset($banners)&&count($banners)){
            	foreach ($banners as $index=>$item){
                   if($item['poster']){
            ?>
           <div class="banner"><a href="<?php echo $item['url']?$item['url']:"javascript:void(0);";?>"><img src="<?=$path.$item['poster']?>" class="wid100"/></a></div>
            <?php } } }?>  
       </div>
       <!--banner end-->
        <!--main-->
        <div class="main">
            <div class="container">
                <div class="tabs">
                     <div class="tab "><a href="<?=Url::to(['common/aboutus'])?>"><?=yii::t('app','aboutus')?></a></div>
                     <div class="tab active"><a href="<?=Url::to(['common/history'])?>"><?=yii::t('app','history')?></a></div>
                     <div class="tab"><a href="<?=Url::to(['common/service'])?>"><?=yii::t('app','service')?></a></div>
                     <div class="tab"><a href="<?=Url::to(['common/customer'])?>"><?=yii::t('app','customer')?></a></div>
                     <div class="tab"><a href="<?=Url::to(['common/contactus'])?>"><?=yii::t('app','contactus')?></a></div>
                    
                </div>
                <div class="historylist">
                       <?php if($lang=='zh-CN'){?>
                       <?=$page['content']?>
                       <?php }else{?>
                       <?=$page['content_en']?>
                       <?php }?>
                </div>
            </div>
        </div>

        <!--main end-->