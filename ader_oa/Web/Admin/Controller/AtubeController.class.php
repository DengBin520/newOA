<?php
namespace Admin\Controller;
// use Think\Controller;
use Common\Controller\AuthController;
class AtubeController extends AuthController 
{
    //管理员信息展示
    public function admin_list()
    {
        $newData[] = M()->table('oa_admin as a')->join('oa_auth_group_access as b on b.uid = a.uid')->join('oa_auth_group as c on c.id = b.group_id')->where("a.oa_user_admin = 1")->select();
        $model = M('admin');
        $count = $model->where("oa_user_admin = 1")->count();
        $this->assign('newData',$newData);
        $this->assign('count',$count);
        $this->display();
    }
    //管理员权限分配展示
    public function admin_permission()
    {
        $result = M('auth_group');
        $data = $result->select();
        $count = $result->count('id');
        $this->assign('count',$count);
        $this->assign('data',$data);
        $this->display();
    }
    public function admin_group_add()
    {
        //增加规则组
        if($_POST){
            $data['title']  = I('post.roleName');
            $user = I('post.user');
            $data['rules'] = implode(',',$user);//规则
            $rule_group = M('auth_group');
            $result = $rule_group->add($data);
            if($result){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $group = M('auth_rule');
            $data = $group->select();
            $index = $group->where("division='0'")->select();
            $oa = $group->where("division='1'")->select();
            $integral = $group->where("division='2'")->select();
            $tool = $group->where("division='3'")->select();
            $project = $group->where("division='4'")->select();
            $atube = $group->where("division='5'")->select();
            $this->assign('index',$index);//首页
            $this->assign('oa',$oa);//员工账户组
            $this->assign('integral',$integral);//积分组
            $this->assign('tool',$tool);//财务组
            $this->assign('project',$project);//项目组
            $this->assign('atube',$atube);//后台管理员组
            $this->display();
        }
    }
    //分配管理员具体权限组
    public function admin_group_access()
    {
        if($_POST){
            $data['uid'] = I('post.adminId');
            $data['group_id'] = I('post.groupTitle');
            $admin = M('auth_group_access');
            $data = $admin->add($data);
            if($data){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $admin = M('admin');
            $group = M('auth_group');
            $adminName = $admin->where("oa_user_admin = 1")->select();
            $adminGroup = $group->select();
            $this->assign('adminName',$adminName);
            $this->assign('adminGroup',$adminGroup);
            $this->display();
        }
    }
    //权限组禁用接口
    public function admin_stop()
    {
        if($_POST){
            $id = $_POST['id'];
            $model = M('auth_group');
            $data = $model->where("id = '$id'")->setField('status','0');
            if($data){
                echo 0;
            }else{
                echo 1;
            }
        }
        
    }
    //权限组解除禁用
    public function admin_start()
    {
        if($_POST){
            $id = $_POST['id'];
            $model = M('auth_group');
            $data = $model->where("id = '$id'")->setField('status','1');
            if($data){
                echo 0;
            }else{
                echo 1;
            }
        }
        
    }
    //分组权限修改
    public function admin_permission_edit()
    {
        $id = $_GET['id'];
        $model = M('auth_group');
        $updateGroup = $model->where("id='$id'")->find();
        $group = M('auth_rule');
        $index = $group->where("division='0'")->select();
        $oa = $group->where("division='1'")->select();
        $integral = $group->where("division='2'")->select();
        $tool = $group->where("division='3'")->select();
        $project = $group->where("division='4'")->select();
        $atube = $group->where("division='5'")->select();
        
        
        if($_POST){
            $title = I('post.roleName');
            $user = I('post.user');
            // $data['status'] = 1;
            $rules = implode(',',$user);//规则
            $data = array(
                    'title' => $title,
                    'rules' => $rules,
                );
            $rule_group = M('auth_group');
            $result = $rule_group->where("id = '$id'")->save($data);
            if($result){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }else{
            $this->assign('index',$index);//首页
            $this->assign('oa',$oa);//员工账户组
            $this->assign('integral',$integral);//积分组
            $this->assign('tool',$tool);//财务组
            $this->assign('project',$project);//项目组
            $this->assign('atube',$atube);//后台管理员组
            $this->assign('updateGroup',$updateGroup);//管理组查询
            $this->display();
        }                    
    }
    //删除权限分组
    public function admin_permission_del()
    {
        $id = $_POST['id'];
        $model = M('auth_group');
        $result = $model->where("id = '$id'")->delete();
        if($result){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    //取消管理员资格
    public function admin_upd()
    {
        if($_POST){
            $uid = $_POST['id'];
            $delete = M('auth_group_access');
            $update = M('admin');
            $newD = $delete->where("uid = '$uid'")->delete();
            $newU = $update->where("uid = '$uid'")->setField('oa_user_admin','0');
            if($newD && $newU){
                $this->success('管理员资格取消成功');
            }else{
                $this->error('管理员资格取消失败');
            }
        }   
    }
}