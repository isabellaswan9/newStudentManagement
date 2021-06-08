/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : xk

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2021-06-08 21:59:07
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
INSERT INTO `course` VALUES ('001', 'SQL SERVER技术与应用', '工程技术', '3', '李丽礼', '01', '1', '3', '0', '25', '43', '0', '理南105');
INSERT INTO `course` VALUES ('002', 'JAVA技术与应用', '工程技术', '3', '许贵宜', '01', '5', '7', '0', '25', '35', '0', '');
INSERT INTO `course` VALUES ('003', '网络信息检索原理与技术', '信息技术', '2', '蔡慧娟', '01', '7', '4', '23', '10', '29', '0', '');
INSERT INTO `course` VALUES ('004', 'Linux操作系统', '信息技术', '2', '江丽娟', '01', '6', '9', '11', '10', '33', '0', '');
INSERT INTO `course` VALUES ('005', 'Premiere6.0影视制作', '信息技术', '2', '刘育冰', '01', '7', '5', '2', '20', '27', '0', '理北403');
INSERT INTO `course` VALUES ('007', 'Delphi初级程序员', '信息技术', '2', '何家', '01', '3', '6', '24', '20', '27', '0', '');
INSERT INTO `course` VALUES ('008', 'ASP.NET应用', '信息技术', '3', '黄慧玲', '01', '15', '0', '0', '10', '45', '0', '');
INSERT INTO `course` VALUES ('009', '水资源利用管理与保护', '工程技术', '2', '王淑勇', '02', '0', '0', '0', '10', '31', '0', '');
INSERT INTO `course` VALUES ('010', '中级电工理论2', '工程技术', '3', '吴亦扬', '02', '0', '0', '0', '5', '24', '0', '');
INSERT INTO `course` VALUES ('012', '智能建筑', '工程技术', '2', '吴佳书', '02', '0', '0', '0', '10', '21', '0', '');
INSERT INTO `course` VALUES ('013', '房地产漫谈', '人文', '2', '赖韵英', '02', '0', '0', '0', '10', '36', '0', '');
INSERT INTO `course` VALUES ('014', '科技与探索', '人文', '2', '杜定鸿', '02', '0', '0', '0', '10', '24', '0', '');
INSERT INTO `course` VALUES ('015', '民俗风情旅游', '管理', '2', '王淑梦', '03', '0', '0', '0', '20', '33', '0', '');
INSERT INTO `course` VALUES ('016', '旅行社经营管理', '管理', '2', '吴伟侑', '03', '0', '0', '0', '20', '36', '0', '');
INSERT INTO `course` VALUES ('017', '世界旅游', '人文', '2', '萧芳仪', '03', '0', '0', '0', '10', '27', '0', '');
INSERT INTO `course` VALUES ('018', '中餐菜肴制作', '人文', '2', '黄宜君', '03', '0', '0', '0', '5', '66', '0', '');
INSERT INTO `course` VALUES ('019', '电子出版概论', '工程技术', '2', '罗智钧', '03', '0', '0', '0', '10', '0', '0', '');
INSERT INTO `course` VALUES ('020', 'java', '信息技术', '0', '刘淑娟', '03', '1', '2', '3', '30', '0', '0', '理北111');
INSERT INTO `course` VALUES ('021', '网络安全', '信息技术', '3', '李慈泉', '02', '7', '19', '0', '50', '0', '0', '文新216');
INSERT INTO `course` VALUES ('022', 'Web安全', '信息技术', '2', '丁容定', '03', '12', '16', '0', '50', '0', '0', '文新217');

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
INSERT INTO `coursetime` VALUES ('20180001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180002', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180003', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180004', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180005', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180006', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180007', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180012', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180013', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180014', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180015', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180016', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180019', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180020', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180021', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180022', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180023', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180026', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180027', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180028', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180029', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180030', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180031', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180032', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180033', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180034', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180035', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180036', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180037', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180038', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180039', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180040', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180041', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180042', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180043', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180044', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180045', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180046', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180047', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180048', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180049', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180050', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180051', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180052', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180053', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180054', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180055', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180056', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180057', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180058', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180059', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180060', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180061', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180062', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180063', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180064', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180065', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180066', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180067', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180068', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180069', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180070', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180071', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180072', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180073', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180074', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180075', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180076', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180077', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180078', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180079', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180080', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180081', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180082', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180083', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180084', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180085', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180086', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180087', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180088', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180089', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180090', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180091', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180092', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180093', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180094', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180095', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180096', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180097', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180098', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180099', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `coursetime` VALUES ('20180100', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
INSERT INTO `department` VALUES ('01', '数学与信息科学学院');
INSERT INTO `department` VALUES ('02', '外国语学院');
INSERT INTO `department` VALUES ('03', '土木建筑学院');
INSERT INTO `department` VALUES ('04', '计算机学院');
INSERT INTO `department` VALUES ('05', '电气与工程学院');
INSERT INTO `department` VALUES ('', '');
INSERT INTO `department` VALUES ('07', '经济与统计学院');
INSERT INTO `department` VALUES ('08', '汉语文学学院');
INSERT INTO `department` VALUES ('09', '体育学院');

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
INSERT INTO `score` VALUES ('20180001', '001', '1', '1');
INSERT INTO `score` VALUES ('20180002', '001', '1', '1');
INSERT INTO `score` VALUES ('20180003', '001', '33', '1');
INSERT INTO `score` VALUES ('20180004', '001', '35', '1');
INSERT INTO `score` VALUES ('20180005', '001', '33', '1');
INSERT INTO `score` VALUES ('20180006', '001', '33', '1');
INSERT INTO `score` VALUES ('20180007', '001', '33', '1');
INSERT INTO `score` VALUES ('20180008', '001', '79', '1');
INSERT INTO `score` VALUES ('20180009', '001', '80', '1');
INSERT INTO `score` VALUES ('20180010', '001', '88', '1');
INSERT INTO `score` VALUES ('20180011', '001', '94', '1');

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
INSERT INTO `stucou` VALUES ('12345678', '', '1', '报名', null);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `StuNo` char(8) NOT NULL,
  `ClassNo` char(8) NOT NULL,
  `StuName` char(10) NOT NULL,
  `Pwd` char(20) NOT NULL DEFAULT '0',
  `Depart` char(20) DEFAULT NULL,
  PRIMARY KEY (`StuNo`),
  KEY `ClassNo` (`ClassNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('20180002', '181', '林国瑞', '00000002', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180003', '181', '林玫书', '00000003', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180004', '181', '林雅南', '00000004', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180005', '181', '江奕云', '00000005', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180006', '181', '刘柏宏', '00000006', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180007', '181', '阮建安', '00000007', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180008', '181', '林子帆', '00000008', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180009', '181', '夏志豪', '00000009', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180010', '181', '吉茹定', '00000010', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180011', '181', '李中冰', '00000011', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180012', '181', '黄文隆', '00000012', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180013', '181', '谢彦文', '00000013', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180014', '181', '傅智翔', '00000014', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180015', '181', '洪振霞', '00000015', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180016', '181', '刘姿婷', '00000016', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180017', '181', '荣姿康', '00000017', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180018', '181', '吕致盈', '00000018', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180019', '181', '方一强', '00000019', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180020', '181', '黎贵', '00000020', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180021', '181', '郑伊雯', '00000021', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180022', '181', '雷进宝', '00000022', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180023', '181', '吴美隆', '00000023', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180024', '181', '吴心真', '00000024', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180025', '181', '王美珠', '00000025', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180026', '181', '郭芳天', '00000026', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180027', '181', '李雅惠', '00000027', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180028', '181', '陈文婷', '00000028', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180029', '181', '曹敏侑', '00000029', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180030', '181', '王依婷', '00000030', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180031', '181', '陈婉璇', '00000031', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180032', '181', '吴美玉', '00000032', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180033', '181', '蔡依婷', '00000033', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180034', '181', '郑昌梦', '00000034', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180035', '181', '林家纶', '00000035', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180036', '181', '黄丽昆', '00000036', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180037', '181', '李育泉', '00000037', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180038', '181', '黄芸欢', '00000038', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180039', '181', '吴韵如', '00000039', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180040', '181', '李肇芬', '00000040', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180041', '181', '卢木仲', '00000041', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180042', '181', '李成白', '00000042', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180043', '181', '方兆玉', '00000043', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180044', '181', '刘翊惠', '00000044', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180045', '181', '丁汉臻', '00000045', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180046', '181', '吴佳瑞', '00000046', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180047', '181', '舒绿', '00000047', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180048', '181', '周白正', '00000048', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180049', '181', '张姿妤', '00000049', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180050', '181', '张虹伦', '00000050', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180051', '181', '周琼坟', '00000051', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180052', '181', '倪怡芳', '00000052', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180053', '181', '郭贵妃', '00000053', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180054', '181', '杨佩芳', '00000054', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180055', '181', '黄文旺', '00000055', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180056', '182', '黄盛玫', '00000056', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180057', '182', '郑丽青', '00000057', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180058', '182', '许智云', '00000058', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180059', '182', '张孟涵', '00000059', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180060', '182', '李小爱', '00000060', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180061', '182', '王恩龙', '00000061', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180062', '182', '朱政廷', '00000062', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180063', '182', '邓诗涵', '00000063', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180064', '182', '陈政倩', '00000064', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180065', '182', '吴俊伯', '00000065', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180066', '182', '阮馨学', '00000066', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180067', '182', '翁惠珠', '00000067', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180068', '182', '吴思翰', '00000068', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180069', '182', '林佩玲', '00000069', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180070', '182', '邓海来', '00000070', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180071', '182', '陈翊依', '00000071', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180072', '182', '李建智', '00000072', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180073', '182', '武淑芬', '00000073', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180074', '182', '金雅琪', '00000074', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180075', '182', '赖怡宜', '00000075', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180076', '182', '黄育霖', '00000076', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180077', '182', '张仪湖', '00000077', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180078', '182', '王俊民', '00000078', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180079', '182', '张诗刚', '00000079', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180080', '182', '林慧颖', '00000080', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180081', '182', '沈俊君', '00000081', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180082', '182', '陈淑好', '00000082', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180083', '182', '李姿伶', '00000083', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180084', '182', '高咏钰', '00000084', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180085', '182', '黄彦宜', '00000085', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180086', '182', '周孟儒', '00000086', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180087', '182', '潘欣臻', '00000087', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180088', '182', '李祯韵', '00000088', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180089', '182', '叶洁启', '00000089', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180090', '182', '梁哲宇', '00000090', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180091', '182', '黄晓萍', '00000091', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180092', '182', '杨雅萍', '00000092', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180093', '182', '卢志铭', '00000093', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180094', '182', '张茂以', '00000094', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180095', '182', '林婉婷', '00000095', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180096', '182', '蔡宜芸', '00000096', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180097', '182', '林瑜', '00000097', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180098', '182', '黄柏仪', '00000098', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180099', '182', '周逸瑚', '00000099', '数学与信息科学学院');
INSERT INTO `student` VALUES ('20180100', '182', '夏雅惠', '00000100', '数学与信息科学学院');

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
INSERT INTO `teacher` VALUES ('20210002', '数学与信息科学学院', '李丽礼', '00000002');
INSERT INTO `teacher` VALUES ('20210003', '数学与信息科学学院', '许贵宜', '00000003');
INSERT INTO `teacher` VALUES ('20210004', '数学与信息科学学院', '蔡慧娟', '00000004');
INSERT INTO `teacher` VALUES ('20210005', '数学与信息科学学院', '江丽娟', '00000005');
INSERT INTO `teacher` VALUES ('20210006', '数学与信息科学学院', '刘育冰', '00000006');
INSERT INTO `teacher` VALUES ('20210007', '数学与信息科学学院', '何家', '00000007');
INSERT INTO `teacher` VALUES ('20210008', '数学与信息科学学院', '黄慧玲', '00000008');
INSERT INTO `teacher` VALUES ('20210009', '数学与信息科学学院', '王淑勇', '00000009');
INSERT INTO `teacher` VALUES ('20210010', '数学与信息科学学院', '吴亦扬', '00000010');
INSERT INTO `teacher` VALUES ('20210011', '数学与信息科学学院', '吴佳书', '00000011');
INSERT INTO `teacher` VALUES ('20210012', '数学与信息科学学院', '祖冠珠', '00000012');
INSERT INTO `teacher` VALUES ('20211001', '外国语学院', '卢俊嘉', '00000001');
INSERT INTO `teacher` VALUES ('20211002', '外国语学院', '郭志铭', '00000002');
INSERT INTO `teacher` VALUES ('20211003', '外国语学院', '罗扬妃', '00000003');
INSERT INTO `teacher` VALUES ('20211004', '外国语学院', '杨淑华', '00000004');
INSERT INTO `teacher` VALUES ('20211005', '外国语学院', '黄好伟', '00000005');
INSERT INTO `teacher` VALUES ('20211006', '外国语学院', '孙维芬', '00000006');
INSERT INTO `teacher` VALUES ('20211007', '外国语学院', '叶宣洁', '00000007');
INSERT INTO `teacher` VALUES ('20211008', '外国语学院', '陈信俐', '00000008');
INSERT INTO `teacher` VALUES ('20211009', '外国语学院', '谢琬婷', '00000009');
INSERT INTO `teacher` VALUES ('20211010', '外国语学院', '陈筱杰', '00000010');
INSERT INTO `teacher` VALUES ('20211011', '外国语学院', '周隆季', '00000011');
INSERT INTO `teacher` VALUES ('20211012', '外国语学院', '涂慧君', '00000012');
INSERT INTO `teacher` VALUES ('20211013', '外国语学院', '陈怡君', '00000013');
INSERT INTO `teacher` VALUES ('20212001', '土木建筑学院', '赖韵英', '00000001');
INSERT INTO `teacher` VALUES ('20212002', '土木建筑学院', '杜定鸿', '00000002');
INSERT INTO `teacher` VALUES ('20212003', '土木建筑学院', '王淑梦', '00000003');
INSERT INTO `teacher` VALUES ('20212004', '土木建筑学院', '吴伟侑', '00000004');
INSERT INTO `teacher` VALUES ('20212005', '土木建筑学院', '萧芳仪', '00000005');
INSERT INTO `teacher` VALUES ('20212006', '土木建筑学院', '陈筠智', '00000006');
INSERT INTO `teacher` VALUES ('20212007', '土木建筑学院', '侯百宜', '00000007');
INSERT INTO `teacher` VALUES ('20212008', '土木建筑学院', '王淑娟', '00000008');
INSERT INTO `teacher` VALUES ('20212009', '土木建筑学院', '陈欣江', '00000009');
INSERT INTO `teacher` VALUES ('20212010', '土木建筑学院', '吴胜杰', '00000010');
INSERT INTO `teacher` VALUES ('20213001', '计算机学院', '黄宜君', '00000001');
INSERT INTO `teacher` VALUES ('20213002', '计算机学院', '罗智钧', '00000002');
INSERT INTO `teacher` VALUES ('20213003', '计算机学院', '刘淑娟', '00000003');
INSERT INTO `teacher` VALUES ('20213004', '计算机学院', '李慈泉', '00000004');
INSERT INTO `teacher` VALUES ('20213005', '计算机学院', '林莉婷', '00000005');
INSERT INTO `teacher` VALUES ('20213006', '计算机学院', '丁容定', '00000006');
INSERT INTO `teacher` VALUES ('20213007', '计算机学院', '吴建豪', '00000007');
INSERT INTO `teacher` VALUES ('20213008', '计算机学院', '潘于恭', '00000008');
INSERT INTO `teacher` VALUES ('20213009', '计算机学院', '赖怡伶', '00000009');
INSERT INTO `teacher` VALUES ('20213010', '计算机学院', '詹佳颖', '00000010');
INSERT INTO `teacher` VALUES ('20213011', '计算机学院', '傅姿蓉', '00000011');
INSERT INTO `teacher` VALUES ('20213012', '计算机学院', '沈洁铭', '00000012');
INSERT INTO `teacher` VALUES ('20214001', '电气与工程学院', '蔡文雯', '00000001');
INSERT INTO `teacher` VALUES ('20214002', '电气与工程学院', '王凯婷', '00000002');
INSERT INTO `teacher` VALUES ('20214003', '电气与工程学院', '张咏修', '00000003');
INSERT INTO `teacher` VALUES ('20214004', '电气与工程学院', '辛雅萍', '00000004');
INSERT INTO `teacher` VALUES ('20214005', '电气与工程学院', '袁贤欢', '00000005');
INSERT INTO `teacher` VALUES ('20214006', '电气与工程学院', '柯冠良', '00000006');
INSERT INTO `teacher` VALUES ('20214007', '电气与工程学院', '潘静宜', '00000007');
INSERT INTO `teacher` VALUES ('20214008', '电气与工程学院', '黄明哲', '00000008');
INSERT INTO `teacher` VALUES ('20214009', '电气与工程学院', '程俊宪', '00000009');
INSERT INTO `teacher` VALUES ('20214010', '电气与工程学院', '陈宗颖', '00000010');
INSERT INTO `teacher` VALUES ('20214011', '电气与工程学院', '陈玮郁', '00000011');
INSERT INTO `teacher` VALUES ('20215001', '化学与材料学院', '吴佩琪', '00000001');
INSERT INTO `teacher` VALUES ('20215002', '化学与材料学院', '陈馨薇', '00000002');
INSERT INTO `teacher` VALUES ('20215003', '化学与材料学院', '陈营虹', '00000003');
INSERT INTO `teacher` VALUES ('20215004', '化学与材料学院', '谢雅惠', '00000004');
INSERT INTO `teacher` VALUES ('20215005', '化学与材料学院', '杨雅康', '00000005');
INSERT INTO `teacher` VALUES ('20215006', '化学与材料学院', '简志旺', '00000006');
INSERT INTO `teacher` VALUES ('20215007', '化学与材料学院', '吕木云', '00000007');
INSERT INTO `teacher` VALUES ('20215008', '化学与材料学院', '宋湘婷', '00000008');
INSERT INTO `teacher` VALUES ('20215009', '化学与材料学院', '张玮俊', '00000009');
INSERT INTO `teacher` VALUES ('20215010', '化学与材料学院', '王姿吟', '00000010');
INSERT INTO `teacher` VALUES ('20215011', '化学与材料学院', '郑伟芳', '00000011');
INSERT INTO `teacher` VALUES ('20215012', '化学与材料学院', '王文杰', '00000012');
INSERT INTO `teacher` VALUES ('20216001', '经济与统计学院', '王芸茜', '00000001');
INSERT INTO `teacher` VALUES ('20216002', '经济与统计学院', '黄柏幸', '00000002');
INSERT INTO `teacher` VALUES ('20216003', '经济与统计学院', '罗芸纶', '00000003');
INSERT INTO `teacher` VALUES ('20216004', '经济与统计学院', '曾欣怡', '00000004');
INSERT INTO `teacher` VALUES ('20216005', '经济与统计学院', '陆怡萱', '00000005');
INSERT INTO `teacher` VALUES ('20216006', '经济与统计学院', '黄干慈', '00000006');
INSERT INTO `teacher` VALUES ('20216007', '经济与统计学院', '袁静如', '00000007');
INSERT INTO `teacher` VALUES ('20216008', '经济与统计学院', '张昆元', '00000008');
INSERT INTO `teacher` VALUES ('20216009', '经济与统计学院', '陈采勇', '00000009');
INSERT INTO `teacher` VALUES ('20216010', '经济与统计学院', '马荣真', '00000010');
INSERT INTO `teacher` VALUES ('20216011', '经济与统计学院', '刘湘舜', '00000011');
INSERT INTO `teacher` VALUES ('20216012', '经济与统计学院', '曹智强', '00000012');
INSERT INTO `teacher` VALUES ('20216013', '经济与统计学院', '许雅玲', '00000013');
INSERT INTO `teacher` VALUES ('20217001', '汉语文学学院', '王彦儒', '00000001');
INSERT INTO `teacher` VALUES ('20217002', '汉语文学学院', '林国芸', '00000002');
INSERT INTO `teacher` VALUES ('20217003', '汉语文学学院', '陈雅慧', '00000003');
INSERT INTO `teacher` VALUES ('20217004', '汉语文学学院', '钱群秋', '00000004');
INSERT INTO `teacher` VALUES ('20217005', '汉语文学学院', '游思好', '00000005');
INSERT INTO `teacher` VALUES ('20217006', '汉语文学学院', '庾雅婷', '00000006');
INSERT INTO `teacher` VALUES ('20217007', '汉语文学学院', '洪协慧', '00000007');
INSERT INTO `teacher` VALUES ('20217008', '汉语文学学院', '林宜', '00000008');
INSERT INTO `teacher` VALUES ('20217009', '汉语文学学院', '简淑芬', '00000009');
INSERT INTO `teacher` VALUES ('20217010', '汉语文学学院', '李文彬', '00000010');
INSERT INTO `teacher` VALUES ('20217011', '汉语文学学院', '何义秀', '00000011');
INSERT INTO `teacher` VALUES ('20218004', '体育学院', '陈俊茂', '00000004');
INSERT INTO `teacher` VALUES ('20210001', '数学与信息科学学院', '黄淑华', '00000001');
INSERT INTO `teacher` VALUES ('20218007', '体育学院', '梁燕', '00000007');
INSERT INTO `teacher` VALUES ('20218003', '体育学院', '葛真珍', '00000003');
INSERT INTO `teacher` VALUES ('20218005', '体育学院', '吴承翰', '00000005');
INSERT INTO `teacher` VALUES ('20218006', '体育学院', '林俊贤', '00000006');
INSERT INTO `teacher` VALUES ('20218002', '体育学院', '陈容佩', '00000002');
INSERT INTO `teacher` VALUES ('20218001', '体育学院', '游亮', '00000001');
INSERT INTO `teacher` VALUES ('20218008', '体育学院', '黄龙', '00008008');

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
