<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>

<title>添加教师</title>
</head>

<body class="d-flex flex-column h-100">
<?php include("header.php"); ?>

<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
		header("Location:..//login.php");
		exit();
		}
?>


<div class="contain-wrap">
	<div class="myForm">
		<form method="post" action="AddTea1.php">
			<fieldset>
			<legend>请输入教师信息</legend>
			<div class="form-group">
			<label for="exampleSelect1" class="form-label mt-4">工号：</label>
			<?php
			include("../conn/db_conn.php");
			include("../conn/db_func.php");
			$adminNo=$_SESSION['username'];
			$ShowTeacher_sql="select * from teacher order by TeaNo desc";
			$ShowTeacherResult=db_query($ShowTeacher_sql);
			$row=db_fetch_array($ShowTeacherResult);
			$TeaNo=''. strval(intval($row['TeaNo'])+1);
			?>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="TeaNo" value="<?php echo $TeaNo?>"/>

			<label for="exampleSelect1" class="form-label mt-4">教师姓名：</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="TeaName"/>

			<label for="exampleSelect1" class="form-label mt-4">教师学院：</label>
			<select id="exampleSelect1" name="DepartNo">
			<option value="数学与信息科学学院">数学与信息科学学院</option>
			<option value="外国语学院">外国语学院</option>
			<option value="土木建筑学院">土木建筑学院</option>
			<option value="计算机学院">计算机学院</option>
			<option value="电气与工程学院">电气与工程学院</option>
			<option value="化学与材料学院">化学与材料学院</option>
			<option value="经济与统计学院">经济与统计学院</option>
			<option value="体育学院">体育学院</option>
			
			</select>
			</br>
			<!--<label for="exampleSelect1" class="form-label mt-4">密码：</label>
			<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Pwd">
			<label class="form-label mt-4"><font color="red">注意：密码为8位数字</font></label>-->
			<div class="form-group set-center">
			<button type="submit" name="B1" id="button" class="btn btn-primary set-padding">确定</button>
			<button type="reset" name="B2" id="button" class="btn btn-primary set-padding">重置</button>
			</div>
			</div>
			</fieldset>
		</form>
	</div>
</div>

</body>
</html>