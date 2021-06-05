
--选出学生名单
/*
select cou.CouNo,cou.CouName,sco.score from course as cou,stucou as sc,score as sco
where cou.Teacher="林睿",sc.CouNo=002 and sco.StuNo in (select sco.StuNo  from cou,sco where and sco.StuNo=cou.StuNo);


select cou.CouNo,cou.CouName,sco.score from course as cou,score as sco on sco.StuNo=cou.StuNo and join stucou as sc
where cou.Teacher="林睿";

select cou.CouNo,cou.CouName,st.StuName,sco.score from course as cou,stucou as sc,score as sco,student as st
where cou.Teacher='林睿' 
and sco.StuNo in (select sco.StuNo  from stucou,score where score.StuNo=stucou.StuNo and stucou.CouNo=002);


学生表 选课表course 成绩表score 课表
select cou.CouNo,cou.CouName,st.StuName,sc.score 
from (stucou as stc) join (score as sc)on sc.StuNo=stc.StuNo join (student as st) on st.StuNo=sc.StuNo,course as cou
where stc.CouNo=001 and cou.Teacher='林睿' ;


INSERT INTO `score` (`StuNo`, `CouNo`, `score`) VALUES
('12345676', '001', '0'),
('12345677', '001', '88');
*/

--showstudent
select student.StuNo,student.StuName,student.ClassNo,score.score,score.CouNo,course.CouName
from student join score 
on student.StuNo=score.StuNo 
join course on course.CouNo=score.CouNo where score.CouNo='001';

/*!!!!!要插入大量空白成绩的数据来测试一下
--成绩表
INSERT INTO `score` (`StuNo`, `CouNo`, `score`) VALUES
('12345666', '001', '0'),
('12345667', '001', '0'),
('12345661', '001', '0'),
('12345662', '001', '0'),
('12345663', '001', '0'),
('12345664', '001', '0'),
('12345665', '001', '0'),
('12345668', '001', '0'),
('12345669', '001', '0'),
('12345660', '001', '0');

--选课表
INSERT INTO `stucou` (`StuNo`, `CouNo`, `WillOrder`, `State`, `RandomNum`) VALUES
('12345666', '001', '2','报名',NULL),
('12345667', '001', '02', '报名', NULL),
('12345661', '001', '02', '报名', NULL),
('12345662', '001', '02', '报名', NULL),
('12345663', '001', '02', '报名', NULL),
('12345664', '001', '02', '报名', NULL),
('12345665', '001', '02', '报名', NULL),
('12345668', '001', '02', '报名', NULL),
('12345669', '001', '02', '报名', NULL),
('12345660', '001', '02', '报名', NULL);

--学生表
INSERT INTO `student` (`StuNo`, `ClassNo`, `StuName`, `Pwd`) VALUES
('12345666', '001', '范志强','12345666'),
('12345667', '001', '王永泉','12345667'),
('12345661', '001', '罗翔','12345661'),
('12345662', '001', '宋钟基','12345662'),
('12345663', '001', '朴槿惠','12345663'),
('12345664', '001', '王安于','12345664'),
('12345665', '001', '周慧敏','12345665'),
('12345668', '001', '范冰冰','12345668'),
('12345669', '001', '李冰冰','12345669'),
('12345660', '001', '王乐','12345660');



*/