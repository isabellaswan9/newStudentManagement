/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : xk

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2021-06-07 14:18:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminNo` char(8) NOT NULL,
  `adminName` char(8) NOT NULL,
  `Pwd` char(8) NOT NULL,
  PRIMARY KEY (`adminNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('00000000', 'admin', '00000000');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `ClassNo` char(8) NOT NULL,
  `DepartNo` char(2) NOT NULL,
  `ClassName` char(20) NOT NULL,
  PRIMARY KEY (`ClassNo`),
  KEY `DepartNo` (`DepartNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('20000001', '01', '00电子商务');
INSERT INTO `class` VALUES ('20000002', '01', '00多媒体');
INSERT INTO `class` VALUES ('20000003', '01', '00数据库');
INSERT INTO `class` VALUES ('20000004', '02', '00建筑管理');
INSERT INTO `class` VALUES ('20000005', '02', '00建筑电气');
INSERT INTO `class` VALUES ('20000006', '03', '00旅游管理');
INSERT INTO `class` VALUES ('20010001', '01', '01电子商务');
INSERT INTO `class` VALUES ('20010002', '01', '01多媒体');
INSERT INTO `class` VALUES ('20010003', '01', '01数据库');
INSERT INTO `class` VALUES ('20010004', '02', '01建筑管理');
INSERT INTO `class` VALUES ('20010005', '02', '01建筑电气');
INSERT INTO `class` VALUES ('20010006', '03', '01旅游管理');
INSERT INTO `class` VALUES ('20020001', '01', '02电子商务');
INSERT INTO `class` VALUES ('20020002', '01', '02多媒体');
INSERT INTO `class` VALUES ('20020003', '01', '02数据库');
INSERT INTO `class` VALUES ('20020004', '02', '02建筑管理');
INSERT INTO `class` VALUES ('20020005', '02', '02建筑电气');
INSERT INTO `class` VALUES ('20020006', '03', '02旅游管理');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `CouNo` char(3) NOT NULL,
  `CouName` char(30) NOT NULL,
  `Kind` char(10) NOT NULL,
  `Credit` decimal(5,0) NOT NULL,
  `Teacher` char(20) NOT NULL,
  `DepartNo` char(2) NOT NULL,
  `time1` tinyint(2) NOT NULL DEFAULT '0',
  `time2` tinyint(2) DEFAULT '0',
  `time3` tinyint(2) DEFAULT '0',
  `LimitNum` decimal(5,0) NOT NULL,
  `WillNum` decimal(5,0) NOT NULL,
  `ChooseNum` decimal(5,0) NOT NULL,
  `Classroom` varchar(20) NOT NULL,
  PRIMARY KEY (`CouNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('001', 'SQL SERVER技术与应用', '工程技术', '3', '林睿', '01', '1', '3', '0', '25', '43', '0', '理南105');
INSERT INTO `course` VALUES ('002', 'JAVA技术与应用', '工程技术', '3', '林睿', '01', '5', '7', '0', '25', '35', '0', '');
INSERT INTO `course` VALUES ('003', '网络信息检索原理与技术', '信息技术', '2', '李涛', '01', '7', '4', '23', '10', '29', '0', '');
INSERT INTO `course` VALUES ('004', 'Linux操作系统', '信息技术', '2', '郑星', '01', '6', '9', '11', '10', '33', '0', '');
INSERT INTO `course` VALUES ('005', 'Premiere6.0影视制作', '信息技术', '2', '李韵婷', '01', '7', '5', '2', '20', '27', '0', '理北403');
INSERT INTO `course` VALUES ('007', 'Delphi初级程序员', '信息技术', '2', '李兰', '01', '3', '6', '24', '20', '27', '0', '');
INSERT INTO `course` VALUES ('008', 'ASP.NET应用', '信息技术', '3', '曾建华', '01', '15', '0', '0', '10', '45', '0', '');
INSERT INTO `course` VALUES ('009', '水资源利用管理与保护', '工程技术', '2', '叶艳茵', '02', '0', '0', '0', '10', '31', '0', '');
INSERT INTO `course` VALUES ('010', '中级电工理论2', '工程技术', '3', '范敬丽', '02', '0', '0', '0', '5', '24', '0', '');
INSERT INTO `course` VALUES ('012', '智能建筑', '工程技术', '2', '王娜', '02', '0', '0', '0', '10', '21', '0', '');
INSERT INTO `course` VALUES ('013', '房地产漫谈', '人文', '2', '黄强', '02', '0', '0', '0', '10', '36', '0', '');
INSERT INTO `course` VALUES ('014', '科技与探索', '人文', '2', '顾苑玲', '02', '0', '0', '0', '10', '24', '0', '');
INSERT INTO `course` VALUES ('015', '民俗风情旅游', '管理', '2', '杨国润', '03', '0', '0', '0', '20', '33', '0', '');
INSERT INTO `course` VALUES ('016', '旅行社经营管理', '管理', '2', '黄文昌', '03', '0', '0', '0', '20', '36', '0', '');
INSERT INTO `course` VALUES ('017', '世界旅游', '人文', '2', '盛德文', '03', '0', '0', '0', '10', '27', '0', '');
INSERT INTO `course` VALUES ('018', '中餐菜肴制作', '人文', '2', '卢萍', '03', '0', '0', '0', '5', '66', '0', '');
INSERT INTO `course` VALUES ('019', '电子出版概论', '工程技术', '2', '李力', '03', '0', '0', '0', '10', '0', '0', '');
INSERT INTO `course` VALUES ('020', 'java', '信息技术', '0', '李白', '03', '1', '2', '3', '30', '0', '0', '理北111');
INSERT INTO `course` VALUES ('021', '网络安全', '信息技术', '3', '郑星', '02', '7', '19', '0', '50', '0', '0', '文新216');
INSERT INTO `course` VALUES ('022', 'Web安全', '信息技术', '2', '李兰', '03', '12', '16', '0', '50', '0', '0', '文新217');

-- ----------------------------
-- Table structure for coursetime
-- ----------------------------
DROP TABLE IF EXISTS `coursetime`;
CREATE TABLE `coursetime` (
  `StuNo` varchar(20) NOT NULL,
  `1` char(3) DEFAULT '' COMMENT '周一第一节,0表示没有课',
  `2` char(3) DEFAULT '',
  `3` char(3) DEFAULT '',
  `4` char(3) DEFAULT '',
  `5` char(3) DEFAULT '',
  `6` char(3) DEFAULT '',
  `7` char(3) DEFAULT '',
  `8` char(3) DEFAULT '',
  `9` char(3) DEFAULT '',
  `10` char(3) DEFAULT '',
  `11` char(3) DEFAULT '',
  `12` char(3) DEFAULT '',
  `13` char(3) DEFAULT '',
  `14` char(3) DEFAULT '',
  `15` char(3) DEFAULT '',
  `16` char(3) DEFAULT '',
  `17` char(3) DEFAULT '',
  `18` char(3) DEFAULT '',
  `19` char(3) DEFAULT '',
  `20` char(3) DEFAULT '',
  `21` char(3) DEFAULT '',
  `22` char(3) DEFAULT '',
  `23` char(3) DEFAULT '',
  `24` char(3) DEFAULT '',
  `25` char(3) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of coursetime
-- ----------------------------
INSERT INTO `coursetime` VALUES ('12345678', '', '005', '', '', '005', '', '005', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('123456789', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('12345696', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `DepartNo` char(2) NOT NULL,
  `DepartName` char(20) NOT NULL,
  PRIMARY KEY (`DepartNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('01', '自动化');
INSERT INTO `department` VALUES ('02', '信息工程');
INSERT INTO `department` VALUES ('03', '电子科学与技术');
INSERT INTO `department` VALUES ('00', '通信工程');
INSERT INTO `department` VALUES ('04', '电气工程及其自动化');

-- ----------------------------
-- Table structure for schooltimeno_copy
-- ----------------------------
DROP TABLE IF EXISTS `schooltimeno_copy`;
CREATE TABLE `schooltimeno_copy` (
  `timenum` int(2) NOT NULL,
  `timename` char(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of schooltimeno_copy
-- ----------------------------

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `StuNo` char(8) CHARACTER SET utf8 NOT NULL,
  `CouNo` char(3) CHARACTER SET utf8mb4 NOT NULL,
  `score` char(5) CHARACTER SET utf8mb4 NOT NULL,
  `flag` int(3) DEFAULT NULL,
  PRIMARY KEY (`StuNo`,`CouNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES ('12345677', '001', '1', '1');
INSERT INTO `score` VALUES ('12345678', '001', '1', '1');
INSERT INTO `score` VALUES ('12345679', '001', '33', '1');
INSERT INTO `score` VALUES ('12345680', '001', '35', '1');
INSERT INTO `score` VALUES ('12345690', '001', '33', '1');
INSERT INTO `score` VALUES ('12345691', '001', '33', '1');
INSERT INTO `score` VALUES ('12345692', '001', '33', '1');
INSERT INTO `score` VALUES ('12345693', '001', '79', '1');
INSERT INTO `score` VALUES ('12345694', '001', '80', '1');
INSERT INTO `score` VALUES ('12345695', '001', '88', '1');
INSERT INTO `score` VALUES ('12345696', '001', '94', '1');

-- ----------------------------
-- Table structure for stucou
-- ----------------------------
DROP TABLE IF EXISTS `stucou`;
CREATE TABLE `stucou` (
  `StuNo` char(8) NOT NULL,
  `CouNo` char(3) NOT NULL,
  `WillOrder` smallint(6) NOT NULL,
  `State` char(2) NOT NULL,
  `RandomNum` char(50) DEFAULT NULL,
  PRIMARY KEY (`StuNo`,`CouNo`),
  KEY `CouNo` (`CouNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stucou
-- ----------------------------
INSERT INTO `stucou` VALUES ('', '', '1', '报名', null);
INSERT INTO `stucou` VALUES ('12345678', '005', '1', '报名', null);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `StuNo` char(8) NOT NULL,
  `ClassNo` char(8) NOT NULL,
  `StuName` char(10) NOT NULL,
  `Pwd` char(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StuNo`),
  KEY `ClassNo` (`ClassNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('12345677', '1', '胡歌', '12345678');
INSERT INTO `student` VALUES ('12345678', '1', '林睿', '12345678');
INSERT INTO `student` VALUES ('12345679', '1', '苏木', '12345678');
INSERT INTO `student` VALUES ('12345690', '1', '杜甫', '12345678');
INSERT INTO `student` VALUES ('12345691', '2', '苏轼', '12345678');
INSERT INTO `student` VALUES ('12345692', '2', '辛弃疾', '12345678');
INSERT INTO `student` VALUES ('12345693', '2', '杜牧', '12345678');
INSERT INTO `student` VALUES ('12345694', '1', '朱自清', '12345678');
INSERT INTO `student` VALUES ('12345695', '1', '朱熹', '12345678');
INSERT INTO `student` VALUES ('12345696', '1', '李宇春', '12345678');
INSERT INTO `student` VALUES ('12345697', '1', '白敬亭', '12345678');
INSERT INTO `student` VALUES ('12345698', '1', '郭晶晶', '12345678');
INSERT INTO `student` VALUES ('12345680', '1', '马小远', '0');
INSERT INTO `student` VALUES ('12345699', '2', '苏韩希', '12345678');
INSERT INTO `student` VALUES ('12345700', '2', '上官仪', '12345678');
INSERT INTO `student` VALUES ('12345701', '2', '林思玲', '00000000');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `TeaNo` char(8) NOT NULL,
  `DepartNo` char(20) NOT NULL,
  `TeaName` char(10) NOT NULL,
  `Pwd` char(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TeaNo`),
  KEY `DepartNo` (`DepartNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('80881234', '通信工程', '林睿', '80881234');
INSERT INTO `teacher` VALUES ('17152000', '通信工程', '黄龙', '12345678');
INSERT INTO `teacher` VALUES ('17152002', '通信工程', '梁与', '00000000');
INSERT INTO `teacher` VALUES ('17152001', '通信工程', '梁燕', '12345678');
INSERT INTO `teacher` VALUES ('17152003', '通信工程', '黄其', '00000000');
INSERT INTO `teacher` VALUES ('17152004', '通信工程', '杨晓', '00000000');

-- ----------------------------
-- View structure for coursetable
-- ----------------------------
DROP VIEW IF EXISTS `coursetable`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `coursetable` AS SELECT StuNo, course.CouNo,CouName,Classroom,time1,time2,time3
from course join stucou
on course.CouNo=stucou.CouNo ;

-- ----------------------------
-- View structure for statistic
-- ----------------------------
DROP VIEW IF EXISTS `statistic`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `statistic` AS select CouNo,max(score) as maxscore,
min(score) as minscore ,
count(*) as stunum , 
sum(case when score>=60 then 1 else 0 end) as passnum ,
avg(score) as avgscore,
count(case when score between 90 and 100 then 1 end) as over90,
count(case when score between 80 and 89 then 1 end)  as over80,
count(case when score between 70 and 79 then 1 end)  as over70, 
count(case when score between 60 and 69 then 1 end)  as over60, 
count(case when score between 50 and 59 then 1 end)  as over50, 
count(case when score between 40 and 49 then 1 end)  as over40, 
count(case when score between 30 and 39 then 1 end)  as over30, 
count(case when score between 20 and 29 then 1 end)  as over20, 
count(case when score between 10 and 19 then 1 end)  as over10,  
count(case when score between 0 and 9 then 1 end)  as over0 
from stugrade GROUP BY CouNo ;

-- ----------------------------
-- View structure for stugrade
-- ----------------------------
DROP VIEW IF EXISTS `stugrade`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `stugrade` AS select student.StuNo,student.StuName,student.ClassNo,score.score,score.CouNo,course.CouName
from student join score 
on student.StuNo=score.StuNo 
join course
on course.CouNo=score.CouNo 
order by score.CouNo,student.StuNo ;
