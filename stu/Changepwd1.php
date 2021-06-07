<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成修改密码操作</title>
</head>

<body class="d-flex flex-column h-100">
<?php
if (!session_id()) session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
}
include("../conn/db_conn.php");
include("../conn/db_func.php");

$Pwd=$_POST['Pwd'];
$oldPwd=$_POST['oldPwd'];

$Pwd=trim($Pwd);
$oldPwd=trim($oldPwd);

$username=$_SESSION["username"];
$userpwd=$oldPwd;

$ChkLogin="select * from student where StuNo='$username' and Pwd='$userpwd'";
$ChkLoginResult=db_query($ChkLogin);
$number=db_num_rows($ChkLoginResult);
$row=db_fetch_array($ChkLoginResult);

if($number<=0){
	echo"<script>";
	echo"alert(\"旧密码错误\");";
	echo"location. href=\"Changepwd.php?flag=false\"";
	echo"</script>";
}else{
	$UpdateStudent_SQL="Update student set Pwd='$Pwd' where 1";
	$UpdateStudent_Result=db_query($UpdateStudent_SQL); 
	if($UpdateStudent_Result){
		echo"<script>";
		echo"alert(\"修改密码成功\");";
		echo"location. href=\"Changepwd.php?flag=ok\"";
		echo"</script>";
		}else{
		echo"<script>";
		echo"alert(\"修改密码失败，请重新修改\");";
		echo"location. href=\"Changepwd.php?flag=no\"";
		echo"</script>";
	}
}
 
 
?>
</body>
</html>