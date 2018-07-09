<?php
namespace Admin\Controller;
// use Think\Controller;
use Common\Controller\AuthController;
class ProjectController extends AuthController 
{
	public function project_add()
	{
		$admin = M('admin');
		$newName = $admin->select();
		if($_POST){
			$projectName = I('post.projectName');//项目名称
			$companyUrl = I('post.companyUrl');//公司网址
			$customerName = I('post.customerName');//客户姓名
			$customerTel = I('post.customerTel');//客户电话
			$toolUseId = I('post.toolUseId');//项目负责人ID
			$addtime = I('post.projectAddtime');
			$projectAddtime = strtotime($addtime);//项目开始日期
			$endtime = I('post.projectEndtime');
			$projectEndtime = strtotime($endtime);//项目结束日期
			$location = I('post.location');//项目进度
			$comment = I('post.comment');//项目备注
			$addtime = time();//录入时间
			if(!$projectName || !$customerName || !$projectAddtime || !$projectEndtime){
				$this->error('项目名称、客户名称、开始、结束时间不能为空');
			}
			$add_data = array(
				'oa_project_name' => $projectName,
				'oa_company_url' => $companyUrl,
				'oa_customer_name' => $customerName,
				'oa_customer_tel' => $customerTel,
				'oa_head_id' => $toolUseId,
				'oa_project_add_time' => $projectAddtime,
				'oa_project_end_time' => $projectEndtime,
				'oa_location' => $location,
				'oa_comment' => $comment,
				'oa_add_time' => $addtime,
				);
			$model = M('project_count');
			$data = $model->add($add_data);
			if($data){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->assign('newName',$newName);
			$this->display();
		}
	}
	//项目展示
	public function project_list()
	{
		$admin = M('admin');
		$result = $admin->select();
		foreach($result as $val){
			$uid = $val['uid'];
			$newData[] = M()->table('oa_project_count as a')->join('oa_admin as b on a.oa_head_id = b.uid')->where("a.oa_head_id = '$uid'")->select();
		}
		//删除空数组 
		foreach($newData as $k => $v){
			if(empty($v)){
				unset($newData[$k]);
			}
		}
		//查询总条数
		$count = M('project_count');
		$newCount = $count->count('pid');
		$this->assign('newCount',$newCount);
		$this->assign('newData',$newData);
		$this->display();
	}
	//修改项目信息
	public function project_update()
	{
		//查询所有员工
		$admin = M('admin');
		$result = $admin->select();
		$pid = $_GET['pid'];
		$newData = M()->table('oa_project_count as a')->join('oa_admin as b on a.oa_head_id = b.uid')->where("a.pid = '$pid'")->find();
		if($_POST){
			$projectName = I('post.projectName');//项目名称
			$companyUrl = I('post.companyUrl');//公司网址
			$customerName = I('post.customerName');//客户姓名
			$customerTel = I('post.customerTel');//客户电话
			$toolUseId = I('post.toolUseId');//项目负责人ID
			$addtime = I('post.projectAddtime');
			$projectAddtime = strtotime($addtime);//项目开始日期
			$endtime = I('post.projectEndtime');
			$projectEndtime = strtotime($endtime);//项目结束日期
			$location = I('post.location');//项目进度
			$comment = I('post.comment');//项目备注
			$addtime = time();//修改时间
			if(!$projectName || !$customerName || !$projectAddtime || !$projectEndtime){
				$this->error('项目名称、客户名称、开始、结束时间不能为空');
			}
			$add_data = array(
				'oa_project_name' => $projectName,
				'oa_company_url' => $companyUrl,
				'oa_customer_name' => $customerName,
				'oa_customer_tel' => $customerTel,
				'oa_head_id' => $toolUseId,
				'oa_project_add_time' => $projectAddtime,
				'oa_project_end_time' => $projectEndtime,
				'oa_location' => $location,
				'oa_comment' => $comment,
				'oa_update_time' => $addtime,
				);
			$model = M('project_count');
			$data = $model->where("pid='$pid'")->save($add_data);
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
	//项目详情删除
	public function project_delete()
	{
		if($_POST){
			$pid = $_POST['pid'];
			$model = M('project_count');
			$result = $model->where("pid='$pid'")->delete();
			if($result){
				echo 0;
			}else{
				echo 1;
			}
		}
	}
}