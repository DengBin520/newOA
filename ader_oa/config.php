<?php
return array(
	'URL_MODEL' => '2', //URL模式
	'SESSION_AUTO_START' => true, //是否开启session
	'URL_CASE_INSENSITIVE' => true, //URL访问不再区分大小写
	'TMPL_L_DELIM' => '<{',
	'TMPL_R_DELIM' => '}>',
	'SHOW_ERROR_MSG' => true,
	'LOAD_EXT_CONFIG' => 'siteconfig,site',
	'SESSION_AUTO_START' => true,
	'COOKIE_PATH' => '/',
	//数据库配置信息
	'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_NAME'=>'adcrm',
    'DB_USER'=>'root',
    'DB_PWD'=>'Sean',
	'DB_PORT'=>3306,
	'DB_PREFIX'=>'ac_',
	'DB_CHARSET'=>'utf8',
	'DB_DEBUG' => TRUE,
);