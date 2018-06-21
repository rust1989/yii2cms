  <?php
/* @var $this yii\web\View */
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
                <div class="procontent">
                     <div class="detail">
                         <div class="posterwraper">
                             <div class="poster"><img src="<?=$path.$content['poster']?>" class="wid100"></div>
                         </div>
                         <div class="content">
                             <div class="title"><?php if($lang=='zh-CN'){?><?=$content['title']?><?php }else{?><?=$content['title_en']?><?php }?></div>
                             <div class="desc"><?php if($lang=='zh-CN'){?><?=$content['short']?><?php }else{?><?=$content['short_en']?><?php }?></div>
                             <div class="download"><a href="javascript:void(0);"><img src="/img/download.png" class="wid100"/> </a> </div>
                         </div>
                     </div>
                    <div class="infor"><?php if($lang=='zh-CN'){?><?=$content['content']?><?php }else{?><?=$content['content_en']?><?php }?></div>
                    <div class="aside">
                        <div class="links">
                            <?php if(count($prev)&&isset($prev['title'])&&$prev['title']){?>
                            <div class="link"><span class="tag"><?=Yii::t('app','prev')?></span><a href="<?=Url::to(['content','id'=>$prev['id']])?>" class="prev"><?php if($lang=='zh-CN'){?><?=$prev['title']?><?php }else{?><?=$prev['title_en']?><?php }?></a></div>
                            <?php }?>
                            <?php if(count($next)&&isset($next['title'])&&$next['title']){?>
                            <div class="link"><span class="tag"><?=Yii::t('app','next')?></span><a href="<?=Url::to(['content','id'=>$next['id']])?>" class="next"><?php if($lang=='zh-CN'){?><?=$next['title']?><?php }else{?><?=$next['title_en']?><?php }?></a></div>
                            <?php }?>
                        </div>
                        <div class="share"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--main end-->