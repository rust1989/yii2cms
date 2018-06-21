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
                    <?php foreach ($categorys as $item){?>
                             <div class="tab <?php if($item['id']==$pid){?>active<?php }?>"><a href="<?=Url::to(['product/index','pid'=>$item['id']])?>"><?php if($lang=='zh-CN'){?><?=$item['title']?><?php }else{?><?=$item['title_en']?><?php }?></a></div>
                    <?php }?> 
                </div>
                <?php 
                   if(count($childs)){
                   foreach ($childs as $child){
                ?>
                     <h3 class="child"><?php if($lang=='zh-CN'){?><?=$child['title']?><?php }else{?><?=$child['title_en']?><?php }?></h3>
                 <?php if(count($child['products'])){?>    
                     <div class="productlist">
                    <?php foreach ($child['products'] as $item){?>
                    <div class="product">
                        <div class="title"><a href="<?=Url::to(['content','id'=>$item['id']])?>"><?php if($lang=='zh-CN'){?><?=$item['title']?><?php }else{?><?=$item['title_en']?><?php }?></a></div>
                        <div class="infor"><?php if($lang=='zh-CN'){?><?=$item['short']?><?php }else{?><?=$item['short_en']?><?php }?></div>
                        <a href="<?=Url::to(['content','id'=>$item['id']])?>">
                        <div class="img">
                            <?php if($item['poster']){?><img src="<?=$path.$item['poster']?>" class="wid100" /><?php }?>
                            <span class="icon"></span>
                        </div>
                         </a>
                    </div>
                    <?php }?>
                </div>
                <?php } } }?>
            </div>
        </div>
       <!--main end-->
        <script>
       $(function(){
           $(".product").each(function () {
               $(this).hover(function(){
                   $(this).find('.icon').fadeIn();
               },function(){
                   $(this).find('.icon').fadeOut();
               });
           });
       });
   </script>