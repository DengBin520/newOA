<?php
namespace Admin\Model;

use Think\Model;

class AdminModel extends Model
{
	//字段值map
    protected $setAttribute = ['position'=>["0"=>'qq',"2"=>'weixin',"3"=>'weibo']];  
}