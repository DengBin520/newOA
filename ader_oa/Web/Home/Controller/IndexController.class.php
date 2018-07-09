<?php
namespace Home\Controller;
use Think\Controller;
// use Common\Controller\AuthController;
class IndexController extends Controller 
{
    public function _initialize()
    {
        if (!session('auth.oa_user_name')) {
            redirect(U('Login/login'));
        }
        // parent::_initialize();
        
    }

    public function index()
    {
        $admin = M('admin');
        $oaId = session("auth.uid");
        $where = "uid = '$oaId'";
        $userList = $admin->where($where)->find();//个人信息
        $integral = M('user_integral_list');
        $jia_sum['jia_sum'] = $integral->where("oa_userid = '$oaId' AND oa_add_lost = 0")->sum('oa_scoreNumber');//计算个人总加分
        $jian_sum['jian_sum'] = $integral->where("oa_userid = '$oaId' AND oa_add_lost = 1")->sum('oa_scoreNumber');//计算个人总减分
     
        //计算排名
        $newScoreNumber = $admin->field('oa_score')->select();
        $array=$newScoreNumber;
        rsort($array);//逆向排序
        $newSum = $admin->where($where)->field('oa_score')->find();//返回个人总积分
        $ci = array_search($newSum, $array);//搜索返回键名
        $ranking['ranking'] = $ci+1;
        $newArray = array_merge($userList,$jia_sum,$jian_sum,$ranking);//合并数组（个人信息、加、减、名次）    
        $result = $integral->where("oa_userid = '$oaId'")->order('add_time desc')->limit(5)->select();//奖惩列表展示5tiao
        $this->assign('newArray',$newArray);
        $this->assign('result',$result);
        $this->display();
    }
    /*public function list()
    {
        $this->display();
    }*/
    public function welcome()
    {
        $this->display();
    }
    public function index2()
    {
        $this->display();
    }

    public function header()
    {
        $this->display();
    }

    public function footer()
    {
        $this->display();
    }
}