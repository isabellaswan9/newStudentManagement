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

<title>修改密码</title>
</head>

<body>
<?php include("header.php"); ?>

<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
		header("Location:..//login.php");
		exit();
		}
?>
<div class="contain-pd">
	<div class="myFormPd" >
		<form method="post" action="Changepwd1.php" enctype="multipart/fromdata">
			<div class="form-group" >
				<label class="form-label mt-4" >修改密码</label>

				<div class="form-floating">
					<input type="password" name="Pwd" class="form-control" id="floatingPassword" placeholder="Password">
					<label for="floatingPassword">password</label>
				</div>

			  	<label class="form-label mt-4"><font color="red">注意：密码为8位数字</font></label>

				<div class="form-floating">
					<input type="submit" value="确定" name="B1">
					<input type="reset" value="重置" name="B2">
				</div>

			</div>
		</form>
	</div>
</div>


<?php include("../footer.php"); ?>
</body>
</html>