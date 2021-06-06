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
$StuNo=$_POST['StuNo'];
$StuName=$_POST['StuName'];
$ClassNo=$_POST['ClassNo'];
$Pwd=$_POST['Pwd'];

$StuNo=trim($StuNo);
$StuName=trim($StuName);
$ClassNo=trim($ClassNo);
$Pwd=trim($Pwd);
$AddStudent_SQL="insert into Student values('$StuNo','$ClassNo','$StuName','$Pwd')";
$AddStudent_Result=db_query($AddStudent_SQL);


if($AddStudent_Result){
	echo"<script>";
	echo"alert(\"添加学生成功\");";
	echo"location. href=\"ShowStudent.php\"";
	echo"</script>";
	}else{
	echo"<script>";
	echo"alert(\"添加学生失败，请重新添加\");";
	echo"location. href=\"AddStudent.php\"";
	echo"</script>";
		}
?>
</body>
</html>