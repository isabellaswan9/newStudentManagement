<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除所选课程</title>
</head>

<body class="d-flex flex-column h-100">
<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}
include("../conn/db_conn.php");
include("../conn/db_func.php");
/*if(!isset($_POST['StuNo']))
$StuNo=12345678;
else $StuNo=$_POST['StuNo'];*/
$StuNo=$_SESSION['username'];
$CouNo=$_GET['CouNo'];
	$DeleteCourse="delete from stucou where CouNo='$CouNo' and StuNo='$StuNo'";
	$DeleteCourse_Result=db_query($DeleteCourse);
	$DeleteCourse2="delete from score where CouNo='$CouNo' and StuNo='$StuNo'";
	$DeleteCourse_Result2=db_query($DeleteCourse2);


$StuTime_sql="select * from CourseTime where StuNo='$StuNo'";
$StuTimeResult=mysql_query($StuTime_sql);
$StuTimeRow=db_fetch_array($StuTimeResult);
for($i=1;$i<25;$i++){
		if($StuTimeRow[$i] == $CouNo){
			$DeleteCourse3="update coursetime set `".$i."`='' where StuNo='$StuNo'";
			$DeleteCourse_Result3=db_query($DeleteCourse3);
		}
	}

	if($DeleteCourse_Result){
		echo"<script>";
		echo"alert(\"所选课程删除成功\");";
		echo"location.href=\"showchoosed.php\"";
		echo"</script>";
		}else{
	    echo"<script>";
		echo"alert(\"所选课程删除失败，请重新修改\");";
		echo"location.href=\"delCourse.php\"";
		echo"</script>";
	   }
?>
</body>
</html>