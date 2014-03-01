/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : db_weixin_volunteer

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2014-03-01 11:56:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_active`
-- ----------------------------
DROP TABLE IF EXISTS `t_active`;
CREATE TABLE `t_active` (
  `a_id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT '' COMMENT '标题',
  `date_time_start` datetime DEFAULT NULL,
  `date_time_end` datetime DEFAULT NULL COMMENT '时间',
  `place` varchar(32) DEFAULT '' COMMENT '地点',
  `contents` varchar(128) DEFAULT '' COMMENT '活动内容',
  `num` int(8) DEFAULT '0' COMMENT '招募人数',
  `pic` varchar(128) DEFAULT '',
  `v_id` varchar(32) DEFAULT '' COMMENT '志愿者编号',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_active
-- ----------------------------
INSERT INTO `t_active` VALUES ('1', '上海聚会', '2014-02-17 23:36:41', '2014-03-20 23:18:59', '浦东新区', '在上海浦东聚会', '10', '', 'ZYBS20140121');
INSERT INTO `t_active` VALUES ('2', '合肥旅游', '2014-02-03 15:20:26', '2014-03-21 23:19:36', '合肥', '合肥安徽大学旅游', '10', '', 'ZYBS20140120');
INSERT INTO `t_active` VALUES ('3', '武汉聚会', '2014-02-17 23:36:49', '2014-03-20 09:40:00', '湖北武汉', '聚会聚会聚会聚会', '10', '', 'ZYBS20140121');
INSERT INTO `t_active` VALUES ('5', 'aaaaaaaaaaaaaaaaaaaa', '2014-02-18 16:32:20', '2014-03-08 22:11:07', 'aaaaaa', 'aaaaaaaaa', '10', '', 'ZYBS20140169');
INSERT INTO `t_active` VALUES ('6', 'ssssssssssssss', '2014-02-27 16:32:24', '2014-04-19 21:51:31', 'ssssadss', 'ssss', '10', '', 'ZYBS20140121');
INSERT INTO `t_active` VALUES ('7', '世纪公园游玩', '2014-02-06 00:00:00', '2014-02-28 00:00:00', '浦东新区', '游玩', '10', '', 'ZYBS20140121');
INSERT INTO `t_active` VALUES ('8', '广州天河体育中心看球赛', '2014-02-15 00:00:00', '2014-02-27 16:23:38', '广州天河体育场', '看球赛', '20', '20140227/530ef8c46757f.jpg', 'ZYBS20140121');

