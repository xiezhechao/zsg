-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- 主机: 192.168.5.12:3306
-- 生成日期: 2014 年 01 月 09 日 14:43
-- 服务器版本: 5.0.77
-- PHP 版本: 5.3.2
set names utf8;

drop database IF EXISTS zsg_bi_rc;

create database zsg_bi_rc;

use zsg_bi_rc;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bi_fenku_v1_0`
--

-- --------------------------------------------------------

--
-- 表的结构 `bi_consume_first`
--

CREATE TABLE IF NOT EXISTS `bi_consume_first` (
  `record_time` int(11) NOT NULL COMMENT '消费时间',
  `user_id` bigint(20) NOT NULL COMMENT '玩家平台ID',
  `player` varchar(30) NOT NULL COMMENT '角色名',
  `grade` int(11) NOT NULL COMMENT '消费时的玩家等级',
  `type` int(11) NOT NULL COMMENT '消费类别',
  `shop` int(11) NOT NULL COMMENT '商品ID',
  `amount` int(11) NOT NULL COMMENT '消费数量',
  `money` int(11) NOT NULL COMMENT '金额',
  `num` int(11) unsigned NOT NULL COMMENT '消费次数',
  `sum_money` int(11) unsigned NOT NULL COMMENT '消费总金额',
  PRIMARY KEY  (`user_id`),
  KEY `time` (`record_time`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='首次消费表';

-- --------------------------------------------------------

--
-- 表的结构 `bi_consume_logs`
--

CREATE TABLE IF NOT EXISTS `bi_consume_logs` (
  `id` bigint(20) NOT NULL auto_increment COMMENT '自增ID',
  `record_time` int(11) NOT NULL COMMENT '消费时间，时间戳 秒',
  `user_id` bigint(20) NOT NULL COMMENT '玩家ID',
  `player` varchar(30) default NULL COMMENT '角色名',
  `grade` int(11) NOT NULL default '0' COMMENT '消费时的玩家等级',
  `type` int(11) NOT NULL default '0' COMMENT '消费类别，比如功能性消费，道具购买型消费',
  `shop` int(11) NOT NULL default '0' COMMENT '商品ID，该字段归属于type分类下面',
  `amount` int(11) NOT NULL default '0' COMMENT '消费数量',
  `money` int(11) NOT NULL default '0' COMMENT '消费总货币数',
  `money_type_id` int(11) NOT NULL default '1' COMMENT '消费货币类型，与bi_money_list表的typ_id含义一样',
  PRIMARY KEY  (`id`),
  KEY `time` (`record_time`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`,`shop`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='消费日志表' AUTO_INCREMENT=3 ;

--
-- 触发器 `bi_consume_logs`
--
DROP TRIGGER IF EXISTS `first_consume`;
DELIMITER //
CREATE TRIGGER `first_consume` AFTER INSERT ON `bi_consume_logs`
 FOR EACH ROW INSERT INTO bi_consume_first (record_time,user_id,player,grade,type,shop,amount,money,num,sum_money) VALUES(NEW.record_time,NEW.user_id,NEW.player,NEW.grade,NEW.type,NEW.shop,NEW.amount,NEW.money,1,NEW.money) ON DUPLICATE KEY UPDATE num=num+1,sum_money=sum_money+NEW.money
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_customspass_info`
--

CREATE TABLE IF NOT EXISTS `bi_customspass_info` (
  `id` bigint(20) unsigned NOT NULL auto_increment COMMENT '自增ID',
  `uid` bigint(20) NOT NULL COMMENT '玩家ID',
  `type_id` tinyint(3) NOT NULL default '1' COMMENT '关卡类型',
  `lsid` int(11) NOT NULL default '0' COMMENT '关卡sid',
  `finish` int(1) NOT NULL default '0' COMMENT '完成度',
  `ftime` int(11) NOT NULL default '0' COMMENT '达到当前完成度的时间 时间戳 秒',
  `wincount` int(1) NOT NULL default '0' COMMENT '完成次数',
  `losecount` int(1) NOT NULL default '0' COMMENT '失败次数',
  `firsttime` int(11) NOT NULL default '0' COMMENT '首次完成时间 时间戳 秒',
  PRIMARY KEY  (`id`),
  KEY `lsid` (`lsid`),
  KEY `uid` (`uid`),
  KEY `fristtime` (`firsttime`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='BI用玩家关卡完成情况' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_day`
