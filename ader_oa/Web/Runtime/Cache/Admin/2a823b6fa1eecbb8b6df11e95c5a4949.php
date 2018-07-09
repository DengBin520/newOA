<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/ader_oa/Public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/ader_oa/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/ader_oa/Public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/ader_oa/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/ader_oa/Public/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>ADER营销OA管理</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="../Integral/touch_add" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>日期</label>
			<div class="formControls col-xs-8 col-sm-3"> 				
	   			<input type="text" onfocus="WdatePicker()" id="date" name="datetime" class="input-text Wdate" value="">	   
	   		</div>
	   	</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">姓名：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:31.5%">
				<select class="select" size="1" name="userId" >
					<option value="" selected>请选择员工</option>
					<?php if(is_array($result)): foreach($result as $key=>$v): ?><option value="<?php echo ($v["uid"]); ?>"><?php echo ($v["oa_user_name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">分值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="score" style="width:8%">
					<option value="" selected>请选择</option>
					<option value="+" >加</option>
					<option value="-" >减</option>
				</select>
				<input type="text" class="input-text" value="" placeholder="" id="number" name="number" style="width:20%;" />
				分
				<!-- <input type="button" value="-" class="jian">
				<span class="num">0</span>
				<input type="button" value="+" class="add"> -->
			</div>
		</div>
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
				 <input type="button" value="-" id="subtraction" onclick="subtraction()"></input>
				     			<input type="text" value="1" id="number" onBlur="number()"></input>
				     			<input type="button" value="+" id="add" onclick="add()"></input><br>
		    			<input type="button" value="-" class="jian">
		    							<span class="num">0</span>
		    							<input type="button" value="+" class="add">
			</div>
		</div> -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">规则：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="beizhu" cols="" rows="" class="textarea"  placeholder="填写相应的规则..." ></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script>

    //加的效果
	$(".add").click(function(){
	    var n=$(this).prev().html();
	    var num=parseInt(n)+1;
	    if(num==0){ return;}
	    $(this).prev().html(num);
	});
	//减的效果
	$(".jian").click(function(){
	    var n=$(this).next().html();
	    var num=parseInt(n)-1;
	    if(num==0){ return}
	    $(this).next().html(num);
	});

</script>
<script type="text/javascript">
	/*//减
	function subtraction(){
            //获取-号按钮
            var subtraction = document.getElementById("subtraction");
            //获取文本框
            var number = document.getElementById("number");
            if (number.value<=1) {
                //如果文本框的值小于1,则设置值为1
                number.value = 1;
            }else {
                number.value = number.value - 1;
            }
        }
    //文本框
    function number(){
            var number = document.getElementById("number");
            var value = number.value;
            //如果文本值为空,设置为1
            if (value=="") {
                number.value = 1;
            }
            //如果文本值为非纯数字,设置为1
            //isNaN()是否为非法数字
            if (isNaN(value)) {
                number.value = 1;
            }
            //如果文本值小于1,设置为1
            if (parseInt(value)<=1) {
                number.value = 1;
            }
        }
    //加
    function add(){
            var add = document.getElementById("add");
            var number = document.getElementById("number");
            //parseInt() 将数值型字符串转换为数值
            number.value = parseInt(number.value)+1;
        }*/
(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			uploadfile:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>