<?php
namespace Home\Controller;
use Think\Controller;
// use Common\Controller\AuthController;
class OaController extends Controller 
{
    /*public function _initialize()
    {

        parent::_initialize();
        
    }*/
    public function user_add(){
    	if($_POST){
    		$adminUser = I('post.adminUser');//账户
            $sex =  I('post.sex');//性别
    		$data['oa_user'] = I('post.adminUser');//账户
    		$data['oa_pwd'] = md5('123456');//密码
    		$data['oa_user_name'] = I('post.adminName');//用户名
    		$data['oa_sex'] = I('post.sex');//性别
    		$data['oa_tel'] = I('post.phone');//手机号
    		$data['oa_email'] = I('post.email');//邮箱
    		$data['oa_entry_time'] = strtotime(trim(I('post.datetime')));//入职时间
    		$data['oa_position'] = I('post.position');//职位
    		$data['oa_notes'] = I('post.notes');//备注
    		$data['oa_add_time'] = time();//录入时间
    		$data['oa_add_date'] = date("Y-m-d H:i:s" ,time());
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
	        $info = $upload->upload(array($_FILES['photo']));	       
	        if($info) {// 上传错误提示错误信息
	        	// $this->error($upload->getError());
	        	foreach($info as $file){
		         $str=$file['savename']; 

		        }
	        }else{              
                $str = 'default1527662292.jpg';	        	
            }
	        $data['oa_img'] = $str;//图片名称
    		if(!$data['oa_user'] || !$data['oa_user_name'] || !$data['oa_position']){
    			$this->error('账号和姓名及职位不能为空！');
    		}
    		$admin = M('admin');
    		$user_repeat = $admin->where("oa_user = '$adminUser'")->find();
    		if($user_repeat){
    			$this->error('该账号已存在！');
    		}   		
    		$result = $admin->add($data);
    		if($result){
    			$admin->where("uid='$result'")->setField('uid',$result);
    			$this->success('添加成功');
    		}
    	}else{
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
    //奖惩列表
    public function integral_list()
    {
        //查询用户id
        $admin = M('admin');
        $newAdmin = $admin->select();
        //查询所有员工的总加分。减分。及总分
        $admin = M('admin');
        $result = $admin->select();
                
        foreach($result as $val){
            // var_dump($val);
            $uid = $val['uid'];
            $admin = M('user_integral_list');
            /*$newData = M()->table('oa_admin as a')->join('oa_user_integral_list as b on b.oa_userid = a.uid')->where("a.uid = '$uid' AND oa_add_lost = '0'")->sum('oa_scoreNumber');*/
            $newData[] = M()->table('oa_admin as a')->join('oa_user_integral_list as b on b.oa_userid = a.uid')->where("a.uid = '$uid'")->select();
        }
        foreach($newData as $k => $v){
            if(empty($v)){
                unset($newData[$k]);
            }
        }
          // var_dump($newData);
        $this->assign('newAdmin',$newAdmin);
        $this->assign('newData',$newData);
        $this->display();
    }
    //根据时间、姓名查询
    public function new_integral_list()
    {
        if(IS_POST){
            $startTime = I('post.startTime');
            $endTime = I('post.endTime');
            $userId = I('post.newUsername');
            $result = M('user_integral_list');
            if(!empty($userId)){
                $where = "b.oa_datetime between '$startTime' and '$endTime' AND oa_userid = '$userId' AND a.uid= '$userId'";
            }else{
                $where = "b.oa_datetime between '$startTime' and '$endTime'";
            }
            // $array= $result->where($where)->select();
            $newData[] = M()->table('oa_admin as a')->join('oa_user_integral_list as b on b.oa_userid = a.uid')->where($where)->select();
            $arr2=array();  
            //循环遍历三维数组$arr3  
            foreach($newData as $value){  
                foreach($value as $v){  
                     $arr2[]=$v;  
                }  
            }
            $data['array'] = $arr2;
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
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
    //积分规则减分展示
    public function rules_list_jian()
    {
        $model = M('integral');
        $newAdd = $model->where("oa_add_lost= '1'")->select();
        $this->assign('newAdd',$newAdd);
        $this->display();
    }

}