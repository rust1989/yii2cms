 <?php
 use yii\helpers\Url; 
 ?>
 <div class="row">
             <div class="col-md-12">
                 <!--breadcrumbs start -->
                 <ul class="breadcrumb">
                     <?php foreach($this->params['breadcrumbs'] as $row){?>
                     <?php if(is_array($row)){?>
                     <li><a href="<?php echo Url::to($row['url'])?>"><?=$row['label']?></a></li>
                     <?php }else{?>
	                 <li><a href="javascrpt:void(0);"><?=$row?></a></li>
	                 <?php } } ?>
                 </ul>
                 <!--breadcrumbs end -->
             </div>
 </div> 