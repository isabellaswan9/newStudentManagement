/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : xk

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2021-06-08 16:31:54
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
INSERT INTO `student` VALUES ('12345677', '181', '胡歌', '12345678');
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
INSERT INTO `student` VALUES ('12345702', '2', '苏韩', '00005702');

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
