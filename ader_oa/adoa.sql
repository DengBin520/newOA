-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-06-26 10:46:42
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
/*!40101 SET NAMES utf8mb4 */

--
-- Database: `adoa`
--

-- --------------------------------------------------------

--
-- 表的结构 `oa_admin`
--

CREATE TABLE `oa_admin` (
  `uid` int(11) NOT NULL,
  `oa_user` varchar(255) NOT NULL,
  `oa_pwd` char(32) NOT NULL,
  `oa_user_name` varchar(255) NOT NULL,
  `oa_sex` int(11) NOT NULL,
  `oa_birthday` int(11) DEFAULT NULL COMMENT '生日',
  `oa_tel` char(20) NOT NULL,
  `oa_email` char(32) NOT NULL,
  `oa_img` varchar(255) NOT NULL COMMENT '头像',
  `oa_entry_time` int(11) NOT NULL COMMENT '入职时间',
  `oa_position` varchar(255) NOT NULL COMMENT '职位',
  `oa_pid` int(11) NOT NULL DEFAULT '0' COMMENT '权限',
  `oa_score` varchar(255) NOT NULL DEFAULT '0' COMMENT '数值',
  `oa_notes` varchar(255) DEFAULT NULL COMMENT '备注',
  `oa_user_admin` int(11) NOT NULL DEFAULT '0' COMMENT '1位管理员',
  `oa_quit_time` int(11) DEFAULT NULL COMMENT '离职时间',
  `oa_add_time` int(11) NOT NULL COMMENT '录入时间',
  `oa_add_date` datetime NOT NULL COMMENT '录入日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `oa_admin`
--

INSERT INTO `oa_admin` (`uid`, `oa_user`, `oa_pwd`, `oa_user_name`, `oa_sex`, `oa_birthday`, `oa_tel`, `oa_email`, `oa_img`, `oa_entry_time`, `oa_position`, `oa_pid`, `oa_score`, `oa_notes`, `oa_user_admin`, `oa_quit_time`, `oa_add_time`, `oa_add_date`) VALUES
(3, 'Ader_Zhoujie', 'e10adc3949ba59abbe56e057f20f883e', '周杰', 0, NULL, '2147483647', '17709673007@163.com', '1527667399_1555747638.jpg', 1430409600, 'SEM', 1, '91.5', '周总', 1, NULL, 1527667399, '2018-05-30 16:03:19'),
(4, 'Ader_Dengbin', 'e10adc3949ba59abbe56e057f20f883e', '邓宾', 0, NULL, '17709673008', '17709673008@163.com', 'default1527662292.jpg', 1523289600, '程序员', 0, '101', '', 1, NULL, 1528704342, '2018-06-11 16:05:42'),
(5, 'Ader_Renshi', 'e10adc3949ba59abbe56e057f20f883e', '人事', 0, NULL, '17709673008', '17709673008@163.com', 'default1527662291.jpg', 1527696000, '程序员', 0, '92', '人事', 1, NULL, 1527749263, '2018-05-31 14:47:43'),
(6, 'Ader_Xiaohong', 'e10adc3949ba59abbe56e057f20f883e', '肖宏', 0, NULL, '17709673008', '17709673008@163.com', 'default1527662291.jpg', 1527696000, '程序员', 0, '91', '人事', 0, NULL, 1527749497, '2018-05-31 14:51:37'),
(8, 'Ader_Wangcheng', 'e10adc3949ba59abbe56e057f20f883e', '王程', 0, NULL, '17709673008', '17709673008@163.com', '1528428072_469134328.jpg', 1528300800, '电商运营', 0, '-93', '修改', 0, NULL, 1528428072, '2018-06-08 11:21:12');

-- --------------------------------------------------------

--
-- 表的结构 `oa_auth_group`
--

CREATE TABLE `oa_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `oa_auth_group`
--

INSERT INTO `oa_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超管', 1, '1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33'),
(2, 'BOOS', 1, '1,3,4,5'),
(3, '人事', 1, '1,3,4,5,7'),
(4, '设计负责人', 1, '1,3,4'),
(13, '人事管理组', 1, '1,2,3,4,5,12,14,6,7,8,9,10,11,23,24,26,27,15,16,17,18');

-- --------------------------------------------------------

--
-- 表的结构 `oa_auth_group_access`
--

CREATE TABLE `oa_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `oa_auth_group_access`
--

INSERT INTO `oa_auth_group_access` (`uid`, `group_id`) VALUES
(3, 2),
(4, 1),
(5, 13),
(6, 4);

-- --------------------------------------------------------

--
-- 表的结构 `oa_auth_rule`
--

CREATE TABLE `oa_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `division` int(11) NOT NULL COMMENT '区分规则'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `oa_auth_rule`
--

INSERT INTO `oa_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`, `division`) VALUES
(1, 'Admin/Index/index', '首页展示', 1, 1, '', 0),
(2, 'Admin/Index/list', '功能列表页', 1, 1, '', 0),
(3, 'Admin/Index/welcome', '欢迎页', 1, 1, '', 0),
(4, 'Admin/Oa/user_add', '添加员工', 1, 1, '', 1),
(5, 'Admin/Oa/user_list', '用户列表页', 1, 1, '', 1),
(6, 'Admin/Integral/integral', '修改积分页', 1, 1, '', 2),
(7, 'Admin/Integral/touch_add', '修改积分', 1, 1, '', 2),
(8, 'Admin/Integral/integral_list', '奖惩列表页', 1, 1, '', 2),
(9, 'Admin/Integral/rules_add', '积分规则增加', 1, 1, '', 2),
(10, 'Admin/Integral/integral_delete', '删除已添加积分', 1, 1, '', 2),
(11, 'Admin/Integral/integral_user_list', '查看个人积分信息', 1, 1, '', 2),
(12, 'Admin/Oa/user_update', '修改个人信息页', 1, 1, '', 1),
(13, 'Admin/Oa/user_delete', '删除员工账户', 1, 1, '', 1),
(14, 'Admin/Oa/admin_user_list', '查看admin个人信息', 1, 1, '', 1),
(15, 'Admin/Tool/tool_add', '公司物品后台添加', 1, 1, '', 3),
(16, 'Admin/Tool/tool_list', '物品展示', 1, 1, '', 3),
(17, 'Admin/Tool/tool_update', '物品详情信息修改', 1, 1, '', 3),
(18, 'Admin/Tool/tool_delete', '删除财务（物品信息）', 1, 1, '', 3),
(19, 'Admin/Project/project_add', '添加项目详情', 1, 1, '', 4),
(20, 'Admin/Project/project_list', '项目展示页面', 1, 1, '', 4),
(21, 'Admin/Project/project_update', '项目详情修改', 1, 1, '', 4),
(22, 'Admin/Project/project_delete', '删除项目详情', 1, 1, '', 4),
(23, 'Admin/Integral/integral_statistical', '积分柱状图展示', 1, 1, '', 2),
(24, 'Admin/Integral/integral_shuju', '积分数据', 1, 1, '', 2),
(25, 'Admin/Oa/user_admin', '后台列表页添加管理员', 1, 1, '', 1),
(26, 'Admin/Integral/rules_list_jia', '加分规则展示', 1, 1, '', 2),
(27, 'Admin/Integral/rules_list_jian', '减分规则展示', 1, 1, '', 2),
(28, 'Admin/Integral/rules_jia_delete', '删除加积分规则', 1, 1, '', 2),
(29, 'Admin/Integral/rules_jian_delete', '删除减积分规则', 1, 1, '', 2),
(30, 'Admin/Atube/admin_list', '管理员展示页面', 1, 1, '', 5),
(31, 'Admin/Atube/admin_permission', '权限管理', 1, 1, '', 5),
(32, 'Admin/Atube/admin_group_add', '后台规则添加', 1, 1, '', 5),
(33, 'Admin/Atube/admin_group_access', '分配admin权限组', 1, 1, '', 5);