--

CREATE TABLE IF NOT EXISTS `bi_day` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `record_time` int(11) NOT NULL COMMENT '采集日期：20010807',
  `total_onlinetime` int(11) NOT NULL COMMENT '总在线时长 分钟',
  `avg_onlinetime` int(11) NOT NULL COMMENT '平均在线时长 分钟',
  `total_money` bigint(20) NOT NULL COMMENT '产出的总游戏币',
  `consume_money` bigint(20) NOT NULL COMMENT '消耗的总游戏币',
  `money` bigint(20) NOT NULL COMMENT '存量游戏币',
  `token` bigint(20) NOT NULL COMMENT '存量代币',
  PRIMARY KEY  (`id`),
  KEY `time` (`record_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='日采集数据表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_login_logs`
--

CREATE TABLE IF NOT EXISTS `bi_login_logs` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL COMMENT '玩家ID',
  `player` varchar(40) NOT NULL default '0' COMMENT '登录的角色名',
  `grade` int(11) NOT NULL default '0' COMMENT '玩家登录时的等级',
  `record_time` int(11) NOT NULL default '0' COMMENT '登录时间 时间戳 秒',
  `ip` varchar(39) NOT NULL default '0' COMMENT '登录时的IP地址',
  `type` char(1) NOT NULL default '0' COMMENT '0.登录，1.注销',
  `onlinetime` int(11) NOT NULL default '0' COMMENT 'type=1时为此次游戏的在线时长,否则置0 ，在注销的时候记录在线时长 分钟',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `time` (`record_time`,`user_id`),
  KEY `grade` (`grade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='登录日志' AUTO_INCREMENT=1 ;

--
-- 触发器 `bi_login_logs`
--
DROP TRIGGER IF EXISTS `bi_login_logs_TRIGGER`;
DELIMITER //
CREATE TRIGGER `bi_login_logs_TRIGGER` AFTER INSERT ON `bi_login_logs`
 FOR EACH ROW begin
 INSERT INTO bi_login_logs_day(`user_id`,login_date,login_count,nickname,onlinetimes) VALUES(NEW.user_id,FROM_UNIXTIME( NEW.record_time, "%Y%m%d"),1,NEW.player,NEW.onlinetime) ON DUPLICATE KEY UPDATE login_count=login_count+1,onlinetimes=onlinetimes+NEW.onlinetime;
 if (NEW.type > 0) then
 update bi_player set level = NEW.grade where uid = NEW.user_id;
 end if;
 end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_login_logs_day`
--

CREATE TABLE IF NOT EXISTS `bi_login_logs_day` (
  `user_id` bigint(20) unsigned NOT NULL COMMENT '玩家ID',
  `login_date` int(11) unsigned NOT NULL COMMENT '登陆日期 如20130918',
  `login_count` int(11) unsigned NOT NULL default '1' COMMENT '当天登陆次数',
  `nickname` char(30) NOT NULL COMMENT '登陆角色',
  `onlinetimes` int(11) unsigned NOT NULL default '0' COMMENT '当天在线时长 分',
  PRIMARY KEY  (`user_id`,`login_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='玩家登陆日志，按天统计，该表是用触发器写入，程序不需要关心此表';

-- --------------------------------------------------------

--
-- 表的结构 `bi_money_list`
--

CREATE TABLE IF NOT EXISTS `bi_money_list` (
  `id` int(11) NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL COMMENT '用户ID',
  `type_id` tinyint(3) NOT NULL default '0' COMMENT '货币种类，项目组定义好比如1表示元宝 2表示金券等',
  `amount` bigint(11) NOT NULL default '0' COMMENT '数量，增加用正数，消耗用负数',
  `balance` bigint(11) unsigned NOT NULL default '0' COMMENT '操作后的余额',
  `act_type` tinyint(3) NOT NULL default '0' COMMENT '操作类别 1：增加；2：消耗',
  `act_method` varchar(20) NOT NULL default '0' COMMENT '操作途径',
  `record_time` int(11) unsigned NOT NULL default '0' COMMENT '操作时间 时间戳 秒',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `record_time` (`record_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='货币流水表' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_online_times`
--

CREATE TABLE IF NOT EXISTS `bi_online_times` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `record_time` int(11) NOT NULL COMMENT '采集时间，时间戳',
  `amount` int(11) NOT NULL COMMENT '在线人数',
  PRIMARY KEY  (`id`),
  KEY `time` (`record_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='10分钟采集' AUTO_INCREMENT=5 ;

--
-- 触发器 `bi_online_times`
--
DROP TRIGGER IF EXISTS `bi_online_times_TRIGGER`;
DELIMITER //
CREATE TRIGGER `bi_online_times_TRIGGER` AFTER INSERT ON `bi_online_times`
 FOR EACH ROW begin
 INSERT INTO bi_online_times_hour(log_date,hour,max_online_count) VALUES(FROM_UNIXTIME( NEW.record_time, "%Y%m%d"),FROM_UNIXTIME( NEW.record_time, "%H"),NEW.amount) ON DUPLICATE KEY UPDATE max_online_count = max_online_count;
 update bi_online_times_hour set max_online_count = NEW.amount where log_date=FROM_UNIXTIME( NEW.record_time, "%Y%m%d") and NEW.amount>max_online_count and hour = FROM_UNIXTIME( NEW.record_time, "%H");
 end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_online_times_hour`
--

CREATE TABLE IF NOT EXISTS `bi_online_times_hour` (
  `log_date` int(11) NOT NULL COMMENT '存储日期 格式 20131209',
  `hour` tinyint(3) NOT NULL COMMENT '小时，数值是 0-23',
  `max_online_count` int(11) unsigned NOT NULL COMMENT '最大在线人数',
  PRIMARY KEY  (`log_date`,`hour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='按小时存储该小时内的最高在线人数 触发器完成，程序不需要关心';

-- --------------------------------------------------------

--
-- 表的结构 `bi_order_logs`
--

CREATE TABLE IF NOT EXISTS `bi_order_logs` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `order_id` varchar(70) NOT NULL COMMENT '平台订单号',
  `record_time` int(11) NOT NULL default '0' COMMENT '充值时间 时间戳',
  `user_id` bigint(20) NOT NULL default '0' COMMENT '玩家平台ID',
  `grade` int(11) NOT NULL default '0' COMMENT '玩家充值时的等级',
  `money` int(11) NOT NULL default '0' COMMENT '充值的元宝',
  `rmb` float(8,2) NOT NULL default '0.00' COMMENT '人民币',
  `is_first` char(1) NOT NULL default '0' COMMENT '0.非首充，1.首充',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `record_time` (`record_time`),
  KEY `grade` (`grade`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='充值日志表' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_player`
--

CREATE TABLE IF NOT EXISTS `bi_player` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL COMMENT '玩家ID',
  `name` char(32) NOT NULL default '0' COMMENT '玩家昵称',
  `is_true_user` tinyint(3) NOT NULL default '0' COMMENT '是否是有效用户，0无效；1有效',
  `true_user_time` int(11) NOT NULL default '0' COMMENT '成为有效用户的时间',
  `is_pay_user` tinyint(3) NOT NULL default '0' COMMENT '是否为付费用户，0为未付费 1为有付费记录；该字段请程序忽略，触发器会自动完成该字段的填充',
  `pay_user_time` int(11) NOT NULL default '0' COMMENT '成为付费用户的时间(程序开发不用关心，由BI系统完成)',
  `is_pay_chixu_user` tinyint(3) NOT NULL default '0' COMMENT '是否为持续付费用户，（程序开发不用关心，由触发器完成）',
  `pay_chixu_use_time` int(11) NOT NULL default '0' COMMENT '成为持续付费用户的时间(程序开发不用关心，由触发器完成)',
  `pay_count` int(11) NOT NULL default '0' COMMENT '付费次数(程序开发不用关心，由BI系统完成)',
  `level` int(1) NOT NULL default '0' COMMENT '玩家等级,项目组不需要更新，有触发器完成',
  `vip` int(1) NOT NULL default '0' COMMENT '玩家vip等级',
  `money` bigint(11) NOT NULL default '0' COMMENT '玩家龙币',
  `rmb` int(11) NOT NULL default '0' COMMENT '玩家代币,此处的代币不是人民币，是人民币转换来的币',
  `friendcount` smallint(1) NOT NULL default '0' COMMENT '玩家好友数量',
  `platform_id` int(11) NOT NULL default '0' COMMENT '平台ID',
  `platform_user_id` char(70) default NULL COMMENT '平台上用户的平台用户ID',
  `created_time` int(11) NOT NULL default '0' COMMENT '创建角色时间 时间戳 秒',
  `record_time` int(11) NOT NULL default '0' COMMENT '记录产生的时间，注册用户的时候写入该时间  时间戳秒',
  `ip` char(15) default NULL COMMENT '注册时的IP',
  `system_type` tinyint(3) NOT NULL default '0' COMMENT '用户操作系统，具体操作系统编号文档上查询，项目组只需要接收到参数写入，主要针对手游',
  `phone_device` char(70) default NULL COMMENT '手机设备号，针对页游',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`uid`),
  KEY `name` (`name`),
  KEY `level` (`level`),
  KEY `platform_user_id` (`platform_user_id`),
  KEY `created_time` (`created_time`),
  KEY `record_time` (`record_time`),
  KEY `pay_user_time` (`pay_user_time`),
  KEY `pay_chixu_use_time` (`pay_chixu_use_time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='BI用玩家基础信息表，注册账号的时候插入数据，创建角色的时候更新昵称和时间' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_task`
--

CREATE TABLE IF NOT EXISTS `bi_task` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) unsigned NOT NULL COMMENT '玩家ID',
  `level` int(11) NOT NULL default '0' COMMENT '玩家当前等级',
  `task_id` char(30) NOT NULL default '0' COMMENT '任务ID',
  `type_id` char(30) NOT NULL default '0' COMMENT '任务类别ID',
  `status` tinyint(3) NOT NULL default '1' COMMENT '任务完成状态，目前只存1，只存完成状态',
  `record_time` int(11) NOT NULL default '0' COMMENT '记录时间 时间戳',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`,`task_id`,`type_id`,`record_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='任务列表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_tool_list`
--

CREATE TABLE IF NOT EXISTS `bi_tool_list` (
  `id` int(11) NOT NULL auto_increment,
  `uid` bigint(20) NOT NULL COMMENT '用户ID',
  `tool_type` int(11) NOT NULL default '0' COMMENT '道具类别',
  `tool_id` int(20) NOT NULL default '0' COMMENT '道具ID',
  `amount` int(11) NOT NULL default '0' COMMENT '数量，增加用正数，消耗用负数',
  `balance` int(11) unsigned NOT NULL default '0' COMMENT '操作后的余额',
  `act_type` tinyint(3) NOT NULL default '0' COMMENT '自定义类别：比如0为系统产生；1为元宝购买等',
  `act_method` varchar(20) NOT NULL default '0' COMMENT '操作途径',
  `note` varchar(20) NOT NULL default '0' COMMENT '描述',
  `record_time` int(11) unsigned NOT NULL default '0' COMMENT '操作时间',
  PRIMARY KEY  (`id`),
  KEY `uid` (`uid`),
  KEY `tool_type` (`tool_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='道具流水表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bi_version`
--

CREATE TABLE IF NOT EXISTS `bi_version` (
  `version` char(10) NOT NULL COMMENT '接入BI的版本号'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='接入BI的版本号';
