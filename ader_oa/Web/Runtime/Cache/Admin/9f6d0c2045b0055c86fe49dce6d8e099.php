<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<title>用户查看</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img class="avatar size-XL l" src="/ader_oa/Public/photo/images/<?php echo ($data["oa_img"]); ?>">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18"><?php echo ($data["oa_user_name"]); ?></span>
			<!-- <span class="pl-10 f-12">余额：40</span> -->
		</dt>
		<dd class="pt-10 f-12" style="margin-left:0"><?php echo ($data["oa_notes"]); ?></dd>
	</dl>
</div>
<div class="pd-20">
	<table class="table">
		<tbody>
			<tr>
				<th class="text-r" width="80">账户：</th>
				<td><?php echo ($data["oa_user"]); ?></td>
			</tr>
			<tr>
				<th class="text-r">职位：</th>
				<td><?php echo ($data["oa_position"]); ?></td>
			</tr>
			<tr>
				<th class="text-r">共加积分：</th>
				<td><?php echo ($data["add_total"]); ?>分</td>
			</tr>
			<tr>
				<th class="text-r">共减积分：</th>
				<td><?php echo ($data["less_total"]); ?>分</td>
			</tr>
			<tr>
				<th class="text-r">目前积分：</th>
				<td><?php echo ($data["oa_score"]); ?>分</td>
			</tr>
			<tr>
				<th class="text-r">入职时间：</th>
				<td><?php echo ($data["oa_add_date"]); ?></td>
			</tr>
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
</body>
</html>