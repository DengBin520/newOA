<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<link rel="stylesheet" type="text/css" href="/ader_oa/Public/css/index.css"/>
<!-- 日历控件css -->
<link rel="stylesheet" href="/ader_oa/Public/css/calendar.css">
<style type="text/css">
html {
	font: 500 14px 'roboto';
	color: #333;
	background-color: #fafafa;
}
a {
	text-decoration: none;
}
ul, ol, li {
	list-style: none;
	padding: 0;
	margin: 0;
}
.calenda_right .calenda #demo {
	width: 364px;
	height:350px;
}
p {
	margin: 0;
}
</style>
<!-- 日历cssEND -->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>ADER营销OA管理</title>
</head>
<body>
	<header >
		<!-- 头部开始 -->
<div class="head_top">
	<div class="loog_le"><a href="/ader_oa/home/index"><img src="/ader_oa/Public/photo/images/logoa1.jpg"/></a></div>
	<ul class="top_ri">
		<li><span>welcome ! <a href="#"><?php echo ($_SESSION["adoa_user_name"]); ?></a></span></li>
		<li>|</li>
		<li><a href="/ader_oa/home/Login/user_password_edit" target="value">修改密码</a></li>

		<li>|</li>
		<li <?php if($_SESSION['oa_user_admin'] != 1 ): ?>style="display:none"<?php endif; ?>><a href="/ader_oa/Admin/Login/login" target="value">管理员</a></li>
		<li <?php if($_SESSION['oa_user_admin'] != 1 ): ?>style="display:none"<?php endif; ?>>|</li>
		<li><a href="/ader_oa/home/Login/retreat">Logout</a></li>
	</ul>
</div>
	</header>
	<!-- content -->
	<div class="content">
		<div class="banner_left">
			<div class="news">
				<span>站内新闻</span>
				<span class="zhannei"><img src="/ader_oa/Public/photo/images/28.png"/><a><b>MORE</b></a>>></span>
			</div>
			<div class="padding-banner">
				<div class="banner_img"><img src="/ader_oa/Public/photo/images/regist.jpg"/></div>
			</div>
		</div>
		<div class="calenda_right">
			<span>日历表</span>
			<div class="calenda">
				<div id="demo">
				  <div id="ca"></div>
				</div>
			</div>
			
		</div>
		<!-- 左 -->
		<div class="channel">
			<div class="channel_span"><span >快速通道</span></div>
			
			<div class="fast_channel">
				<ul>
					<li><a href="" target="value"><img src="/ader_oa/Public/photo/images/19.png"/><p>OA</p></a></li>
					<li><a href="" target="value"><img src="/ader_oa/Public/photo/images/19.png"/><p>Admin</p></a></li>
				
				</ul>
				<ul>
					<li><a href="http://crm.iader.com.cn/" target="value"><img src="/ader_oa/Public/photo/images/19.png"/><p>CRM</p></a></li>
					<li><a href="http://crm.iader.com.cn/" target="value"><img src="/ader_oa/Public/photo/images/19.png"/><p>CRM</p></a></li>				
				</ul>
			</div>
		</div>
		<!-- 中间 -->
		<div class="data">
			
				<div class="see_data">
					<span class="span">信息展示</span>
					<span class="data_ri"><img src="/ader_oa/Public/photo/images/28.png"/><a><b>MORE</b>>></a></span>
				</div>
				<div class="module">
					<ul>
						<li><a href="/ader_oa/home/Index/list"><img src="/ader_oa/Public/photo/images/24.png"/><p>公司财务</p></a></li>
						<li><a href="/ader_oa/home/Index/list"><img src="/ader_oa/Public/photo/images/25.png"/><p>积分信息</p></a></li>
						<li><a href="/ader_oa/home/Index/list"><img src="/ader_oa/Public/photo/images/26.png"/><p>项目分配</p></a></li>
						<li><a href="/ader_oa/home/Index/list"><img src="/ader_oa/Public/photo/images/27.png"/><p>规章制度</p></a></li>
					</ul>
				</div>
			
			<div class="record">
				<div class="see_data">
					<span class="span">信息展示</span>
					<span class="data_ri"><img src="/ader_oa/Public/photo/images/28.png"/><a><b>MORE</b>>></a></span>
				</div>
				<div class="integral">
					<ul>
						<?php if(is_array($result)): foreach($result as $key=>$v): ?><li><p>[ <?php echo ($v["oa_scorenumber"]); ?> ]&nbsp-&nbsp<?php echo ($v["oa_operationname"]); ?>&nbsp-&nbsp<?php echo ($v["oa_rules"]); ?></p><span><?php echo (date("Y-m-d",$v["oa_datetime"])); ?></span></li>
						<li class="bottom"></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- 右侧 -->
		<div class="user">
			<span class="spanI">与我相关</span>
			<div class="border_A">
				<div class="user_list">
					<img src="/ader_oa/Public/photo/images/<?php echo ($newArray['oa_img']); ?>"/>
					<ul>
						<li>&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#303337;"><?php echo ($newArray['oa_user_name']); ?></b></li>
						<li>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($newArray['oa_position']); ?></li>

						<li></span>入职：<?php echo (date("Y-m-d",$newArray['oa_entry_time'])); ?></li>
						<li>上海驻驿网络科技有限公司</li>
						<li class="bottom_A"></li>
					</ul>				
				</div>
				
				<div class="personal">
					<div class="left_A">
						<ul >
							<li><span class="span1"><?php echo ($newArray['jia_sum']); ?></span><br /><span class="span_size">总加分</span></li>
							<li style="border:1px solid #CDDCFF;"><span class="span1"><?php echo ($newArray['jian_sum']); ?></span><br /><span class="span_size">总减分</span></li>
					
						</ul>
					</div>
					
					<div class="right_B">
						<ul >
							<li><span class="span2"><?php echo ($newArray['ranking']); ?></span><span class="span2_size">积分排名</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<!-- <script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> -->
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!-- <script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui/js/H-ui.min.js"></script> -->
<!-- <script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>  -->
<!-- 日历控件 -->
<script src="/ader_oa/Public/js/jquery.js"></script> 
<script src="/ader_oa/Public/js/calendar.js"></script> 
<!-- <script type="text/javascript" src="/ader_oa/Public/js/simple-calendar.js"></script> -->
<!-- <script src="/ader_oa/Public/js/jquery.min.js"></script>  -->

<!-- <script>
    var myCalendar = new SimpleCalendar('#container');
    myCalendar.updateSize('800px', '500px');
</script> -->
<script>
    $('#ca').calendar({
        width: 364,
        height: 284,
        data: [
			{
			  date: '2015/12/24',
			  value: 'Christmas Eve'
			},
			{
			  date: '2015/12/25',
			  value: 'Merry Christmas'
			},
			{
			  date: '2016/01/01',
			  value: 'Happy New Year'
			}
		],
        onSelected: function (view, date, data) {
            console.log('view:' + view)
            // alert('date:' + date)
            console.log('data:' + (data || 'None'));
        }
    });

    /*$('#dd').calendar({
        trigger: '#dt',
        zIndex: 999,
		format: 'yyyy-mm-dd',
        onSelected: function (view, date, data) {
            console.log('event: onSelected')
        },
        onClose: function (view, date, data) {
            console.log('event: onClose')
            console.log('view:' + view)
            console.log('date:' + date)
            console.log('data:' + (data || 'None'));
        }
    });*/
</script>

<!-- 日历end -->
<script type="text/javascript">
$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
</script> 

</body>
</html>