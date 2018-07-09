<?php
namespace Admin\Controller;
// use Think\Controller;
use Common\Controller\AuthController;
class ToolController extends AuthController 
{
	//物品添加
	public function tool_add()
	{
		$admin = M('admin');
		$result = $admin->select();
		if($_POST){
			$toolName = I('post.toolName');//物品名称
			$toolNumber = I('post.toolNumber');//物品编号
			$theNumber = I('post.theNumber');//物品数量
			$toolPrice = I('post.toolPrice');//物品价格
			$buy = I('post.buyDatatime');
			$buyDatatime = strtotime($buy);//购买时间	
			//头像上传
  			$config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Public/photo/images/',
            'savePath'   =>    '',
            'autoSub'    => false,
            'saveName'   =>    time().'_'.mt_rand(),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            // 'subName'    =>  array('date','Ymd'),  
            // replace   => false,          
            );
  			$upload = new \Think\Upload($config);// 实例化上传类
	        $info = $upload->upload(array($_FILES['toolImg']));	       
	        if($info) {// 上传错误提示错误信息
	        	// $this->error($upload->getError());
	        	foreach($info as $file){
		         $str=$file['savename']; 

		        }
	        }else{              
                $str = 'moren1527662293.png';	        	
            }
	        $toolImg = $str;//物品图片名称
	        $toolState = I('post.toolState');//物品状态
	        $toolUseId = I('post.toolUseId');//物品使用人id
	        $comment = I('post.comment');//物品特殊情况
	        $operationName = session('auth.oa_user_name');//操作人
	        $tool_add_time = time();//录入时间
	        $add_datetime = date("Y-m-d H:i:s" ,time());//录入日期
	        if(!$toolName || !$theNumber || !$toolState){
	        	$this->error('物品名称、数量、状态不能为空');
	        }
	        $add_data = array(
	        	'oa_tool_name' => $toolName,
	        	'oa_tool_number' => $toolNumber,
	        	'oa_the_number' => $theNumber,
	        	'oa_tool_price' => $toolPrice,
	        	'oa_buy_datatime' => $buyDatatime,
	        	'oa_tool_img' => $toolImg,
	        	'oa_tool_state' => $toolState,
	        	'oa_tool_use_id' => $toolUseId,
	        	'oa_comment' => $comment,
	        	'oa_operation_name' => $operationName,
	        	'oa_tool_add_time' => $tool_add_time,
	        	'oa_add_datetime' => $add_datetime,
	        	);
	        $result = M('group_supplies');
	        $data = $result->add($add_data);
	        if($data){
	        	$this->success('添加成功');
	        }else{
	        	$this->error('添加失败');
	        }
		}else{
			$this->assign('result',$result);
			$this->display();
		}
	}
	//公司物品展示
	public function tool_list()
	{
		//查询所有员工的总加分。减分。及总分
		$admin = M('admin');
		$result = $admin->select();		
		foreach($result as $val){
			$uid = $val['uid'];
			$newData[] = M()->table('oa_group_supplies as a')->join('oa_admin as b on a.oa_tool_use_id = b.uid')->where("a.oa_tool_use_id = '$uid'")->select();
		}
		foreach($newData as $k => $v){
			if(empty($v)){
				unset($newData[$k]);
			}
		}
		//查询总条数
		$count = M('group_supplies');
		$newCount = $count->count('tid');
		$this->assign('newCount',$newCount);
		$this->assign('newData',$newData);
		$this->display();
	}
	//物品详情修改
	public function tool_update()
	{
		$admin = M('admin');
		$result = $admin->select();
		$tid = $_GET['tid'];
		$newData = M()->table('oa_group_supplies as a')->join('oa_admin as b on a.oa_tool_use_id = b.uid')->where("a.tid = '$tid'")->find();
		if($_POST){
			$toolName = I('post.toolName');//物品名称
			$toolNumber = I('post.toolNumber');//物品编号
			$theNumber = I('post.theNumber');//物品数量
			$toolPrice = I('post.toolPrice');//物品价格
			$buy = I('post.buyDatatime');
			$buyDatatime = strtotime($buy);//购买时间
			//头像上传
  			$config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Public/photo/images/',
            'savePath'   =>    '',
            'autoSub'    => false,
            'saveName'   =>    time().'_'.mt_rand(),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            // 'subName'    =>  array('date','Ymd'),  
            // replace   => false,          
            );
  			$upload = new \Think\Upload($config);// 实例化上传类
	        $info = $upload->upload(array($_FILES['toolImg']));	       
	        if($info) {// 上传错误提示错误信息
	        	// $this->error($upload->getError());
	        	foreach($info as $file){
		         $str=$file['savename']; 

		        }
	        }else{              
                $str = 'moren1527662293.png';	        	
            }
	        $toolImg = $str;//物品图片名称
			$toolState = I('post.toolState');//物品状态
	        $toolUseId = I('post.toolUseId');//物品使用人id
	        $comment = I('post.comment');//物品特殊情况
	        $operationName = session('auth.oa_user_name');//操作人
	        // $tool_add_time = time();//录入时间
	        $tool_update_time = time();//修改时间
	        // $add_datetime = date("Y-m-d H:i:s" ,time());//录入日期	
	        $update_data = array(
	        	'oa_tool_name' => $toolName,
	        	'oa_tool_number' => $toolNumber,
	        	'oa_the_number' => $theNumber,
	        	'oa_tool_price' => $toolPrice,
	        	'oa_buy_datatime' => $buyDatatime,
	        	'oa_tool_img' => $toolImg,
	        	'oa_tool_state' => $toolState,
	        	'oa_tool_use_id' => $toolUseId,
	        	'oa_comment' => $comment,
	        	'oa_operation_name' => $operationName,
	        	'oa_update_time' => $tool_update_time,
	        	// 'oa_tool_add_time' => $tool_add_time,
	        	// 'oa_add_datetime' => $add_datetime,
	        	);
	        $result = M('group_supplies');
	        $data = $result->where("tid='$tid'")->save($update_data);
	        if($data){
	        	$this->success('修改成功');
	        }else{
	        	$this->error('修改失败');
	        }
		}else{
			$this->assign('result',$result);
        	$this->assign('newData',$newData);
			$this->display();
		}
	}
	//物品删除
	public function tool_delete()
	{
		if($_POST){
			$tid = $_POST['tid'];
			$result = M('group_supplies');
			$data = $result->where("tid='$tid'")->delete();
			if($data){
				echo 0;
			}else{
				echo 1;
			}
		}
	}
}