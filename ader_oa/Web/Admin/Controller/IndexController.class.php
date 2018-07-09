<?php
namespace Admin\Controller;
// use Think\Controller;
use Common\Controller\AuthController;
class IndexController extends AuthController 
{
    public function _initialize()
    {
       /* if (!session('adoa_admin_user')) {
            redirect(U('Login/login'));
        }*/
        parent::_initialize();
        
    }
    /* public function _initialize(){
        parent::_initialize();
    }*/
    public function index()
    {
        $admin = M('admin');
        $oaId = session("auth.uid");
        $where = "uid = '$oaId'";
        $data = $admin->where($where)->find();
        $this->assign('data',$data);
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