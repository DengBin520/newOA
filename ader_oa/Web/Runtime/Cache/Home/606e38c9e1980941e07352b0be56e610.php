<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/css3pie/2.0beta1/PIE_IE678.js"></script>
<![endif]-->
<link type="text/css" rel="stylesheet" href="/ader_oa/Public/admin/static/h-ui/css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="/ader_oa/Public/admin/static/H-ui.admin/css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="/ader_oa/Public/admin_static/css/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="http://www.bootcss.com/p/font-awesome/assets/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<title>修改密码</title>
</head>
<body>
<div class="pd-20">
  <form class="Huiform" action="../Login/user_password_edit" method="post">
    <table class="table">
      <tbody>
        <tr>
          <th width="100" class="text-r"><span class="c-red">*</span>原始密码：</th>
          <td><input type="password" style="width:200px" class="input-text" value="" id="teacher-new-password" name="ypwd"></td>
        </tr>
        <tr>
          <th width="100" class="text-r"><span class="c-red">*</span>新密码：</th>
          <td><input type="password" style="width:200px" class="input-text" value="" id="teacher-new-password" name="password"></td>
        </tr>
        <tr>
          <th class="text-r"><span class="c-red">*</span> 确认密码：</th>
          <td><input type="password" style="width:200px" class="input-text" value="" id="teacher-new-password2" name="pwd"></td>
        </tr>
        <tr>
          <th></th>
          <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 确定</button></td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/static/H-ui.admin/js/H-ui.admin.js"></script>
<!-- <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script> -->
</body>
</html>