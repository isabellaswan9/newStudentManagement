<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!session_id()) session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>
<title>修改密码</title>
</head>

<body class="d-flex flex-column h-100">
	<div class="wrap">
		<div class="header">
			<?php include("header.php"); ?>
			<hr>
		</div>
		<div class="contain-wrap">
      		<div id="myForm" class="myForm">
				<form onsubmit="return validate()" method="post" action="Changepwd1.php" enctype="multipart/fromdata">
          			<fieldset>
            			<legend>修改密码</legend>
						<div class="form-group">
						<label for="oldPwd" class="form-label mt-4">请输入旧密码：</label>
						<input type="password" class="form-control" id="oldPwd" aria-describedby="emailHelp"
							placeholder="请输入旧密码" name="oldPwd">
						</div>
						<div class="form-group">
							<label for="Pwd" class="form-label mt-4">请输入新密码：</label>
							<input type="password" class="form-control" id="Pwd" aria-describedby="emailHelp"
								placeholder="密码只能包含数字、字母、下滑线" name="Pwd">
						</div>
						<div class="form-group">
							<label for="repPwd" class="form-label mt-4">请再次输入新密码：</label>
							<input type="password" class="form-control" id="repPwd" aria-describedby="emailHelp"
								placeholder="请再次输入新密码" name="repPwd">
						</div>
						<div class="form-group set-center" id="buttons">
							<button type="submit" name="B1" id="B1" class="btn btn-primary set-padding" >提交</button>
							<button type="reset" name="B2" id="B2" class="btn btn-primary set-padding">重置</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
<?php include("../footer.php"); ?>
<script>
	const url = location.search;//获取url中"?"符后的字串 ('?modFlag=business&role=1')
	if (url.indexOf('?') != -1) {
		const str = url.substr(1);//去掉？
		const state = str.split("=")[1];
		if(state == "ok"){
			$("#buttons").after("<div class=\"alert alert-dismissible alert-success\" id='sucMod'>修改密码成功</div>");
		}
		else if(state == "false"){
			$("#oldPwd").addClass("is-invalid");
			$("#oldPwd").after("<div class=\"invalid-feedback\" id='oldPwdalert'>旧密码错误</div>");
		}
	}
	let valid = false;
	$(document).ready(function(){
		$("#oldPwd").on('input',function(){
			$("#oldPwd").removeClass("is-invalid");
			$("#oldPwdalert").remove();	
			$("#sucMod").remove();
		});
		$("#Pwd").on('input',function(){
			const value = $("#Pwd").val();
			const pattern1 = /\d+/;
			const result1=value.search(pattern1);
			$("#sucMod").remove();
			if(result1==-1){
				$("#Pwdalert").remove();
				$("#Pwd").addClass("is-invalid");
				$("#Pwd").after("<div class='invalid-feedback' id='Pwdalert'>密码需要包含数字</div>");
			}
			else{
				const value = $("#Pwd").val();
				const pattern2 = /[a-z]/;
				const result2=value.search(pattern2);
				if(result2==-1){
					$("#Pwdalert").remove();
					$("#Pwd").addClass("is-invalid");
					$("#Pwd").after("<div class='invalid-feedback' id='Pwdalert'>密码需要包含小写字母</div>");
				}
				else{
					const value = $("#Pwd").val();
					const pattern2 = /[A-Z]/;
					const result2=value.search(pattern2);
					if(result2==-1){
						$("#Pwdalert").remove();
						$("#Pwd").addClass("is-invalid");
						$("#Pwd").after("<div class='invalid-feedback' id='Pwdalert'>密码需要包含大写字母</div>");
					}
					else{
						const value = $("#Pwd").val();
						if(value.length < 8){
							$("#Pwdalert").remove();
							$("#Pwd").addClass("is-invalid");
							$("#Pwd").after("<div class='invalid-feedback' id='Pwdalert'>密码大于8位</div>");
						}
						else{
							const value = $("#Pwd").val();
							const pattern = /^\w+$/;
							const result=pattern.test(value);
							if(result!=true){
								$("#Pwdalert").remove();
								$("#Pwd").addClass("is-invalid");
								$("#Pwd").after("<div class='invalid-feedback' id='Pwdalert'>密码只能包含数字、字母、下滑线</div>");
							}
							else{
								$("#Pwdalert").remove();
								$("#Pwd").removeClass("is-invalid");
								$("#Pwd").addClass("is-valid");
								valid = true;
							}
						}
					}
				}
			}	
		});
	});
    function validate()
    {
		if(valid!=true){
			return false;
		}
        var pwd=document.getElementById("Pwd").value;
		var repPwd=document.getElementById("repPwd").value;
		$("#Pwdalert2").remove();
		$("#repPwd").removeClass("is-invalid");
		
		if(pwd!==repPwd){
			$("#repPwd").addClass("is-invalid");
			$("#repPwd").after("<div class='invalid-feedback' id='Pwdalert2'>请输入相同的新密码</div>");
			return false;
		}
        return true;
    }
</script>
</body>
</html>