-- ----------------------------
-- Table structure for `t_active_images`
-- ----------------------------
DROP TABLE IF EXISTS `t_active_images`;
CREATE TABLE `t_active_images` (
  `ai_id` int(8) NOT NULL AUTO_INCREMENT,
  `a_id` int(8) DEFAULT NULL,
  `pic` varchar(128) DEFAULT '',
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_active_images
-- ----------------------------
INSERT INTO `t_active_images` VALUES ('1', '8', '20140227/530efc882240a.jpg', '2014-02-27 16:51:30');
INSERT INTO `t_active_images` VALUES ('3', '8', '20140227/530efe5a1be0e.jpg', '2014-02-27 16:59:11');
INSERT INTO `t_active_images` VALUES ('4', '8', '20140227/530effac537f8.jpg', '2014-02-27 17:04:52');

-- ----------------------------
-- Table structure for `t_contents`
-- ----------------------------
DROP TABLE IF EXISTS `t_contents`;
CREATE TABLE `t_contents` (
  `c_id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT '',
  `contents` text,
  `pic` varchar(256) DEFAULT '',
  `add_time` datetime DEFAULT NULL COMMENT '插入时间',
  `v_id` varchar(64) DEFAULT '' COMMENT '志愿者编号',
  `type` tinyint(1) DEFAULT NULL COMMENT '2-监督信息 3-好人好事 4-后台发布的项目简介',
  `status` tinyint(1) DEFAULT '0' COMMENT '项目简介，后台专用字段,1表示生效 0表示不生效',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_contents
-- ----------------------------
INSERT INTO `t_contents` VALUES ('5', '活动标题活动标题', '活动标题活动标题活动标题活动标题活动标题活动标题活动标题活动标题', '', '2014-02-18 18:34:34', 'ZYBS20140121', '1', '0');
INSERT INTO `t_contents` VALUES ('8', '我的文章我的文章我的文章', '我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章我的文章', '', '2014-02-19 18:34:50', 'ZYBS20140121', '1', '0');
INSERT INTO `t_contents` VALUES ('9', '店铺介绍店铺介绍', '谁谁谁谁谁谁谁谁谁谁谁谁[p][/p]\r\n', '', '2014-02-25 18:35:01', 'ZYBS20140121', '1', '0');
INSERT INTO `t_contents` VALUES ('10', '好人好事好人好事', '[b]好人好事好人好事好人好事[/b][p][/p]\r\n好人好事好人好事好人好事好人好事好人好事好人好事', '', '2014-02-20 18:34:54', 'ZYBS20140121', '2', '0');
INSERT INTO `t_contents` VALUES ('11', '测测试测试测试测试测试试', '测试测试测试测试测试测试测试测试测试测试', '', '2014-02-18 18:34:28', 'ZYBS20140121', '3', '0');
INSERT INTO `t_contents` VALUES ('13', '我发布的信息', '[img]http://localhost/php/weixin_shop/upload/2.jpg[/img][p][/p]\r\n', '', '2014-02-10 18:35:04', 'ZYBS20140121', '2', '0');
INSERT INTO `t_contents` VALUES ('15', '项目简介', '项目简介项目简介项目简介项目简介项目简介项目简介项目简介m,项目简介项目简介项目简介项目简介.项目简介项目简介项目简介项目简介项目简介项目简介项目简介项目简介,\r\n', '', '2014-02-11 18:35:13', 'ZYBS20140121', '3', '1');
INSERT INTO `t_contents` VALUES ('16', '谁谁谁水水水水', '阿三大苏打撒水电费的水电费撒', '20140218/53032c4a40b29.jpg', '2014-02-17 18:35:18', 'ZYBS20140121', '1', '0');
INSERT INTO `t_contents` VALUES ('17', '从撒旦法是否', 'sadfasfas', '20140218/530331939d93f.jpg', '2014-02-18 18:35:22', 'ZYBS20140121', '1', '0');
INSERT INTO `t_contents` VALUES ('23', '看球赛注意安全', '看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全看球赛注意安全', '20140227/530f00f741c1d.jpg', '2014-02-27 17:10:21', 'ZYBS20140121', '1', '0');

-- ----------------------------
-- Table structure for `t_group`
-- ----------------------------
DROP TABLE IF EXISTS `t_group`;
CREATE TABLE `t_group` (
  `g_id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT '' COMMENT '团体名称',
  `mem_num` int(8) DEFAULT '1' COMMENT '成员人数',
  `resp` varchar(32) DEFAULT '' COMMENT '负责人',
  `phone` varchar(32) DEFAULT '' COMMENT '电话',
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_group
-- ----------------------------
INSERT INTO `t_group` VALUES ('3', '龙哥团队11', '1011', 'ZYBS20140121', '1234567');
INSERT INTO `t_group` VALUES ('4', '', '0', 'ZYBS20140169', '');
INSERT INTO `t_group` VALUES ('5', 'aaaaaaaaaaaa', '0', 'ZYBS20140172', 'aaaaaaaa');

-- ----------------------------
-- Table structure for `t_menu`
-- ----------------------------
DROP TABLE IF EXISTS `t_menu`;
CREATE TABLE `t_menu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT '' COMMENT '菜单名',
  `url` varchar(128) DEFAULT '' COMMENT '菜单链接',
  `role` int(8) DEFAULT NULL COMMENT '权限，用数字表示',
  `parent` int(8) DEFAULT NULL COMMENT '父菜单',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_menu
-- ----------------------------
INSERT INTO `t_menu` VALUES ('8', '用户管理', '', '1', '0');
INSERT INTO `t_menu` VALUES ('9', '系统管理', '', '3', '0');
INSERT INTO `t_menu` VALUES ('10', '菜单管理', 'MenuInfo/show_menu_list', '1', '9');
INSERT INTO `t_menu` VALUES ('14', '用户信息', 'Common/hello', '1', '8');
INSERT INTO `t_menu` VALUES ('15', '修改密码', 'User/change_pwd_form', '3', '9');
INSERT INTO `t_menu` VALUES ('16', '内容管理', '', '3', '0');
INSERT INTO `t_menu` VALUES ('19', '志愿者管理', 'Volunteer/show_list', '3', '16');
INSERT INTO `t_menu` VALUES ('20', '组织管理', 'Group/show_list', '3', '16');
INSERT INTO `t_menu` VALUES ('21', '文章管理', 'Contents/show_list', '3', '16');
INSERT INTO `t_menu` VALUES ('22', '项目管理', 'Active/show_list', '3', '16');
INSERT INTO `t_menu` VALUES ('23', '项目简介', 'Item/show_list', '3', '16');

-- ----------------------------
-- Table structure for `t_notice`
-- ----------------------------
DROP TABLE IF EXISTS `t_notice`;
CREATE TABLE `t_notice` (
  `nid` int(8) NOT NULL AUTO_INCREMENT,
  `notice` varchar(128) DEFAULT '',
  `a_id` int(8) DEFAULT NULL,
  `v_id` varchar(32) DEFAULT '',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_notice
-- ----------------------------
INSERT INTO `t_notice` VALUES ('2', '请于2014-02-27 16:32:24在ssssadss集中', '6', 'ZYBS20140121');
INSERT INTO `t_notice` VALUES ('3', '请于2014-02-15 00:00:00在广州天河体育场集中', '8', 'ZYBS20140121');

-- ----------------------------
-- Table structure for `t_temp`
-- ----------------------------
DROP TABLE IF EXISTS `t_temp`;
CREATE TABLE `t_temp` (
  `t_id` int(8) NOT NULL AUTO_INCREMENT,
  `v_id` varchar(32) DEFAULT '',
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_temp
-- ----------------------------
INSERT INTO `t_temp` VALUES ('4', '191');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT '',
  `password` varchar(32) DEFAULT '',
  `role` int(8) DEFAULT '3' COMMENT '表示权限，1-超级管理员  2-管理员  3-用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', 'cl', '123', '1');
INSERT INTO `t_user` VALUES ('2', 'test', '1', '3');

-- ----------------------------
-- Table structure for `t_volunteer`
-- ----------------------------
DROP TABLE IF EXISTS `t_volunteer`;
CREATE TABLE `t_volunteer` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `weixin_id` varchar(32) DEFAULT '' COMMENT '微信账号',
  `volunteer_id` varchar(32) DEFAULT '' COMMENT '志愿者编号',
  `pwd` varchar(32) DEFAULT '' COMMENT '密码',
  `name` varchar(32) DEFAULT '' COMMENT '姓名',
  `sex` enum('女','男') DEFAULT NULL COMMENT '性别',
  `work` varchar(64) DEFAULT '' COMMENT '工作单位',
  `phone` varchar(32) DEFAULT '',
  `love` varchar(128) DEFAULT '' COMMENT '爱好特长',
  `type` tinyint(1) DEFAULT '1' COMMENT '1-注册志愿者、2-监督志愿者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_volunteer
-- ----------------------------
INSERT INTO `t_volunteer` VALUES ('79', 'test1', 'ZYBS20140120', '1', 'cxxxxxxx', '', '', '', '', '2');
INSERT INTO `t_volunteer` VALUES ('80', 'longge', 'ZYBS20140121', '1', '陈龙', '男', 'PPTV', '123456', '软件开发', '2');
INSERT INTO `t_volunteer` VALUES ('81', 'test2', 'ZYBS20140122', '123456', '', '', '', '', '', '1');
INSERT INTO `t_volunteer` VALUES ('82', 'aaa', 'ZYBS20140163', 'a', '', '', '', '', '', '1');
INSERT INTO `t_volunteer` VALUES ('83', 'longge1', 'ZYBS20140169', '1', 'ss', '', '', '', '', '1');
INSERT INTO `t_volunteer` VALUES ('85', 'aa', 'ZYBS20140177', 'aaa', 'aa', '', '', '', '', '1');
INSERT INTO `t_volunteer` VALUES ('87', 'dfwfwfew', 'ZYBS20140179', '1', 'wefwfw', '', '', '', '', '1');
INSERT INTO `t_volunteer` VALUES ('88', 'dasdasda', 'ZYBS20140181', '1', 'adada', '', '', '', '', '1');

-- ----------------------------
-- Table structure for `t_volun_group`
-- ----------------------------
DROP TABLE IF EXISTS `t_volun_group`;
CREATE TABLE `t_volun_group` (
  `vg_id` int(8) NOT NULL AUTO_INCREMENT,
  `volun_id` varchar(32) DEFAULT '' COMMENT '志愿者编号，负责人',
  `volun_join_id` varchar(32) DEFAULT '',
  `a_id` int(8) DEFAULT NULL COMMENT '文章id',
  `join` int(8) DEFAULT '2' COMMENT '1-同意，2-取消',
  PRIMARY KEY (`vg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_volun_group
-- ----------------------------
INSERT INTO `t_volun_group` VALUES ('22', 'ZYBS20140120', 'ZYBS20140179', '2', '2');
INSERT INTO `t_volun_group` VALUES ('23', 'ZYBS20140121', 'ZYBS20140181', '1', '2');
INSERT INTO `t_volun_group` VALUES ('25', 'ZYBS20140121', 'ZYBS20140120', '3', '2');
INSERT INTO `t_volun_group` VALUES ('26', 'ZYBS20140121', 'ZYBS20140120', '1', '2');
INSERT INTO `t_volun_group` VALUES ('28', 'ZYBS20140169', 'ZYBS20140121', '5', '1');
INSERT INTO `t_volun_group` VALUES ('29', 'ZYBS20140121', 'ZYBS20140169', '6', '1');
INSERT INTO `t_volun_group` VALUES ('30', 'ZYBS20140120', 'ZYBS20140121', '2', '2');
INSERT INTO `t_volun_group` VALUES ('31', 'ZYBS20140121', 'ZYBS20140120', '8', '1');
