<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller 
{
	//登录
    public function login(){
    	if($_POST){
    		$logins = M('admin');
    		$username = I('post.adminUser');
    		$password = md5(trim(I('post.password')));
    		$where = "oa_user = '" . $username . "' ";
    		$codeuser = $logins->where($where)->find();
    		if(!$codeuser){
    			$this->error('账户不存在');
    		}else{
    			if($codeuser['oa_pwd'] != $password){
    				$this->error('密码错误');
    			}else{
                    session('auth',$codeuser);
                    session('adoa_user_name',$codeuser['oa_user_name']);
    				$this->redirect('Index/index');
                    
                    
    			}
    		}
    	}else{
    		$this->display();
    	}      
    }
    //退出
    public function retreat()
    {
        session('auth', null);
        /*session('adoa_admin_user', null);
        session('adoa_uid', null);
        session('adoa_user_name', null);*/
        $this->redirect('Home/Index/index');
    }
}