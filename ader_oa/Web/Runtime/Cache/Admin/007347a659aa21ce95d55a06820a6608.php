<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title>ADER营销OA管理</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" method="post" action="" enctype="multipart/form-data">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>员工账户：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($data["oa_user"]); ?>" placeholder="" id="adminUser" name="adminUser">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>员工姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="<?php echo ($data["oa_user_name"]); ?>" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="sex" type="radio" id="sex-1" value="0" <?php if($data["oa_sex"] == 0): ?>checked=""<?php endif; ?>>
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="sex" value="1" <?php if($data["oa_sex"] == 1): ?>checked=""<?php endif; ?>>
				<label for="sex-2">女</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($data["oa_tel"]); ?>" placeholder="" id="phone" name="phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email" value="<?php echo ($data["oa_email"]); ?>">
		</div>
	</div>
  <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>入职时间</label>
      <div class="formControls col-xs-8 col-sm-3">        
          <input type="text" onfocus="WdatePicker()" id="date" name="datetime" class="input-text Wdate" value="<?php echo (date('Y-m-d',$data["oa_entry_time"])); ?>">    
        </div>
      </div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职位：</label>
		<div class="formControls col-xs-8 col-sm-9"> 
      <span class="select-box" style="width:150px;">
        <select class="select" size="1" name="position">
          <option value="" selected>请选择职位</option>
          <option value="电商客服" <?php if($data["oa_position"] == '电商客服'): ?>selected=""<?php endif; ?>>电商客服</option>
          <option value="电商销售" <?php if($data["oa_position"] == '电商销售'): ?>selected=""<?php endif; ?>>电商销售</option>
          <option value="电商运营" <?php if($data["oa_position"] == '电商运营'): ?>selected=""<?php endif; ?>>电商运营</option>
          <option value="SEM" <?php if($data["oa_position"] == 'SEM'): ?>selected=""<?php endif; ?>>SEM</option>
          <option value="美工设计" <?php if($data["oa_position"] == '美工设计'): ?>selected=""<?php endif; ?>>美工设计</option>
          <option value="程序员" <?php if($data["oa_position"] == '程序员'): ?>selected=""<?php endif; ?>>程序员</option>
          <!-- <option value="普通员工">普通员工</option> -->
        </select>
			</span> 
      </div>
	</div>

  <div class="row cl">
    <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像：</label>
      <div class="formControls col-xs-8 col-sm-9">
        <input type="file" class="" name="photo" multiple value="<?php echo ($data["oa_img"]); ?>">
      </div>
  </div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="notes" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" value=""><?php echo ($data["oa_notes"]); ?></textarea>
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
<script type="text/javascript" src="/ader_oa/Public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">

/*$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "xxxxxxx" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000});
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});*/
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>