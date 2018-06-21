    <!--footer-->
        <div class="footer bc">
              <div class="container">
                     <div class="title">神州科技有限公司</div>
                     <div class="text">
                         <p>地址/Add: 深圳市南山区茶光路文光工业区17栋五楼512</p>
                         <p>电话/Tel: 075586222059</p>
                         <p>传真/Fax: +86 0755 2643 8165</p>
                     </div>
                     <div class="copyright">
                         <p>©MarkLand Technology ,Ltd  2018. All rights reserved.</p>
                     </div>
              </div>
        </div>
        <!--footer end-->
   </div>
   <div class="fixed-btn"><a class="go-top" href="javascript:void(0)" onclick="goto_top()" title="返回顶部">
    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="12">        <path d="M9.314 0l9.313 9.314-2.12 2.121-7.193-7.192-7.193 7.192L0 9.314z" fill="#FFF" fill-rule="evenodd"></path>      </svg>
    </a></div>
   <script>
   var goto_top_type = -1;  
   var goto_top_itv = 0;     
   function goto_top_timer()  {  
       var y = goto_top_type == 1 ? document.documentElement.scrollTop : document.body.scrollTop;  
       var moveby = 15;     
       y -= Math.ceil(y * moveby / 100);  
       if (y < 0) {  y = 0;  }     
       if (goto_top_type == 1) {  
           document.documentElement.scrollTop = y;  
       }else{  
	       document.body.scrollTop = y;  
	   }     
	   if (y == 0) {  
    	   clearInterval(goto_top_itv);  
    	   goto_top_itv = 0;  
    	}  
     }     
     function goto_top()  {  
         if (goto_top_itv == 0) {  
             if (document.documentElement && document.documentElement.scrollTop) {  
                 goto_top_type = 1;  
             }  else if (document.body && document.body.scrollTop) {  
                 goto_top_type = 2;  
             }  else {  
                 goto_top_type = 0;  
             }     
             if (goto_top_type > 0) { 
                  goto_top_itv = setInterval('goto_top_timer()', 10); 
              }  
          }  
       }
       $(function() {
                   if($('.banners').length){
			    	   $('.banners').slick({
			               dots: true,
			               infinite: false,
			               speed: 1000,
			               slidesToShow: 1,
			               autoplay: true,
			               autoplaySpeed: 2000,
			               adaptiveHeight: true,
			               fade: true,
			               cssEase: 'linear',
			               arrows: false
			           });
                   }
                   $(".menu .hasChild").each(function () {
                       $(this).hover(function () {

                           $(this).find(".childs").slideDown();
                       }, function () {
                           var isFocus=$(this).is(":focus");
                           if(!isFocus)
                           $(this).find(".childs").slideUp();
                       });
                   });
       });
   </script>