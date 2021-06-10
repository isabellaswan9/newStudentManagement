<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body class="d-flex flex-column h-100">
<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){//会话不存在就回去登录
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$StuNo=$_POST['StuNo'];//学号
	$CouNo=$_POST['CouNo'];//课程号
	$ShowDetail_sql="select * from stucou where StuNo='$StuNo'";//查看该学生选了什么课
	$ShowDetailResult=mysql_query($ShowDetail_sql);
	$CourseTime_sql="select * from course where CouNo='$CouNo'";//查看这门课有哪些时间段
	$CourseTimeResult=mysql_query($CourseTime_sql);
	$CourseTimeRow=db_fetch_array($CourseTimeResult);
	$CourseTime1=$CourseTimeRow['time1'];//获取这门课的第一个时间段
	$CourseTime2=$CourseTimeRow['time2'];//获取这门课的第二个时间段
	$CourseTime3=$CourseTimeRow['time3'];
	$Coursetimearray=array($CourseTime1,$CourseTime2,$CourseTime3);//该门课的三个时间段放进数组
	$StuTime_sql="select * from CourseTime where StuNo='$StuNo'";//查看该学生所有课的时间，下面判断是否冲突
	$StuTimeResult=mysql_query($StuTime_sql);//获取了所有的所有的课程编号，不是上面的列名
	$StuTimeRow=db_fetch_array($StuTimeResult);
	$StuTimearray=array();//保存学生有课的时间
	
	for($i=1;$i<25;$i++){
		if($StuTimeRow[$i]!=''){//如果课表列不为Null证明是有课的
			array_push($StuTimearray,$i);//收集学生课表中内容非0的列名,时间课号1-25
		}
	}
	$CanI=0;//冲突标志，0表示不冲突，1表示冲突
	foreach($Coursetimearray as $x){//遍历该课程的所有时间
		//echo '这门课的时间：'.$x.'  ';
		if(in_array($x,$StuTimearray)){//如果该时间在学生现有的课表中，冲突
			$CanI=1;		
			break;//满足冲突就不再继续遍历，直接退出
		}	
	}
	
	if($CanI==1){//冲突标志为1
		echo"<script>";
		    echo"alert(\"课程时间冲突\");";
			echo"location.href=\"ShowCourse.php\"";	
			echo"</script>";
	}
	else{//冲突标志为0，选课
		$WillOrder=db_num_rows($ShowDetailResult)+1;//该学生报名的课的数量
		$insertCourse="insert into stucou(StuNo,CouNo,WillOrder,State) values ('$StuNo','$CouNo','$WillOrder','报名')";//报名课程
		$insertCourse_Result=mysql_query($insertCourse);

		$insertCourse2="insert into score(StuNo,CouNo,score,flag) values ('$StuNo','$CouNo','','0')";//报名课程
		$insertCourse_Result2=mysql_query($insertCourse2);
		for($k = 0; $k < 3; $k++)
		{
			if($Coursetimearray[$k] != 0){
				$SearchStuNo = "select * from coursetime where StuNo='$StuNo'";
				$SearchStuNo_Result = mysql_query($SearchStuNo);
				$SearchStuNo_Num = db_num_rows($SearchStuNo_Result);
				if($SearchStuNo_Num == 0){
					$updateCoursetime = "INSERT INTO coursetime(StuNo) VALUES('$StuNo')";
					mysql_query($updateCoursetime);
				}
				$updateCoursetime="update coursetime set `$Coursetimearray[$k]`='$CouNo'  where StuNo='$StuNo'";
				$updateCoursetime_Result=mysql_query($updateCoursetime);

				
			}
		}
		
		//如果学生已经有课表，更新学生课表添加上该课程号,添加学生时就把课表插入！！！

			echo"<script>";
			echo"alert(\"选择课程成功\");";
			echo"location.href=\"showchoosed.php\"";
			echo"</script>";
			//echo 'insert:'.$insertCourse_Result.'<br>update:'.$updateCoursetime_Result;
			
			
	}
?>
</body>
</html>