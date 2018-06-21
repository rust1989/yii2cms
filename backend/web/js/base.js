var tool={
  isInclude:function(name){
    var js= /js$/i.test(name);
    var es=document.getElementsByTagName(js?'script':'link');
    for(var i=0;i<es.length;i++)
      if(es[i][js?'src':'href'].indexOf(name)!=-1)return true;
    return false;
  },
  uploadFile:function(uploadurl,btn,input,callback,kind){
            //插件jquery.fileupload.js
            jQuery(btn).fileupload({
              url: uploadurl,
              dataType: 'json',
              done: function (e, data) {
                var file=data.result;
                if(file['code']==0){
                   tool.msg(file['msg']);
                }else{
                    var pic=file['data']['path'];
                    console.log(input);
                    jQuery(input).val(pic);
                    
                    if(typeof kind!='undefined'){ 
                        tool.showFile(input,pic);
                    }
                    if(typeof callback=='function'){
                      callback(input,pic);
                    }
                }
              },
              progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                console.log("============progressall===============");
                console.log(progress);
                tool.showProcess(input,progress);
              }
            }).bind('fileuploadadd',function(e,data){
                  var file=data['files'][0];
                  var url = null;
                  console.log(data);
                  if (window.createObjectURL != undefined) {
                    url = window.createObjectURL(file);
                  } else if (window.URL != undefined) {
                    url = window.URL.createObjectURL(file);
                  } else if (window.webkitURL != undefined) {
                    url = window.webkitURL.createObjectURL(file);
                  }
                  console.log("============fileuploadadd===============");
                  console.log(url);
                  //if(/.(gif|jpg|jpeg|png|gif|jpg|png)$/.test(url)){
                 
                  if(typeof kind=='undefined'||kind==''){ 
                      tool.showPic(input,url);
                  }
          }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

  },
  showPic:function(obj,pic){
    if(typeof obj=='undefined'||typeof pic=='undefined')return false;
    var obj=jQuery(obj);
    var parent=obj.parent("div");
    var check=parent.find(".showPic");
    if(check.length){
    	check.find(".img-thumbnail").attr('src',pic);
    }else{
	    var html='<p></p><span class="label showPic"><img src="'+pic+'" class="img-thumbnail"  style="max-width:100px !important;"></span>';
	    parent.append(html);
    }
  },
  showFile:function(obj,pic){
	    if(typeof obj=='undefined'||typeof pic=='undefined')return false;
	    var obj=jQuery(obj);
	    var parent=obj.parent("div");
	    var check=parent.find(".showPic");
	    if(check.length){
	    	check.html(pic);
	    }else{
		    var html='<p></p><span class="label showPic" style="color:#000;">'+pic+'</span>';
		    parent.append(html);
	    }
	},
  showProcess:function(obj,progress){
    if(typeof obj=='undefined'||typeof progress=='undefined')return false;
    var obj=jQuery(obj);
    var parent=obj.parent("div");
    var child=parent.find(".showProcessTxt");
    if(child.length){
      // child.find(".progress-bar").css({width:progress+'%'});
       parent.find(".showProcessTxt").html(progress+'%');
    }else{
      //parent.append('<div class="progress xs progress-striped active showProcess" style="width:140px;display: inline-block;margin-bottom:0px;"><div class="progress-bar progress-bar-primary " style="width:'+progress+'%"></div></div>');
      parent.append('<span class="showProcessTxt badge bg-light-blue">'+progress+'%</span>');
    }
  },
  dynamicLoadJs:function(url, callback) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    if(typeof(callback)=='function'){
      script.onload = script.onreadystatechange = function () {
        if (!this.readyState || this.readyState === "loaded" || this.readyState === "complete"){
          callback();
          script.onload = script.onreadystatechange = null;
        }
      };
    }
    document.body.appendChild(script);
  },
  dynamicLoadCss:function(url,callback) {
    var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.type='text/css';
    link.rel = 'stylesheet';
    link.href = url;
    head.appendChild(link);
    callback();
  },
  loadScript:function(urls, callback) {
          var self=this;
          urls=urls.split(",");
          if(urls.length){
                var len=urls.length;
                var index=1;
                urls.forEach(function(url){
                      if(!self.isInclude(url)){
                        var isJs=/js$/i.test(url);
                        if(isJs){
                            self.dynamicLoadJs(url,function(){
                              if(len==index)callback();
                              index++;
                            });
                        }else{
                            self.dynamicLoadCss(url,function(){
                                if(len==index)callback();
                                index++;
                            });
                        }
                      }else{
                         index++;
                      }
                });
          }

  },
	delCookie:function(name)
	{
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval=tools.getCookie(name);
	if(cval!=null)
	document.cookie= name + "="+cval+";expires="+exp.toGMTString();
	},
	setCookie:function(name,value)
	{
	var Days = 30;
	var exp = new Date();
	exp.setTime(exp.getTime() + Days*24*60*60*1000);
	document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
	},
	getCookie:function(name)
	{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
	},
	tooltip:function(el,msg){
		
	    if(typeof more=='undefined')more=true;
		if(typeof direction=='undefined')direction=3;
		
		layer.tips(msg,el, {
			tipsMore:more,
			time: 6000,
			tips: [direction,'#e50112'] 
		});
   },
   tipError:function(errorMap,errorList){
  		 console.log(errorList);
  		 if(errorList.length){
  			 errorList.forEach(function(item){
  				  console.log($(item['element']));
  				  tool.tooltip(item['element'],item['message']);
  			});
  		 }
     },
	 slick:function(obj,option){
		 var allOption=$.extend({
			  autoplay:true,
              autoplaySpeed:1000,
              swipe: false,
              arrows:false,
              dots:false,
              fade:true,
              speed:500,
              pauseOnHover:false,
              slidesToShow:1,
              slidesToScroll:1
		 },option||{});
         jQuery(obj).slick(allOption);
     },
	date:function(startobj,date_format){
    if(typeof date_format=='undefined')date_format='yyyy-mm-dd';
	var start = {
		    elem:startobj
		};
        laydate(start);
	},
	dateTodate:function(startobj,endobj,date_format,istime,min,max){
		if(typeof date_format=='undefined')date_format='DD/MM/YYYY';
		if(typeof istime=='undefined')istime=true;
		if(typeof min=='undefined')min=false;
		if(typeof max=='undefined')max='2099-06-16 23:59:59';
		var start = {
		    elem:startobj,
		    format:date_format,
		    min: min, //设定最小日期为当前日期
            max: max, //最大日期
		    istime:istime,
		    istoday: false,
		    choose: function(datas){
		         end.min = datas; //开始日选好后，重置结束日的最小日期
		         end.start = datas //将结束日的初始值设定为开始日
		    }
		};
		var end = {
		    elem:endobj,
		    format:date_format,
		    min:min, //设定最小日期为当前日期
            max:max, //最大日期
		    istime:istime,
		    istoday: false,
		    choose: function(datas){
		        start.max = datas; //结束日选好后，重置开始日的最大日期
		    }
		};
		laydate(start);
		laydate(end);
	},
	loading:function(msg){
		if(typeof msg=='undefined'||msg=='')msg=''; 
		layer.msg('加载中', {icon: 16});
	},
	closeloading:function(){
		setTimeout(function(){
			  layer.closeAll('loading');
		}, 2000);
	},
	showResponse:function (data){
	     tool.msg(data.msg,3000,0.2,function(){
	    	 if(data.code==1){
					window.location.href=data.url;
			 }
	     }); 	
	},
	msg:function(msg,time,shade,callback){
		if(typeof msg=='undefined')return false;
		if(typeof time=='undefined'||time=='')time=3000;
		if(typeof shade=='undefined')shade=0;
		layer.msg(msg, {
			  time:time //2秒关闭（如果不配置，默认是3秒）
			  ,shade:shade
			}, function(){
			  //do something
				if(typeof callback!='undefined')callback();
		}); 
	},
	delItem:function(msg,url,title){
		if(typeof title=='undefined')title='刪除提示';
		tool.confirm(msg,title,0.2,function(index){
			$.get(url,function(data){
				 layer.close(index);
				 tool.msg(data.info,3000,0.2,function(){
			    	 if(data.status==1){
							window.location.href=data.url;
					 }
			     }); 
			});
		});
	},
	confirm:function(msg,title,shade,callback){
		if(typeof msg=='undefined')return false;
		if(typeof shade=='undefined')shade=0.2;
		if(typeof title=='undefined')title='提示';
		layer.confirm(msg, {shade:shade, title:title}, function(index){
			  //do something
			if(typeof callback!='undefined')callback();
			  layer.close(index);
		});
		
		/*layer.msg(msg, {
			  time: 0, //不自动关闭
			  title:title,
			  shade:shade
			  ,btn: ['確定', '取消']
			  ,yes: function(index){
			    if(typeof callback!='undefined')callback(index);
			  }
			});*/
		
	},
	commonForm:function(form,rules,messages,showErrors,submitHandler,success){
		if(typeof form=='undefined')return false;
		if(typeof showErrors=='undefined'||showErrors=='')showErrors=false;
		if(typeof success!='function')success=tool.showResponse;
		
		
		jQuery(form).validate({
			 debug:false,
			 onfocusout:false,
			 onkeyup:false,
			 onclick:false,
			 rules:rules,
			 messages:messages,
			 showErrors:showErrors,
			 submitHandler:function(form){
				 if(typeof submitHandler=='function'){
					 submitHandler();
				 }
				 var options={
				  		  success:success
				 };
				 jQuery(form).ajaxSubmit(options);
				 
			 }
		 });
	},
	popup:function(title,url,area,callback,option){
        var callbackInvoke=false;
		var fn = function(result){
			callbackInvoke=true;
			callback(result);
			layer.close(index);
		}
	
		var o = $.extend({
			 content:url,
			 type:2,
			 area:area,
			 title:title,
	         shadeClose: true,
	         shade: 0.8,
			 success:function(){
				 var iframe = $('#layui-layer-iframe'+index)[0];
				 iframe.contentWindow.callbackSelector = fn;
				 $(iframe).on('load',function(){
					 iframe.contentWindow.callbackSelector = fn;
				 });
			 },
			 end:function(){
				if(!callbackInvoke) callback();
		}},option||{});
		console.log(o);
		if(!o.area) o.area = ['800px','500px'];
		var index = layer.open(o);
        
  }
};
