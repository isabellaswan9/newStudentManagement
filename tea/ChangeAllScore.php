<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成添加课程操作程序</title>
</head>

<body>
<?php
session_start();
if(! isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$StuNo=$_SESSION['data'];/*教师编号*/
	$CouNo=$_SESSION['CouNo'];


$CJ=$_POST['CJ'];
/*
echo($CJ);
$n = count($CJ);
echo $n;
*/
for($i=0;$i<count($CJ);$i++){
	$UpdateScore_SQL="Update Score set Score='$CJ[$i]' where StuNo='$StuNo[$i]' and CouNo='$CouNo'";
	$UpdateScore_Result=db_query($UpdateScore_SQL);
}



if($UpdateScore_Result){
	echo"<script>";
	echo"alert(\"修改成绩成功\");";
	echo"location. href='".$_SERVER["HTTP_REFERER"]."'";
	echo"</script>";
	}else{
	echo"<script>";
	echo"alert(\"修改成绩失败，请重新修改\");";
	echo"location. href='".$_SERVER["HTTP_REFERER"]."";
	echo"</script>";
		}
?>


</body>
</html>