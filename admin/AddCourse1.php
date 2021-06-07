<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/bootstrap.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>



<title>完成添加课程操作程序</title>
</head>

<body>
<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){
	header("Location:index.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
	header("Location:student.php");
	exit();
		}
include("../conn/db_conn.php");
include("../conn/db_func.php");
$CouNo=$_POST['CouNo'];
$CouName=$_POST['CouName'];
$Kind=$_POST['Kind'];
$Credit=$_POST['Credit'];
$Teacher=$_POST['Teacher'];

$week1=$_POST['week1'];
$time1=$_POST['time1'];
$Time1=($week1-1)*5+$time1;
$week2=$_POST['week2'];
$time2=$_POST['time2'];
if($week2!=0 and $time2!=0){
	$Time2=($week2-1)*5+$time2;
}
else{
	$Time2=0;
}
$week3=$_POST['week3'];
$time3=$_POST['time3'];
if($week3!=0 and $time3!=0){
	$Time3=($week3-1)*5+$time3;
}
else{
	$Time3=0;
}


$Classroom=$_POST['Classroom'];
$LimitNum=$_POST['LimitNum'];
$CouNo=trim($CouNo);
$CouName=trim($CouName);
$Kind=trim($Kind);
$Teacher=trim($Teacher);
$DepartNo=trim($_POST['DepartNo']);
$LimitNum=trim($LimitNum);


$AddCourse_SQL="insert into course (CouNo,CouName,Kind,Credit,Teacher,DepartNo,time1,time2,time3,LimitNum,WillNum,ChooseNum,Classroom)values('$CouNo','$CouName','$Kind','$Credit','$Teacher','$DepartNo','$Time1','$Time2','$Time3','$LimitNum',0,0,'$Classroom')";
$AddCourse_Result=db_query($AddCourse_SQL);


if($AddCourse_Result){
	echo"<script>";
	echo"alert(\"添加课程成功\");";
	echo"location. href=\"ShowCourse.php\"";
	echo"</script>";
	}else{
	echo"<script>";
	//echo"alert(\"添加课程失败，请重新添加\");";
	echo"location. href=\"AddCourse.php\"";
	echo"</script>";
		}
?>
</body>
</html>