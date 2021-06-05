<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../bootstrap/bootstrap.css" />
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/footer.css" />
	<script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
<title>修改密码</title>
</head>

<body>
	<div class="wrap">
		<div class="header">
			<?php include("header.php"); ?>
			<hr>
		</div>
		<div class="contain-wrap">
      		<div id="myForm" class="myForm">
				<form method="post" action="Changepwd1.php" enctype="multipart/fromdata">
          			<fieldset>
            			<legend>修改密码</legend>
						<div class="form-group">
							<label for="exampleInputEmail1" class="form-label mt-4">请输入新密码：</label>
							<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
								placeholder="请输入新密码" name="Pwd">
						</div>
						<div class="alert">
							<font color="red">注意：密码为8位数字</font></td>
						</div>
						<div class="form-group set-center">
							<button type="submit" name="B1" id="button" class="btn btn-primary set-padding">提交</button>
							<button type="reset" name="B2" id="button" class="btn btn-primary set-padding">重置</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
<?php include("../footer.php"); ?>
</body>
</html>