-- --------------------------------------------------------

--
-- 表的结构 `oa_group_supplies`
--

CREATE TABLE `oa_group_supplies` (
  `tid` int(11) NOT NULL,
  `oa_tool_name` varchar(255) NOT NULL COMMENT '物品名称',
  `oa_tool_number` varchar(255) DEFAULT NULL COMMENT '编号',
  `oa_the_number` int(11) NOT NULL COMMENT '数量',
  `oa_buy_datatime` int(11) DEFAULT NULL COMMENT '购买时间',
  `oa_tool_price` varchar(255) DEFAULT NULL COMMENT '购买价格',
  `oa_tool_img` varchar(255) DEFAULT NULL COMMENT '实物图',
  `oa_tool_state` int(11) NOT NULL COMMENT '物品状态',
  `oa_tool_use_id` int(11) DEFAULT NULL COMMENT '物品使用人id',
  `oa_comment` varchar(255) DEFAULT NULL COMMENT '备注',
  `oa_operation_name` varchar(255) NOT NULL COMMENT '操作人',
  `oa_tool_add_time` int(11) DEFAULT NULL COMMENT '录入时间',
  `oa_add_datetime` datetime DEFAULT NULL COMMENT '录入日期',
  `oa_update_time` int(11) DEFAULT NULL COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司物品管理表';

--
-- 转存表中的数据 `oa_group_supplies`
--

INSERT INTO `oa_group_supplies` (`tid`, `oa_tool_name`, `oa_tool_number`, `oa_the_number`, `oa_buy_datatime`, `oa_tool_price`, `oa_tool_img`, `oa_tool_state`, `oa_tool_use_id`, `oa_comment`, `oa_operation_name`, `oa_tool_add_time`, `oa_add_datetime`, `oa_update_time`) VALUES
(1, '新电脑', '001', 15, 1528646400, '4000元', 'moren1527662293.png', 2, 4, '新购买', '邓宾', 1528445242, '2018-06-08 16:07:22', 1528698757),
(2, '桌子', '2', 20, 1528387200, '200', '1528705951_1819672124.png', 0, 3, '测试', '邓宾', 1528449465, '2018-06-08 17:17:45', 1528705951),
(3, '本子', '3', 10, 1528646400, '5', 'moren1527662293.png', 0, 4, '三分毒', '邓宾', 1528687475, '2018-06-11 11:24:35', 0);

-- --------------------------------------------------------

--
-- 表的结构 `oa_integral`
--

CREATE TABLE `oa_integral` (
  `zid` int(11) NOT NULL,
  `oa_operation_name` varchar(255) NOT NULL COMMENT '操作人',
  `oa_date_time` int(11) NOT NULL COMMENT '规则执行时间',
  `oa_num_ber` int(11) NOT NULL COMMENT '分值',
  `oa_matters` varchar(255) NOT NULL COMMENT '规则',
  `oa_add_time` int(11) NOT NULL COMMENT 'add时间',
  `oa_add_lost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `oa_integral`
--

INSERT INTO `oa_integral` (`zid`, `oa_operation_name`, `oa_date_time`, `oa_num_ber`, `oa_matters`, `oa_add_time`, `oa_add_lost`) VALUES
(1, '邓宾', 1528128000, 100, '公司成立前三年，入职每周年（不满周年不计）', 1528181551, 0),
(2, '邓宾', 1528128000, 10, '公司三年后，入职每周年', 1528181698, 0),
(3, '邓宾', 1528128000, 5, '办公室最后一个离开办公室没关灯空调等电设备', 1528181725, 1);

-- --------------------------------------------------------

--
-- 表的结构 `oa_project_count`
--

CREATE TABLE `oa_project_count` (
  `pid` int(11) NOT NULL,
  `oa_project_name` varchar(255) NOT NULL COMMENT '项目名称',
  `oa_company_url` varchar(255) DEFAULT NULL COMMENT '公司网址',
  `oa_customer_name` varchar(255) DEFAULT NULL COMMENT '客户名称',
  `oa_customer_tel` char(32) DEFAULT NULL COMMENT '客户电话',
  `oa_project_add_time` int(11) NOT NULL COMMENT '项目开始日期',
  `oa_project_end_time` int(11) NOT NULL COMMENT '项目结束日期',
  `oa_location` int(11) NOT NULL COMMENT '进度',
  `oa_head_id` int(11) NOT NULL COMMENT '负责人ID',
  `oa_comment` varchar(255) DEFAULT NULL COMMENT '备注',
  `oa_add_time` int(11) NOT NULL COMMENT '录入时间',
  `oa_update_time` int(11) DEFAULT NULL COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `oa_project_count`
--

INSERT INTO `oa_project_count` (`pid`, `oa_project_name`, `oa_company_url`, `oa_customer_name`, `oa_customer_tel`, `oa_project_add_time`, `oa_project_end_time`, `oa_location`, `oa_head_id`, `oa_comment`, `oa_add_time`, `oa_update_time`) VALUES
(1, '搬家公司', 'www.banjia.com', '大佬', '17709673008', 1528646400, 1528732800, 2, 8, '很好', 1528775297, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `oa_user_integral_list`
--

CREATE TABLE `oa_user_integral_list` (
  `gid` int(11) NOT NULL,
  `oa_datetime` int(11) NOT NULL COMMENT '触发时间',
  `oa_userid` varchar(255) NOT NULL COMMENT '员工id',
  `oa_scoreNumber` varchar(255) NOT NULL COMMENT '加或减',
  `oa_operationName` varchar(255) NOT NULL COMMENT '操作人',
  `oa_rules` varchar(255) NOT NULL COMMENT '规则',
  `oa_add_lost` int(11) NOT NULL COMMENT '0加/1减',
  `add_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `oa_user_integral_list`
--

INSERT INTO `oa_user_integral_list` (`gid`, `oa_datetime`, `oa_userid`, `oa_scoreNumber`, `oa_operationName`, `oa_rules`, `oa_add_lost`, `add_time`) VALUES
(1, 1527782400, '5', '+10', '邓宾', '二', 0, 1527848655),
(2, 1527782400, '4', '+10', '邓宾', '让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他让他', 0, 1527848746),
(3, 1527782400, '4', '+10', '邓宾', '发', 0, 1527848788),
(4, 1527782400, '4', '+10', '邓宾', '地方', 0, 1527848934),
(5, 1527782400, '4', '+10', '邓宾', '地方', 0, 1527849048),
(6, 1527782400, '4', '10', '邓宾', '的', 0, 1527849238),
(7, 1527782400, '4', '-5', '邓宾', '蔡少芬', 1, 1527849257),
(8, 1527782400, '4', '-6', '邓宾', 'uhg', 1, 1527849284),
(13, 1528300800, '8', '3', '邓宾', '测试', 1, 1528336137),
(12, 1528300800, '8', '10', '邓宾', '早到', 0, 1528335985),
(11, 1528128000, '4', '-10', '邓宾', '擦', 1, 1528178728),
(14, 1528819200, '8', '100', '邓宾', '工作太认真', 1, 1528855984),
(15, 1527782400, '4', '10', '邓宾', '沃尔特高危儿', 0, 1530004635);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oa_admin`
--
ALTER TABLE `oa_admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `oa_auth_group`
--
ALTER TABLE `oa_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oa_auth_group_access`
--
ALTER TABLE `oa_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `oa_auth_rule`
--
ALTER TABLE `oa_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `oa_group_supplies`
--
ALTER TABLE `oa_group_supplies`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `oa_integral`
--
ALTER TABLE `oa_integral`
  ADD PRIMARY KEY (`zid`);

--
-- Indexes for table `oa_project_count`
--
ALTER TABLE `oa_project_count`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `oa_user_integral_list`
--
ALTER TABLE `oa_user_integral_list`
  ADD PRIMARY KEY (`gid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `oa_admin`
--
ALTER TABLE `oa_admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `oa_auth_group`
--
ALTER TABLE `oa_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `oa_auth_rule`
--
ALTER TABLE `oa_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- 使用表AUTO_INCREMENT `oa_group_supplies`
--
ALTER TABLE `oa_group_supplies`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `oa_integral`
--
ALTER TABLE `oa_integral`
  MODIFY `zid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `oa_project_count`
--
ALTER TABLE `oa_project_count`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `oa_user_integral_list`
--
ALTER TABLE `oa_user_integral_list`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
