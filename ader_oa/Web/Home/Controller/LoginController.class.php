<?php
namespace Home\Controller;
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
                    session('adoa_user_name',$codeuser['oa_user_name']);//用户名
                    session('oa_user_admin',$codeuser['oa_user_admin']);//用户ID
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
        session('adoa_user_name', null);
        session('oa_user_admin', null);
        /*session('adoa_user_name', null);*/
        $this->redirect('login');
    }
    //修改密码
    public function user_password_edit()
    {
        if($_POST){
            $logins = M('admin');
            $oaId = session("auth.uid");
            $ypwd = md5(trim(I('post.ypwd')));
            $password = trim(I('post.password'));
            $pwd = trim(I('post.pwd'));

            $sePwd = $logins->where("uid = '$oaId'")->getField('oa_pwd');
            if(strcmp($ypwd,$sePwd) == 0){
                if(!empty($password) || !empty($pwd)){
                    if(strcmp($password,$pwd) == 0 ){
                         $data['oa_pwd'] = md5($pwd);
                        $result = $logins->where("uid = '$oaId'")->save($data);
                        if($result){
                            $this->success('密码修改成功');
                        }else{
                            $this->error('密码修改失败');
                        }
                    }else{
                        $this->error('两次密码输入不一致');
                    }                  
                }else{
                    $this->error('新密码不能为空');
                }
            }else{
                $this->error('请输入正确的原始密码');
            }
        }else{
            $this->display();
        }
        
    }
}