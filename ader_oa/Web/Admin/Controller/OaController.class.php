<?php
namespace Admin\Controller;
// use Think\Controller;
use Common\Controller\AuthController;
class OaController extends AuthController 
{
    public function _initialize()
    {

        parent::_initialize();
        
    }
    public function user_add()
    {
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
    //用户展示
    public function user_list()
    {
        $admin = M('admin');
        $adminList = $admin->select();
        $count = $admin->count('uid');
        $this->assign('count',$count);
        $this->assign('adminList',$adminList);
        $this->display();
    }
    //修改用户信息展示页
    public function user_update()
    {
        $uid = $_GET['uid'];
        $admin = M('admin');
        $data = $admin->where("uid='$uid'")->find();
        if($_POST){
            //开始修改
            $adminUser = I('post.adminUser');//账户
            $sex =  I('post.sex');//性别
            $data['oa_user'] = I('post.adminUser');//账户
            $data['oa_pwd'] = md5('A123456');//密码
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
            
            
            /*if(!$data['oa_user'] || !$data['oa_user_name'] || !$data['oa_position']){
                $this->error('账号和姓名及职位不能为空！');
            }*/
            $admin = M('admin');
            $result = $admin->where("uid='$uid'")->save($data);
            if($result){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        
        }else{
            $this->assign('data',$data);
            $this->display();
        }
        
    }
    //删除员工信息
    public function user_delete()
    {
       if($_POST){
            $uid = $_POST['uid'];
            $admin = M('admin');
            $data = $admin->where("uid='$uid'")->delete();
            if($data){
                echo 0;
            }else{
                echo 1;
            }
       }
    }
    //admin信息展示
    public function admin_user_list()
    {
        if($_GET){
            $uid = $_GET['uid'];
            $admin = M('admin');
            $data = $admin->where("uid='$uid'")->find();
            $this->assign('data',$data);
            $this->display();
        }       
    }
    //添加管理员
    public function user_admin()
    {
        if(IS_POST){
            $uid = $_POST['uid'];
            $data['oa_user_admin'] = 1;
            $model = M('admin');
            $result = $model->where("uid='$uid'")->field('oa_user_admin')->save($data); // 根据条件保存修改的数据
            if($result){
                echo 0;
            }else{
                echo 1;
            }
        }
    }
}