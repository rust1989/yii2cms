$(function(){
	var scriptPath = function () {
	    var scripts = document.getElementsByTagName('SCRIPT');
	    var path = '';
	    if(scripts && scripts.length>0) {
	        for(var i in scripts) {
	        	if(i==0){
	        		var src=scripts[i].src;
		            if(src&&/\.js$/.test(src)) {
		                path=src.substring(0,src.lastIndexOf("/")+1);
		            }
	        	}
	        }
	    }
	    return path;
	};

  var JSPATH=scriptPath();
  //Enable sidebar toggle
  $("[data-toggle='offcanvas']").click(function(e) {
    e.preventDefault();
    //If window is small enough, enable sidebar push menu
    if ($(window).width() <= 992) {
      $('.row-offcanvas').toggleClass('active');
      $('.left-side').removeClass("collapse-left");
      $(".right-side").removeClass("strech");
      $('.row-offcanvas').toggleClass("relative");
    } else {
      //Else, enable content streching
      $('.left-side').toggleClass("collapse-left");
      $(".right-side").toggleClass("strech");
    }
  });

  var uploadWidget=$("[data-widget='uploadPic']");
  if(uploadWidget.length){
   // tool.loadScript(JSPATH+"jquery-ui-1.10.3.min.js,"+JSPATH+"jquery.ui.widget.js,"+JSPATH+"jquery.fileupload.js",function(){
      uploadWidget.each(function() {
        var id=$(this).attr('id');
        var url=$(this).data('url');
        var key=$(this).data('key');
        var img=$(this).data('img');
        if(typeof img!='undefined'){
        	 tool.showPic("#"+key,img);
        }
        var file=$(this).data('file');
        if(typeof file!='undefined'){
        	 tool.showFile("#"+key,file);
        }
        if(typeof id!="undefined"){
          tool.uploadFile(url,"#"+id,"#"+key,'',file);
        }
      });
   // });
  }
  var editorWidget=$("[data-widget='editor']");
  if(editorWidget.length){
    //tool.loadScript(JSPATH+"kindeditor/kindeditor-min.js",function() {
        KindEditor.ready(function(K) {
          editorWidget.each(function () {
                var id = $(this).attr('id');
                console.log(id);
                if (typeof id != "undefined") {
                    var obj="#"+id;
                    K.create(obj, {
                      resizeType: 1,
                      allowPreviewEmoticons: false,
                      allowImageUpload: true,
                      afterBlur:function(){this.sync();}
                    });
                }
              });
        });
    //});
  }
 var dateWidget=$("[data-widget='dateTime']");
  if(dateWidget.length){
      tool.loadScript(JSPATH+"bootstrap-datepicker/bootstrap-datepicker.js,"+JSPATH+"bootstrap-datepicker/bootstrap-datepicker3.standalone.css",function(){
          dateWidget.each(function() {
            var id=$(this).attr('id');
            var format=$(this).data('format');
            var istime=$(this).data('time')||false;
            if(typeof id!="undefined"){
              tool.date("#"+id,format,istime);
            }
          });
      });
  }
 /*=================================================================*/
 $("#selectAll").each(function(){
	 $(this).click(function(event){
		  var widget=$(this).data('widget');
		  if(typeof widget!='undefined'&&$(widget).length){
			  var childs=$(widget).find('.list-checkbox');
			  if(childs.length){
				  childs.prop('checked', !childs.prop('checked'));
			  }
		  }
	 });
 }); 
 $("#orderAll").each(function(){
	 $(this).click(function(event){
			  event.preventDefault();
			  var url=$(this).attr("href");
			  var table=$(this).data("table");
			  var widget=$(this).data('widget');
			  if(typeof widget!='undefined'&&$(widget).length){
				  var childs=$(widget).find('.list-checkbox:checked');
				  
				  var checked=[];
				  if(childs.length){
					  var sortobj=$(widget).find(".input-order");
					  childs.each(function(index,child){
						  var id=$(this).val();
						  //var index=$(this).index();
						  var sort=sortobj.eq(index).val();
						  if(typeof id!='undefined'&&id&&typeof sort!='undefined'&&sort){
							   checked.push(id+"-"+sort);
						  }
					  });
					  if(checked.length){
						  var token=$("#_csrf-backend").val();
						  var ids=checked.join(',');
				    	  $.post(url,{id:ids,'_csrf-backend':token,'table':table},function(data){
					    	tool.showResponse(data);
					      });
					  }else{
						  tool.msg('请选择排序项');
					  }
				  }else{
					  tool.msg('请选择排序项');
				  }
			  }
		    
	 });		    
 });
 $("#deleteAll").each(function(){
	  $(this).click(function(event){
		    event.preventDefault();
		    var url=$(this).attr("href");
		    var table=$(this).data("table");
		    var widget=$(this).data('widget');
			  if(typeof widget!='undefined'&&$(widget).length){
				  var childs=$(widget).find('.list-checkbox:checked');
				  var checked=[];
				  if(childs.length){
					  childs.each(function(child){
						  var id=$(this).val();
						  if(typeof id!='undefined')checked.push(id);
					  });
					  if(checked.length){
						  var ids=checked.join(',');
						  var token=$("#_csrf-backend").val();
						  
						  tool.confirm('确定删除此纪录?','删除操作',0.2,function(){
						    	$.post(url,{id:ids,'_csrf-backend':token,'table':table},function(data){
							    	tool.showResponse(data);
							    });
						    }); 
					  }else{
						  tool.msg('请选择删除项');
					  }
				  }else{
					  tool.msg('请选择删除项');
				  }
			  }
		    
		    
	  });
 });
 $(".delbtn").each(function(){
	  $(this).click(function(event){
		    event.preventDefault();
		    var url=$(this).attr("href");
		    console.log(url);
		    tool.confirm('确定删除此纪录?','删除操作',0.2,function(){
		    	$.get(url,function(data){
			    	tool.showResponse(data);
			    });
		    });
	  });
  });
  $("#logout").click(function(event){
	    event.preventDefault();
	    var parent=$(this).parents('form');
	    var url=parent.attr("action");
	    var data=parent.serialize();
	    console.log(url);
	    console.log(data);
	    $.post(url,data,function(data){
	    	tool.showResponse(data);
	    });
  });
  
})
