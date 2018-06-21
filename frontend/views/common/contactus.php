 <?php 
 use yii\helpers\Url;
 $path='http://mttekback/';
 $lang=\Yii::$app->session['language'];
 ?>
 <!--banner-->
       <div id="map"></div>
       <!--banner end-->
        <!--main-->
        <div class="main">
            <div class="container">
                <div class="tabs">
                     <div class="tab"><a href="<?=Url::to(['common/aboutus'])?>"><?=yii::t('app','aboutus')?></a></div>
                     <div class="tab"><a href="<?=Url::to(['common/history'])?>"><?=yii::t('app','history')?></a></div>
                     <div class="tab"><a href="<?=Url::to(['common/service'])?>"><?=yii::t('app','service')?></a></div>
                     <div class="tab"><a href="<?=Url::to(['common/customer'])?>"><?=yii::t('app','customer')?></a></div>
                     <div class="tab active"><a href="<?=Url::to(['common/contactus'])?>"><?=yii::t('app','contactus')?></a></div>
                    
                </div>
                <div class="contactus">
                 <?php if($page['poster']){?>
                    <div class="poster">
                        <img src="<?=$path.$page['poster']?>" class="wid100">
                    </div>
                  <?php }?>  
                    <div class="content">
                        <?php if($lang=='zh-CN'){?>
                       <?=$page['content']?>
                       <?php }else{?>
                       <?=$page['content_en']?>
                       <?php }?>
                    </div>
                </div>
            </div>
        </div>
 <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=SsYG9vckWLGesTjLPUXwSZWgRI581bwO"></script>
   <script>
       //地图事件设置函数：
       function setMapEvent(map) {
           map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
         //  map.enableScrollWheelZoom();//启用地图滚轮放大缩小
           map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
           map.enableKeyboard();//启用键盘上下左右键移动地图
       }
       //地图控件添加函数：
       function addMapControl(map) {
           //向地图中添加缩放控件
           var ctrl_nav = new BMap.NavigationControl({
               anchor : BMAP_ANCHOR_TOP_LEFT,
               type : BMAP_NAVIGATION_CONTROL_LARGE
           });
           map.addControl(ctrl_nav);
           //向地图中添加缩略图控件
           var ctrl_ove = new BMap.OverviewMapControl({
               anchor : BMAP_ANCHOR_BOTTOM_RIGHT,
               isOpen : 0
           });
           map.addControl(ctrl_ove);
           //向地图中添加比例尺控件
           var ctrl_sca = new BMap.ScaleControl({
               anchor : BMAP_ANCHOR_BOTTOM_LEFT
           });
           map.addControl(ctrl_sca);
       }
       $(function(){
           // 百度地图API功能
           var sContent ="<h3>神州科技有限公司&nbsp;&nbsp;&nbsp;&nbsp;</h3><div style='margin-top:10px;white-space:nowrap;font-size:12px;'><p>深圳市南山区茶光路文光工业区17栋五楼512</p><p>电话:(0755)8622 2059</p><p>传真:(0755)2643 8165</p></div>";
           var map = new BMap.Map("map");
           var point = new BMap.Point(113.958391,22.574788);
           var marker = new BMap.Marker(point);
           map.addOverlay(marker);
           map.centerAndZoom(point, 15);
           setMapEvent(map);
           addMapControl(map);
           var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
           map.openInfoWindow(infoWindow,point); //开启信息窗口
       });

   </script>
        <!--main end-->