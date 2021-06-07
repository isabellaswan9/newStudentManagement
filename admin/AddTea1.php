<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
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

<body class="d-flex flex-column h-100">
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
$TeaNo=$_POST['TeaNo'];
$TeaName=$_POST['TeaName'];
$DepartNo=$_POST['DepartNo'];


$TeaNo=trim($TeaNo);
$TeaName=trim($TeaName);
$DepartNo=trim($DepartNo);

$AddTeacher_SQL="insert into Teacher values('$TeaNo','$DepartNo','$TeaName','00000000')";
$AddTeacher_Result=db_query($AddTeacher_SQL);


if($AddTeacher_Result){
	echo"<script>";
	echo"alert(\"添加教师成功\");";
	echo"location. href=\"ShowTea.php\"";
	echo"</script>";
	}else{
	echo"<script>";
	echo"alert(\"添加教师失败，请重新添加\");";
	echo"location. href=\"AddTea.php\"";
	echo"</script>";
		}
?>
</body>
</html>