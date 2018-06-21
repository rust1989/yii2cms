<?php
/* @var $this yii\web\View */
$path='http://mttekback/';
$lang=\Yii::$app->session['language'];
?>
<!--banner-->
        <div class="video">
             <video autoplay="" loop="" muted="" id="runningvideo"><source src="/img/video.mp4" type="video/mp4"><source src="img/video.mp4"></video>
        </div>
        <!--banner end-->
        <!--main-->
        <div class="main" style="margin-top:-4px;">
            <?php if(isset($banners)&&count($banners)){
            	foreach ($banners as $index=>$item){
                   
                   if($item['poster']){
            ?>
            <div class="showProduct">
                <img src="<?=$path.$item['poster']?>" class="wid100" />
                <div class="wraper">
                    <div class="container">
                       <?php if($item['avatar']&&$index%2==0){?> 
                        <div class="poster">
                            <img src="<?=$path.$item['avatar']?>" />
                        </div>
                        <?php }?>
                        <div class="textWraper">
                            <div class="title"><?php if($lang=='zh-CN'){?><?=$item['title']?><?php }else{?><?=$item['title_en']?><?php }?></div>
                            <div class="infor"><?php if($lang=='zh-CN'){?><?=sub_str($item['short'],80)?><?php }else{?><?=sub_str($item['short_en'],80)?><?php }?></div>
                            <div class="button"><a href="<?php echo $item['url']?$item['url']:"javascript:void(0);";?>"><?=Yii::t('app','findmore')?></a> </div>
                        </div>
                        <?php if($item['avatar']&&$index%2==1){?> 
                        <div class="poster">
                            <img src="<?=$path.$item['avatar']?>" />
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php }}}?>
             <div class="showText private">
                <img src="/img/private.jpg" class="wid100" />
                 <div class="wraper">
                    <div class="container">
                        <div class="textWraper">
                            <div class="title"><?=Yii::t('app','custservice')?></div>
                            <div class="text"><?=Yii::t('app','servicetxt')?></div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!--main end-->