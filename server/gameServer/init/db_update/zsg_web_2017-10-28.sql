# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38-log)
# Database: zsg_web
# Generation Time: 2017-10-28 12:27:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(255) NOT NULL COMMENT '帐号',
  `password` char(32) NOT NULL DEFAULT '0',
  `last_login_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgnum` int(10) NOT NULL DEFAULT '0',
  `last_login_ip` varchar(15) NOT NULL,
  `dj` varchar(255) NOT NULL DEFAULT '3000',
  `Scode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_name` (`name`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;

INSERT INTO `account` (`id`, `name`, `password`, `last_login_time`, `tgnum`, `last_login_ip`, `dj`, `Scode`)
VALUES
	(14,'administrator','administrator','2015-07-03 08:27:15',0,'127.0.0.1','3000','administrator'),
	(15,'flyindance','xzc1981','2017-10-28 14:59:36',0,'222.210.223.66','3000','xzc1981');

/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_info`;

CREATE TABLE `login_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `onlineip` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_uid` (`userid`),
  KEY `tick_index` (`ticket`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table login_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_log`;

CREATE TABLE `login_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `onlineip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chr_index` (`uname`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table pay_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pay_info`;

CREATE TABLE `pay_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `paynum` varchar(18) DEFAULT NULL,
  `paytouser` varchar(255) DEFAULT NULL,
  `paygold` int(11) DEFAULT NULL,
  `paymoney` int(11) DEFAULT NULL,
  `paytime` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `ticket` varchar(255) DEFAULT NULL,
  `chrname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_uid` (`paytouser`) USING BTREE,
  KEY `index_oid` (`paynum`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table pay_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pay_log`;

CREATE TABLE `pay_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `paytouser` varchar(255) DEFAULT NULL,
  `paygold` int(11) DEFAULT NULL,
  `paymoney` int(11) DEFAULT NULL,
  `paytime` datetime DEFAULT NULL,
  `paynum` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_touser` (`paytouser`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table paylog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paylog`;

CREATE TABLE `paylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `account` char(255) NOT NULL COMMENT '帐号',
  `paytime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(15) NOT NULL,
  `yuanbao` varchar(255) NOT NULL DEFAULT '0',
  `order_id` varchar(255) DEFAULT NULL,
  `fl` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_name` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table payzwj_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payzwj_log`;

CREATE TABLE `payzwj_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(1024) DEFAULT NULL,
  `rmb` varchar(1024) DEFAULT NULL,
  `ybcount` varchar(1024) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `serverid` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table server
# ------------------------------------------------------------

DROP TABLE IF EXISTS `server`;

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `jieshao` varchar(255) DEFAULT NULL,
  `fqid` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(255) DEFAULT NULL,
  `duankou` varchar(255) DEFAULT NULL,
  `zy` varchar(255) DEFAULT NULL,
  `zz` varchar(255) DEFAULT NULL,
  `fcm` int(11) NOT NULL AUTO_INCREMENT,
  `opentime` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fcm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `server` WRITE;
/*!40000 ALTER TABLE `server` DISABLE KEYS */;

INSERT INTO `server` (`id`, `name`, `jieshao`, `fqid`, `ip`, `duankou`, `zy`, `zz`, `fcm`, `opentime`, `version`)
VALUES
	(1,'[鸿蒙初开一区]','2015-07-03',101,'119.23.62.29','8101','','',2,'1435852800','20150120164654');

/*!40000 ALTER TABLE `server` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table spread
# ------------------------------------------------------------

DROP TABLE IF EXISTS `spread`;

CREATE TABLE `spread` (
  `tid` varchar(50) NOT NULL,
  `lid` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `islq` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table tuiguang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tuiguang`;

CREATE TABLE `tuiguang` (
  `tgid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `duihuan` int(11) NOT NULL,
  PRIMARY KEY (`tgid`),
  UNIQUE KEY `tgid` (`tgid`),
  KEY `username_2` (`username`),
  KEY `tgid_2` (`tgid`),
  KEY `tgid_3` (`tgid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table xianlu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xianlu`;

CREATE TABLE `xianlu` (
  `username` varchar(255) NOT NULL DEFAULT '',
  `line` int(11) DEFAULT NULL,
  `server_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table xsflzwj_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `xsflzwj_log`;

CREATE TABLE `xsflzwj_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(1024) DEFAULT NULL,
  `ybcount` varchar(1024) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `serverlog` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
