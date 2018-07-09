<?php
namespace Admin\Controller;
// use Think\Controller;
use Common\Controller\AuthController;
class IntegralController extends AuthController 
{
	public function integral()
	{	
		$admin = M('admin');
		$result = $admin->select();
		$this->assign('result',$result);
		$this->display();
	}
	//添加员工积分明细
	public function touch_add()
	{
		if($_POST){
			$datetime = strtotime(I('post.datetime'));//触发时间
			$userId = I('post.userId');//用户名
			//加或减
			$score = I('post.score');//加或减
			$number = I('post.number');//分数
			$scoreNumber = $score.$number;//拼接后
			$operationName = session('auth.oa_user_name');//操作人
			$rules = I('post.beizhu');//触发规则
			$add_time = time();//录入时间
			if(!$datetime || !$userId || !$score || !$rules){
				$this->error('值不能为空');
			}
			if($score == '+'){
					$add_lost = 0; 
				}else{
					$add_lost = 1; 
				}
			$add_data = array(
				'oa_datetime' => $datetime,
				'oa_userid' => $userId,
				'oa_scoreNumber' => $scoreNumber,//分值
				'oa_operationName' => $operationName,
				'oa_rules' => $rules,
				'oa_add_lost' => $add_lost,
				'add_time' => $add_time,
				);
			$result = M('user_integral_list');
			$admin = M('admin');
			$where = "uid = '$userId'";
			$newScore = $admin->where($where)->getField('oa_score');//员工数值
			$data = $result->add($add_data);//添加规则信息
			if($data){
				if($score == '+'){
					$success = $newScore + $number; 
				}else{
					$success = $newScore - $number; 
				}				
				$admin->where("uid='$userId'")->setField('oa_score',$success);
				$this->success('添加成功');
			}			
		}
	}
	//奖惩列表
	public function integral_list()
	{
		//查询所有员工的总加分。减分。及总分
		$admin = M('admin');
		$count = M('user_integral_list');
		$newCount = $count->count('gid');
		$result = $admin->select();		
		foreach($result as $val){
			// var_dump($val);
			$uid = $val['uid'];
			// $admin = M('user_integral_list');
			/*$newData = M()->table('oa_admin as a')->join('oa_user_integral_list as b on b.oa_userid = a.uid')->where("a.uid = '$uid' AND oa_add_lost = '0'")->sum('oa_scoreNumber');*/
			$newData[] = M()->table('oa_admin as a')->join('oa_user_integral_list as b on b.oa_userid = a.uid')->where("a.uid = '$uid'")->select();
		}
		foreach($newData as $k => $v){
			if(empty($v)){
				unset($newData[$k]);
			}
		}
		/*var_dump($newData);
		die;*/
		$this->assign('newCount',$newCount);
		$this->assign('newData',$newData);
		$this->display();
	}
	//积分规则增加
	public function rules_add()
	{
		if($_POST){
			$operationName = session('auth.oa_user_name');//操作人
			$time = I('post.datetime');//添加时间
			$dateTime = strtotime($time);
			$score = I('post.score');//加、减
			if($score == '+'){
				$add_lost = 0;//0加、1减
			}else{
				$add_lost = 1;
			}
			$numBer = I('post.number');//分值
			$matters = I('post.matters');//事项
			$add_time = time();//增加时间
			if(!$dateTime || !$score || !$numBer || !$matters){
				$this->error('值不能为空');
			}
			$add_data = array(
				'oa_operation_name' => $operationName,
				'oa_date_time' => $dateTime,
				'oa_num_ber' => $numBer,
				'oa_matters' => $matters,
				'oa_add_time' => $add_time,
				'oa_add_lost' => $add_lost,
				);
			$result = M('integral');
			$data = $result->add($add_data);
			if($data){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->display();
		}
		

	}
	//删除已添加积分记录
	public function integral_delete()
	{
		if($_POST){
			$gid = I('post.id');
			$result = M('user_integral_list');
			$data = $result->where("gid='$gid'")->delete();
			if($data){
				echo 0;
			}else{
				echo 1;
			}
		}
		// $this->display();
	}
	//查看个人用户积=积分信息
	public function integral_user_list()
	{
		if($_GET){
			$uid = $_GET['uid'];
			$newZ['add_total'] = M()->table('oa_admin as a')->join('oa_user_integral_list as b on b.oa_userid = a.uid')->where("a.uid = '$uid' AND oa_add_lost = '0'")->sum('oa_scoreNumber');
			$newJ['less_total'] = M()->table('oa_admin as a')->join('oa_user_integral_list as b on b.oa_userid = a.uid')->where("a.uid = '$uid' AND oa_add_lost = '1'")->sum('oa_scoreNumber');
			//查询个人信息
			$admin = M('admin');
			$result = $admin->where("uid='$uid'")->find();
			$data = array_merge($result,$newZ, $newJ);
			$this->assign('data',$data);
			$this->display();
		}		
	}
	//积分查询柱状图
	public function integral_statistical()
	{	
		$this->display();	
	}
	//数据
	public function integral_shuju()
	{
		$model = M('admin');
		$result = $model->getField('oa_user_name,oa_score');
		$data['newKey'] = array_keys($result);
		$data['newValue'] = array_values($result);
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
	}
	//积分规则加分展示
	public function rules_list_jia()
	{
		$model = M('integral');
		$newAdd = $model->where("oa_add_lost= '0'")->select();
		$this->assign('newAdd',$newAdd);
		$this->display();
	}
	//删除加分规则
	public function rules_jia_delete()
	{
		if($_POST){
			$zid = I('post.id');
			$result = M('integral');
			$data = $result->where("zid='$zid'")->delete();
			if($data){
				echo 0;
			}else{
				echo 1;
			}
		}
	}
	//积分规则减分展示
	public function rules_list_jian()
	{
		$model = M('integral');
		$newAdd = $model->where("oa_add_lost= '1'")->select();
		$this->assign('newAdd',$newAdd);
		$this->display();
	}
	//删除减分规则
	public function rules_jian_delete()
	{
		if($_POST){
			$zid = I('post.id');
			$result = M('integral');
			$data = $result->where("zid='$zid'")->delete();
			if($data){
				echo 0;
			}else{
				echo 1;
			}
		}
	}	
}