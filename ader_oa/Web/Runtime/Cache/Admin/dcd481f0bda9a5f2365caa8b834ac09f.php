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
  <form action="" method="post" class="form form-horizontal" id="form-member-add">
    <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">管理员姓名：</label>
      <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:31.5%">
        <select class="select" size="1" name="adminId" >
          <option value="" selected>请选择员工</option>
          <?php if(is_array($adminName)): foreach($adminName as $key=>$v): ?><option value="<?php echo ($v["uid"]); ?>"><?php echo ($v["oa_user_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        </span> </div>
    </div>
     <div class="row cl">
      <label class="form-label col-xs-4 col-sm-3">规则组名称：</label>
      <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:31.5%">
        <select class="select" size="1" name="groupTitle" >
          <option value="" selected>请选规则名称</option>
          <?php if(is_array($adminGroup)): foreach($adminGroup as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>
        </select>
        </span> </div>
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