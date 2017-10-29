/*
Navicat MySQL Data Transfer

Source Server         : 真三国内部测试服
Source Server Version : 50170
Source Host           : 192.168.5.7:3306
Source Database       : zsg

Target Server Type    : MYSQL
Target Server Version : 50170
File Encoding         : 65001

Date: 2013-09-09 14:04:17
*/

set names utf8;

drop database IF EXISTS ${db.game.database};

create database ${db.game.database};

use ${db.game.database};
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity`
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
`actid`  int(11) NOT NULL DEFAULT 0 ,
`acttype`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' ,
`visible`  tinyint(1) NOT NULL DEFAULT 1 ,
`begintime`  int(30) NOT NULL DEFAULT 0 ,
`endtime`  int(30) NOT NULL DEFAULT 0 ,
`sid`  int(11) NOT NULL ,
`giftid`  int(11) NULL DEFAULT NULL ,
`gifttype`  int(11) NULL DEFAULT NULL ,
`actname`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`actcontent`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param1`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param2`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param3`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param4`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param5`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param6`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param7`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param8`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param9`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`param10`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
PRIMARY KEY (`actid`),
INDEX `actid` USING BTREE (`actid`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `activityaward`
-- ----------------------------
DROP TABLE IF EXISTS `activityaward`;
CREATE TABLE `activityaward` (
`id`  bigint(20) NOT NULL ,
`actId`  int(11) NOT NULL DEFAULT 0 ,
`actEndTime`  int(11) NOT NULL DEFAULT 0 ,
`pid`  bigint(20) NOT NULL DEFAULT 0 ,
`value`  tinyint(1) NULL DEFAULT NULL ,
`index`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
INDEX `pid` USING BTREE (`pid`) ,
INDEX `actId` USING BTREE (`actId`) ,
INDEX `actEndTime` USING BTREE (`actEndTime`) ,
INDEX `id` USING BTREE (`id`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin

;

-- ----------------------------
-- Table structure for `bi_msg`
-- ----------------------------
DROP TABLE IF EXISTS `bi_msg`;
CREATE TABLE `bi_msg` (
`id`  smallint(6) NOT NULL DEFAULT 1 ,
`onlineTime`  bigint(20) NULL DEFAULT NULL COMMENT '所有玩家当日总在线时长' ,
`allGold`  bigint(20) NULL DEFAULT NULL COMMENT '存量元宝' ,
`allFightScore`  bigint(20) NULL DEFAULT NULL COMMENT '存量功勋' ,
`outFightScore`  bigint(20) NULL DEFAULT NULL COMMENT '产出总功勋' ,
`costFightScore`  bigint(20) NULL DEFAULT NULL COMMENT '消耗总功勋' ,
`playerNums`  blob NULL COMMENT '今日登陆过的玩家' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `cardkey`
-- ----------------------------
DROP TABLE IF EXISTS `cardkey`;
CREATE TABLE `cardkey` (
`cdkey`  varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '礼包码' ,
`type1`  tinyint(4) NOT NULL COMMENT '礼包大类型' ,
`type2`  tinyint(4) NOT NULL COMMENT '礼包小类型' ,
`awardSid`  int(11) NULL DEFAULT NULL COMMENT '奖励sid' ,
`pid`  bigint(20) NOT NULL DEFAULT 0 COMMENT '领取玩家pid' ,
`num`  int(11) NOT NULL COMMENT '编号' ,
PRIMARY KEY (`cdkey`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `cardnum`
-- ----------------------------
DROP TABLE IF EXISTS `cardnum`;
CREATE TABLE `cardnum` (
`type`  tinyint(4) NOT NULL COMMENT '卡包类型' ,
`num`  int(11) NOT NULL DEFAULT 0 COMMENT '当前数量' ,
PRIMARY KEY (`type`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `charge_order`
-- ----------------------------
DROP TABLE IF EXISTS `charge_order`;
CREATE TABLE `charge_order` (
`oid`  varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`uid`  varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`pid`  bigint(20) NOT NULL ,
`gold`  int(11) NOT NULL ,
`rmb`  float NOT NULL ,
`time`  int(11) NOT NULL ,
PRIMARY KEY (`oid`),
INDEX `oid` USING BTREE (`oid`) ,
INDEX `uid` USING BTREE (`uid`) ,
INDEX `pid` USING BTREE (`pid`) ,
INDEX `gold` USING BTREE (`gold`) ,
INDEX `time` USING BTREE (`time`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
`pid`  bigint(20) NOT NULL COMMENT '色角pid' ,
`citys`  blob NULL COMMENT '地领数据' ,
`lastCollect`  int(11) NOT NULL COMMENT '上次领取奖励时间' ,
PRIMARY KEY (`pid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `cityfight`
-- ----------------------------
DROP TABLE IF EXISTS `cityfight`;
CREATE TABLE `cityfight` (
`citySid`  smallint(6) NOT NULL ,
`alongCountryId`  tinyint(4) NULL DEFAULT NULL ,
`leaveSeconds`  smallint(6) NULL DEFAULT NULL ,
`roundNum`  smallint(6) NULL DEFAULT NULL ,
`firstAttCountry`  tinyint(4) NULL DEFAULT NULL ,
`attacts`  blob NULL ,
`defences`  blob NULL ,
`fighting`  tinyint(4) NULL DEFAULT NULL ,
`fightLogs`  blob NULL ,
`fightResultMap`  blob NULL ,
`cityFightData`  blob NULL ,
`fightPlayerMap`  blob NULL COMMENT '参与城战的玩家pid集合' ,
PRIMARY KEY (`citySid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
`type`  tinyint(4) NOT NULL COMMENT '国家类型' ,
`mayorMap`  blob NULL COMMENT '主城表' ,
`rankList`  blob NULL COMMENT '功勋排行榜' ,
`flushTime`  int(11) NULL DEFAULT NULL ,
`lastOutPutTime`  int(11) NULL DEFAULT NULL COMMENT '上次资源产出时间' ,
`mapCityList`  blob NULL ,
`scienceList`  blob NULL COMMENT '国家科技' ,
`domestic`  int(11) NULL DEFAULT NULL COMMENT '内政科技点' ,
`war`  int(11) NULL DEFAULT NULL COMMENT '军事科技点' ,
`sourceCount`  int(11) NULL DEFAULT NULL COMMENT '资源点' ,
`citySource`  blob NULL COMMENT '城市产出资源点' ,
`conveneMap`  blob NULL COMMENT '拉令' ,
`emperorWinCountry`  bigint(4) NULL DEFAULT NULL COMMENT '是否是迎天子活动胜利国家' ,
PRIMARY KEY (`type`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `countrytask`
-- ----------------------------
DROP TABLE IF EXISTS `countrytask`;
CREATE TABLE `countrytask` (
`id`  int(11) NOT NULL ,
`task1`  blob NOT NULL COMMENT '任务1' ,
`task2`  blob NOT NULL COMMENT '任务2' ,
`time`  int(11) NOT NULL COMMENT '时间' ,
`map`  blob NULL COMMENT '玩家集合' ,
PRIMARY KEY (`id`),
INDEX `id` USING BTREE (`id`) ,
INDEX `time` USING BTREE (`time`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Table structure for `countryunion`
-- ----------------------------
DROP TABLE IF EXISTS `countryunion`;
CREATE TABLE `countryunion` (
`type`  int(11) NOT NULL COMMENT '结盟类型1' ,
`flushTime`  int(11) NOT NULL COMMENT '结盟时间s' ,
`alongCountryId`  int(11) NOT NULL ,
PRIMARY KEY (`type`),
UNIQUE INDEX `type` USING BTREE (`type`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `fightlog`
-- ----------------------------
DROP TABLE IF EXISTS `fightlog`;
CREATE TABLE `fightlog` (
`id`  bigint(20) NOT NULL DEFAULT 0 COMMENT '唯一编号' ,
`data`  blob NULL COMMENT '数据' ,
`type`  tinyint(4) NULL DEFAULT NULL COMMENT '类型' ,
`time`  int(11) NULL DEFAULT NULL COMMENT '时间' ,
PRIMARY KEY (`id`),
INDEX `id` USING BTREE (`id`) ,
INDEX `time` USING BTREE (`time`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `friends`
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
`playerID`  bigint(20) NOT NULL COMMENT '玩家PID' ,
`friends`  blob NULL COMMENT '好友列表' ,
PRIMARY KEY (`playerID`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `gift`
-- ----------------------------
DROP TABLE IF EXISTS `gift`;
CREATE TABLE `gift` (
`bag_id`  int(11) NOT NULL DEFAULT 0 ,
`bag_name`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' ,
`bag_icon`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' ,
`bag_desc`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`bag_time`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' ,
`bag_item_type1`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number1`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name1`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type2`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number2`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name2`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type3`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number3`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name3`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type4`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number4`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name4`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type5`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number5`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name5`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type6`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number6`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name6`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type7`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number7`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name7`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type8`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number8`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name8`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type9`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number9`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name9`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`bag_item_type10`  varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`bag_item_id_number10`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`type_name10`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
PRIMARY KEY (`bag_id`),
UNIQUE INDEX `bag_id` USING BTREE (`bag_id`) ,
INDEX `bag_name` USING BTREE (`bag_name`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `giftaward`
-- ----------------------------
DROP TABLE IF EXISTS `giftaward`;
CREATE TABLE `giftaward` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`pid`  bigint(20) NOT NULL DEFAULT 0 ,
`giftID`  int(11) NOT NULL DEFAULT 0 ,
`state`  tinyint(4) NOT NULL DEFAULT 0 ,
`giftType`  tinyint(4) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id`),
INDEX `uid` USING BTREE (`pid`) ,
INDEX `giftID` USING BTREE (`giftID`) ,
INDEX `state` USING BTREE (`state`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Table structure for `mail`
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
`id`  bigint(20) NOT NULL COMMENT '唯一ID' ,
`content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮件内容' ,
`receiverId`  bigint(20) NOT NULL COMMENT '收件人ID' ,
`senderId`  bigint(20) NOT NULL COMMENT '发件人ID' ,
`sendTime`  int(20) NOT NULL COMMENT '发送时间' ,
`state`  tinyint(6) NOT NULL COMMENT '状态（0未读1已读）' ,
`title`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮件标题' ,
PRIMARY KEY (`id`),
INDEX `receiverId` USING BTREE (`receiverId`) ,
INDEX `state` USING BTREE (`state`) ,
INDEX `sendTime` USING BTREE (`sendTime`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `mail_fight`
-- ----------------------------
DROP TABLE IF EXISTS `mail_fight`;
CREATE TABLE `mail_fight` (
`id`  bigint(20) NOT NULL COMMENT '唯一ID' ,
`content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮件内容' ,
`receiverId`  bigint(20) NOT NULL COMMENT '收件人ID' ,
`senderId`  bigint(20) NOT NULL COMMENT '发件人ID' ,
`sendTime`  int(20) NOT NULL COMMENT '发送时间' ,
`state`  tinyint(6) NOT NULL COMMENT '状态（0未读1已读）' ,
`title`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮件标题' ,
`fightId`  bigint(20) NULL DEFAULT NULL COMMENT '战报里的战斗SID' ,
PRIMARY KEY (`id`),
INDEX `receiverId` USING BTREE (`receiverId`) ,
INDEX `state` USING BTREE (`state`) ,
INDEX `sendTime` USING BTREE (`sendTime`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `mail_system`
-- ----------------------------
DROP TABLE IF EXISTS `mail_system`;
CREATE TABLE `mail_system` (
`id`  bigint(20) NOT NULL COMMENT '唯一ID' ,
`content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮件内容' ,
`receiverId`  bigint(20) NOT NULL COMMENT '收件人ID' ,
`senderId`  bigint(20) NOT NULL COMMENT '发件人ID' ,
`sendTime`  int(20) NOT NULL COMMENT '发送时间' ,
`state`  tinyint(6) NOT NULL COMMENT '状态（0未读1已读）' ,
`title`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮件标题' ,
`award`  blob NULL COMMENT '附件' ,
`isGet`  tinyint(6) NULL DEFAULT NULL COMMENT '是否领取了附件（0:未领取1：已领取）' ,
PRIMARY KEY (`id`),
INDEX `receiverId` USING BTREE (`receiverId`) ,
INDEX `state` USING BTREE (`state`) ,
INDEX `sendTime` USING BTREE (`sendTime`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `offline_player_data`
-- ----------------------------
DROP TABLE IF EXISTS `offline_player_data`;
CREATE TABLE `offline_player_data` (
`pid`  bigint(20) NOT NULL COMMENT '玩家唯一ID' ,
`killNums`  bigint(20) NULL DEFAULT 0 COMMENT '每日击杀数' ,
`isGm`  tinyint(4) NULL DEFAULT NULL COMMENT '是否GM' ,
`killNumsTime`  int(11) NULL DEFAULT NULL COMMENT '杀敌变化时间' ,
`country`  tinyint(4) NULL DEFAULT NULL COMMENT '国家id' ,
`nobiLv`  tinyint(4) NULL DEFAULT NULL COMMENT '爵位等级' ,
`vipLv`  tinyint(4) NULL DEFAULT NULL COMMENT 'vip等级' ,
PRIMARY KEY (`pid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `open_server_act`
-- ----------------------------
DROP TABLE IF EXISTS `open_server_act`;
CREATE TABLE `open_server_act` (
`activityId`  int(11) NOT NULL DEFAULT 0 COMMENT '活动SID' ,
`start`  smallint(6) NULL DEFAULT NULL COMMENT '活动是否开启0否1是' ,
`had_get_award`  blob NULL COMMENT '领过普通奖励玩家集合' ,
`gold_map`  blob NULL COMMENT '至尊排行榜' ,
`had_get_gold`  blob NULL COMMENT '领过至尊奖励的玩家集合' ,
PRIMARY KEY (`activityId`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `open_server_time`
-- ----------------------------
DROP TABLE IF EXISTS `open_server_time`;
CREATE TABLE `open_server_time` (
`id`  tinyint(4) NOT NULL COMMENT '主键ID,默认为1' ,
`time`  int(11) NULL DEFAULT NULL COMMENT '开服时间' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `personalshop`
-- ----------------------------
DROP TABLE IF EXISTS `personalshop`;
CREATE TABLE `personalshop` (
`playerId`  bigint(20) NOT NULL COMMENT '玩家ID' ,
`lastRefreshTime`  int(11) NOT NULL COMMENT '上次刷新时间' ,
`shopProps`  blob NOT NULL COMMENT '商店物品' ,
PRIMARY KEY (`playerId`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `player`
-- ----------------------------
DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
`pid`  bigint(20) NOT NULL DEFAULT 0 COMMENT '角色唯一id' ,
`name`  varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '角色名' ,
`uid`  varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '账号id' ,
`sid`  int(11) NOT NULL DEFAULT 0 COMMENT '角色模板id' ,
`plantID`  int(11) NOT NULL DEFAULT 0 COMMENT '平台id' ,
`serverID`  int(11) NOT NULL DEFAULT 0 COMMENT '服务器id' ,
`loginTime`  int(11) NULL DEFAULT NULL COMMENT '登陆时间' ,
`logoutTime`  int(11) NULL DEFAULT NULL COMMENT '登出时间' ,
`loginIP`  varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '登陆ip' ,
`country`  tinyint(4) NOT NULL COMMENT '国家' ,
`bundle`  blob NULL COMMENT '背包' ,
`sysGold`  int(11) NULL DEFAULT NULL COMMENT '统系金币' ,
`gold`  int(11) NULL DEFAULT NULL COMMENT '充值得到的金币' ,
`money`  int(11) NULL DEFAULT NULL COMMENT '铜币值' ,
`food`  int(11) NULL DEFAULT NULL COMMENT '粮食值' ,
`wood`  int(11) NULL DEFAULT NULL COMMENT '木材值' ,
`iron`  int(11) NULL DEFAULT NULL COMMENT '铁锭值' ,
`exp`  int(11) NULL DEFAULT NULL COMMENT '经验值' ,
`pep`  int(11) NULL DEFAULT NULL COMMENT '劳役值' ,
`tech`  int(11) NULL DEFAULT NULL COMMENT '文化值' ,
`equip`  int(11) NULL DEFAULT NULL COMMENT '军械值' ,
`train`  int(11) NULL DEFAULT NULL COMMENT '训练值' ,
`fightScore`  bigint(20) NULL DEFAULT NULL COMMENT '总功勋' ,
`ginger`  int(11) NULL DEFAULT NULL COMMENT '英雄令' ,
`reflushTime`  int(11) NULL DEFAULT NULL COMMENT '英雄令更新时间s' ,
`chaptersMap`  blob NULL COMMENT '副本章节信息' ,
`luckState`  blob NULL COMMENT '武将亲密度数据' ,
`militaryArry`  blob NULL COMMENT '招募到的武将' ,
`tasksMark`  blob NULL COMMENT '完成的任务标记' ,
`tasks`  blob NULL COMMENT '接收的任务' ,
`dailyTasks`  blob NULL COMMENT '日常任务容器' ,
`strengthLvArr`  blob NULL COMMENT '强化等级数组' ,
`soldierBox`  blob NULL COMMENT '兵营' ,
`woundedBox`  blob NULL COMMENT '治疗所' ,
`fightTeamBox`  blob NULL COMMENT '编组数据' ,
`kingEffects`  blob NULL COMMENT '君主科技' ,
`visitNum`  int(11) NULL DEFAULT NULL COMMENT '已探访数量' ,
`allVisitNum`  int(11) NULL DEFAULT NULL COMMENT '全部探访次数' ,
`visitOlineTime`  int(11) NULL DEFAULT NULL COMMENT '探访在线时间' ,
`lastVisitSid`  int(11) NULL DEFAULT NULL COMMENT '最后一次探访sid' ,
`visitList`  blob NULL COMMENT '已探访集合' ,
`onlineTime`  int(11) NULL DEFAULT NULL COMMENT '在线时长' ,
`lastAddVisitNumTime`  int(11) NULL DEFAULT NULL COMMENT '最后一次添加时间' ,
`cityAwards`  int(11) NULL DEFAULT NULL ,
`officials`  blob NULL COMMENT '官职对应武将ID数组' ,
`recruit`  int(11) NULL DEFAULT NULL COMMENT '募兵令' ,
`provokeTimes`  int(11) NULL DEFAULT NULL ,
`playerEffects`  blob NULL ,
`roleMuteTime`  int(11) NULL DEFAULT NULL COMMENT '禁言时间' ,
`producePoints`  blob NULL ,
`vip`  int(11) NULL DEFAULT NULL COMMENT 'VIP等级' ,
`getVipGift`  int(11) NULL DEFAULT NULL COMMENT '是否获取礼包1已经领取' ,
`restricbuynum`  blob NULL COMMENT 'VIP限购物品及已购买次数' ,
`payGold`  int(11) NULL DEFAULT NULL COMMENT '充值元宝数' ,
`nowFightScore`  bigint(20) NULL DEFAULT NULL COMMENT '当前功勋' ,
`dayFightScore`  bigint(20) NULL DEFAULT NULL COMMENT '每日总功勋' ,
`dayFightScoreBox`  int(11) NULL DEFAULT NULL COMMENT '当前功勋宝箱数量' ,
`fightScoreBoxIndex`  int(11) NULL DEFAULT NULL COMMENT 'fightScoreBoxIndex' ,
`woundedTime`  int(11) NULL DEFAULT NULL ,
`dayKillNums`  bigint(20) NULL DEFAULT NULL COMMENT '每日击杀数' ,
`updateTime`  int(11) NULL DEFAULT NULL COMMENT '更新时间（目前每日功勋和每日击杀）' ,
`adultOnlineTime`  int(11) NULL DEFAULT NULL COMMENT '防沉迷在线时间s' ,
`totalOfflineTime`  int(11) NULL DEFAULT NULL COMMENT ' 防沉迷累计下线时长' ,
`prestige`  int(11) NULL DEFAULT NULL COMMENT '总声望' ,
`nowPrestige`  int(11) NULL DEFAULT NULL COMMENT '当前声望' ,
`vipOnce`  int(6) NULL DEFAULT 1 COMMENT 'VIP一次性礼包领取状态' ,
`dailyOnlineTime`  int(11) NULL DEFAULT NULL COMMENT '每日在线时长' ,
`firstOnlineGiftState`  int(11) NULL DEFAULT NULL COMMENT '首次在线礼包状态' ,
`dailyOnlineGiftState`  int(11) NULL DEFAULT NULL COMMENT '每日在线礼包状态' ,
`singleCountryTaskNums`  int(11) NULL DEFAULT NULL COMMENT '每天国家个人任务完成数' ,
`singleCountryTask`  blob NULL COMMENT '国家个人任务' ,
`countryTask`  blob NULL COMMENT '国家任务' ,
`emperorGiftState`  bigint(4) NULL DEFAULT NULL COMMENT '国家礼包领取状态' ,
`emperorRankAward`  bigint(4) NULL DEFAULT NULL COMMENT '排行奖励是否领取' ,
`singleCountryTaskNumsReciveTime`  int(11) NULL DEFAULT NULL COMMENT '国家个人任务接取时间' ,
`lastGetSourceTime`  int(11) NULL DEFAULT NULL COMMENT '玩家上次领取资源点奖励时间' ,
`famousGeneral`  blob NULL COMMENT '将星录数据存储' ,
`dailyCityFightFightScore`  int(11) NULL DEFAULT NULL COMMENT '每日战场功勋' ,
`cbundle`  blob NULL COMMENT '宝物包裹' ,
`resetFightScoreNum`  int(11) NULL DEFAULT NULL COMMENT '重置每日战场功勋次数' ,
`autoRestFightScore`  tinyint(1) NULL DEFAULT 0 COMMENT '是否自动重置战场功勋' ,
`loginActivityData`  blob NULL COMMENT '登陆活动数据' ,
`gbundle`  blob NULL ,
`resetCountryTaskNum`  int(6) NULL DEFAULT NULL COMMENT '重置国家个人任务次数' ,
`autoIncrSoldier`  int(11) NULL DEFAULT NULL COMMENT '是否自动补兵' ,
PRIMARY KEY (`pid`),
INDEX `pid` USING BTREE (`pid`) ,
INDEX `name` USING BTREE (`name`) ,
INDEX `uid` USING BTREE (`uid`) ,
INDEX `plantID` USING BTREE (`plantID`) ,
INDEX `serverID` USING BTREE (`serverID`) ,
INDEX `fightScore` USING BTREE (`fightScore`) 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin

;

-- ----------------------------
-- Table structure for `ranks`
-- ----------------------------
DROP TABLE IF EXISTS `ranks`;
CREATE TABLE `ranks` (
`type`  tinyint(5) NOT NULL COMMENT '排行榜类型' ,
`rank`  blob NOT NULL COMMENT '排行榜内容' ,
PRIMARY KEY (`type`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `ranks_show`
-- ----------------------------
DROP TABLE IF EXISTS `ranks_show`;
CREATE TABLE `ranks_show` (
`type`  tinyint(5) NOT NULL COMMENT '排行榜类型' ,
`rank`  blob NOT NULL COMMENT '排行榜内容' ,
PRIMARY KEY (`type`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `saveoldtime`
-- ----------------------------
DROP TABLE IF EXISTS `saveoldtime`;
CREATE TABLE `saveoldtime` (
`id`  smallint(6) NOT NULL DEFAULT 1 COMMENT '主键，无实意' ,
`saveOldTime`  int(11) NOT NULL DEFAULT 0 COMMENT '更新历史排行榜时间' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `uid`
-- ----------------------------
DROP TABLE IF EXISTS `uid`;
CREATE TABLE `uid` (
`type`  tinyint(6) NOT NULL DEFAULT 0 ,
`number`  int(11) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`type`),
INDEX `type` USING BTREE (`type`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`uid`  varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '账号id' ,
`userName`  varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '账号' ,
`immure`  int(11) NULL DEFAULT NULL COMMENT '封号截止时间' ,
`ip`  varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '创建ip' ,
`gm`  tinyint(4) NULL DEFAULT NULL COMMENT 'gm' ,
PRIMARY KEY (`uid`),
INDEX `uid` USING BTREE (`uid`) ,
INDEX `userName` USING BTREE (`userName`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin

;

-- ----------------------------
-- Table structure for `wildteam`
-- ----------------------------
DROP TABLE IF EXISTS `wildteam`;
CREATE TABLE `wildteam` (
`id`  int(11) NOT NULL ,
`pid`  bigint(20) NOT NULL COMMENT '出征角色pid' ,
`country`  tinyint(4) NOT NULL ,
`type`  tinyint(4) NOT NULL ,
`data`  blob NULL ,
`award`  blob NULL ,
`takeFood`  int(11) NULL DEFAULT NULL ,
`fatigue`  int(11) NULL DEFAULT NULL ,
`lastDecrFatigueTime`  int(11) NULL DEFAULT NULL ,
`CDStartTime`  int(11) NULL DEFAULT NULL ,
`lastWoundTime`  int(11) NULL DEFAULT NULL ,
`activityId`  int(11) NULL DEFAULT NULL ,
`state`  tinyint(4) NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
UNIQUE INDEX `id` USING BTREE (`id`) ,
INDEX `pid` USING BTREE (`pid`) ,
INDEX `type` USING BTREE (`type`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `will_award`
-- ----------------------------
DROP TABLE IF EXISTS `will_award`;
CREATE TABLE `will_award` (
`uid`  bigint(20) NOT NULL AUTO_INCREMENT COMMENT '未领取奖励唯一ID' ,
`pid`  bigint(20) NOT NULL DEFAULT 0 COMMENT '玩家ID' ,
`type`  smallint(6) NULL DEFAULT NULL COMMENT '奖励类型' ,
`awardStage`  smallint(6) NULL DEFAULT NULL COMMENT '奖励阶位' ,
`isOther`  smallint(6) NULL DEFAULT NULL COMMENT '是否有额外奖励' ,
`clientStr`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '前台用字符串' ,
`addTime`  int(11) NULL DEFAULT NULL COMMENT '添加时间' ,
PRIMARY KEY (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Table structure for `world_fight`
-- ----------------------------
DROP TABLE IF EXISTS `world_fight`;
CREATE TABLE `world_fight` (
`id`  int(11) NOT NULL COMMENT '战斗类型id，用于数据库存贮的主键' ,
`activityId`  int(11) NULL DEFAULT 0 ,
`fighting`  tinyint(4) NULL DEFAULT 0 ,
`param0`  blob NULL ,
`param1`  blob NULL ,
`param2`  blob NULL ,
`param3`  blob NULL ,
`denCountry`  tinyint(4) NULL DEFAULT NULL COMMENT '防守国家' ,
`winCountry`  tinyint(4) NULL DEFAULT NULL COMMENT '胜利方（1:守方胜利2：攻方胜利）' ,
`players`  blob NULL COMMENT '进入过迎天子活动的所有玩家' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Table structure for `worldcity`
-- ----------------------------
DROP TABLE IF EXISTS `worldcity`;
CREATE TABLE `worldcity` (
`sid`  smallint(6) NOT NULL COMMENT '世界城市sid' ,
`lastGetTime`  int(11) NULL DEFAULT NULL COMMENT '城主礼包领取时间' ,
`countyId`  tinyint(4) NULL DEFAULT NULL COMMENT '所属国家' ,
`teamIds`  blob NULL ,
`lastFlushSolider`  blob NULL ,
`producePoint`  int(11) NULL DEFAULT NULL ,
`lastFlushTime`  int(11) NULL DEFAULT NULL COMMENT '上次刷新属性点的时间' ,
`lastFlushTimeToPlayer`  int(11) NULL DEFAULT NULL COMMENT '上次增加玩家新属性点的时间' ,
`isHold`  tinyint(4) NULL DEFAULT NULL COMMENT '城市是否被非NPC占领过' ,
PRIMARY KEY (`sid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Auto increment value for `giftaward`
-- ----------------------------
ALTER TABLE `giftaward` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `will_award`
-- ----------------------------
ALTER TABLE `will_award` AUTO_INCREMENT=1;
