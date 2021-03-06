<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<div class="formControls col-xs-8 col-sm-3"> 
             <select class="form-group" size="1" name="name" id="username">
     			<option value="" selected>请选择员工</option>
     			<?php if(is_array($newAdmin)): foreach($newAdmin as $key=>$v): ?><option value="<?php echo ($v["uid"]); ?>"><?php echo ($v["oa_user_name"]); ?></option><?php endforeach; endif; ?>
            </select>
       </div>
		<button type="submit" class="btn btn-success radius" id="button" name=""><i class="Hui-iconfont">&#xe665;</i> 数据查询</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <!-- <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> --> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<!-- <th width="25"><input type="checkbox" name="" value=""></th> -->
				<th width="40">ID</th>
				<th width="100">用户名</th>
				<th width="100">奖惩时间</th>
				<th width="">原因</th>
				<th width="150">分值</th>
				<th width="90">操作人</th>
				<th width="130">录入时间</th>
				<!-- <th width="70">状态</th> -->
				<!-- <th width="100">操作</th> -->
			</tr>
		</thead>
		<tbody class="J_tableTime">
			<?php if(is_array($newData)): foreach($newData as $key=>$val): if(is_array($val)): foreach($val as $key=>$v): ?><tr class="text-c">
					<!-- <td><input type="checkbox" value="1" name=""></td> -->
					<td><?php echo ($v["gid"]); ?></td>
					<td><?php echo ($v["oa_user_name"]); ?></u></td>
					<td><?php echo (date("Y-m-d",$v["oa_datetime"])); ?></td>
					<td><?php echo ($v["oa_rules"]); ?></td>
					<td><?php echo ($v["oa_scorenumber"]); ?>分</td>
					<td class="text-l"><?php echo ($v["oa_operationname"]); ?></td>
					<td><?php echo (date("Y-m-d",$v["add_time"])); ?></td>
					<!-- <td class="td-manage">
					<a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo ($v["gid"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td> -->
				</tr><?php endforeach; endif; endforeach; endif; ?>
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/ader_oa/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/ader_oa/Public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/ader_oa/Public/admin/lib/laypage/1.2/laypage.js"></script>
<!-- 时间查询替换html -->
<script type="text/javascript">
$("#button").click(function(){
	var newDatemin = $('#datemin').val();console.log(newDatemin);
	var newDatemax = $('#datemax').val();console.log(newDatemax);
	var newUsername = $('#username').val();console.log(newUsername);
	if(newDatemin == ''){
		alert("请选择开始时间");
		return false;
	}else if(newDatemax == ''){
		str1 = newDatemin.replace(/-/g,'/');			
		var Odate = new Date(str1);
		var startTime = Odate.getTime()/1000;
		var endTime = Date.parse( new Date())/1000;
				
	}else{
		str1 = newDatemin.replace(/-/g,'/');
		str2 = newDatemax.replace(/-/g,'/');
		var Odate = new Date(str1);
		var startTime = Odate.getTime()/1000;
		var Sdate = new Date(str2);
		var Time = Sdate.getTime()/1000;end = 86399;
		var endTime = Time + end;			
	}
	$.ajax({
		url :"<?php echo U('Oa/new_integral_list');?>",
		type :"post",
		data :{"startTime" : startTime,"endTime" : endTime,"newUsername" : newUsername},
		success : function (msg) {console.log(msg);
			var data = JSON.parse(msg);console.log(data);
			var html = '',array =data.array;
			/*for(var i = 0;i<array.length;i++){
				html += "<tr class='text-c'><td>"+array[i].gid +"</td>"+
				"<td>"+array[i].oa_user_name +"</td>"+
				"<td>"+timestampToTime(array[i].oa_datetime) +"</td>"+
				"<td>"+array[i].oa_rules +"</td>"+
				"<td>"+array[i].oa_scorenumber +"</td>"+
				"<td>"+array[i].oa_operationname +"</td>"+
				"<td>"+timestampToTime(array[i].add_time) +"</td></tr>";
			}
			if(html = ''){
				$('.J_tableTime').html('无数据');
			}else{
				$('.J_tableTime').html(html);
			}*/
		    for( var i = 0;i<array.length;i++){
					html += "<tr class='text-c'><td>"
					+array[i].gid+"</td>"+
					"<td>"+array[i].oa_user_name+"</td>"+

					"<td>"+timestampToTime(array[i].oa_datetime)+"</td>"+
					"<td>"+array[i].oa_rules+"</td>"+
					"<td>"+array[i].oa_scorenumber+"</td>"+

					"<td>"+array[i].oa_operationname+"</td>"+

					"<td>"+timestampToTime(array[i].add_time)+"</td></tr>";
			}
			if( html == ''){
				$('.J_tableTime').html('无数据');
			}else{
				$('.J_tableTime').html(html);
			}                                   
        }
	});	
});
function timestampToTime(timestamp) {
    var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
    Y = date.getFullYear() + '-';
    M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
    D = date.getDate() + ' ';
    h = date.getHours() + ':';
    m = date.getMinutes() + ':';
    s = date.getSeconds();
    return Y+M+D;
}

$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 0, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[1,3,4,5]}// 制定列不参与排序
		]
	});
	
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	url = '/ader_oa/home/Integral/integral_user_list?uid='+id;
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){console.log(id);
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/ader_oa/home/Integral/integral_delete',
			data:{"id":id},
			dataType: 'json',
			success: function(data){console.log(data);
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script> 
</body>
</html>