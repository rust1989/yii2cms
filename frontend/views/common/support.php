 <?php 
 use yii\widgets\LinkPager;
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
                <div class="newslist">
                    <?php if(count($downloads)){foreach ($downloads as $item){?>
                    <div class="news">
                        <div class="date"><div class="day"><?php echo date("d",strtotime($item['create_date']));?></div><div class="month"><?php echo date("Y-m",strtotime($item['create_date']));?></div></div>
                        <div class="content">
                            <div class="title"><a href="javascript:void(0);">
                             <?php if($lang=='zh-CN'){?><?=$item['title']?><?php }else{?><?=$item['title_en']?><?php }?>
                            </a></div>
                            <div class="text"><?=Yii::t('app','downfile')?>:<a href="<?php echo $item['poster']?'/'.$item['poster']."\" target='_blank'":"javascript:void(0);";?>" class="down"><?=Yii::t('app','download')?></a></div>
                            <div class="text"><?=Yii::t('app','downsupport')?>:<?php if($lang=='zh-CN'){?><?=$item['support']?><?php }else{?><?=$item['support_en']?><?php }?></div>
                            <div class="text"><?=Yii::t('app','downshort')?>:<?php if($lang=='zh-CN'){?><?=$item['short']?><?php }else{?><?=$item['short_en']?><?php }?></div>
                        </div>
                    </div>
                    <?php }}?>
                    <div class="clearfix"></div>
                <?php echo LinkPager::widget(['pagination' => $pagination,]);?>
                </div>
            </div>
        </div>

        <!--main end-->