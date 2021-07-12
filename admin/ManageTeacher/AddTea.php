<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../../style.css">
<script type="text/javascript" src="../../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.bundle.js"></script>

<title>添加教师</title>
</head>

<body class="d-flex flex-column h-100">
<?php include("./header.php"); ?>

<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){
	header("Location:../..//login.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
		header("Location:../..//login.php");
		exit();
		}
?>


<div class="contain-wrap">
	<div class="myForm">
		<form method="post" action="AddTea1.php" id="myForm">
			<fieldset>
			<legend>请输入教师信息<button type="button" name="batch" id="batch" class="btn btn-primary set-padding">点此批量上传</button></legend>
			<div class="form-group">
			<label for="exampleSelect1" class="form-label mt-4">教师工号：</label>
			<?php
			$adminNo=$_SESSION['username'];
			$ShowTeacher_sql="select * from teacher order by TeaNo desc";
			$ShowTeacherResult=db_query($ShowTeacher_sql);
			$row=db_fetch_array($ShowTeacherResult);
			$TeaNo=''. strval(intval($row['TeaNo'])+1);
			?>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="TeaNo" value="<?php echo $TeaNo?>"/>

			<label for="exampleSelect1" class="form-label mt-4">教师姓名：</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="TeaName"/>

			<label for="exampleSelect1" class="form-label mt-4">所属部门：</label>
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
			<button type="submit" name="B1" id="B1" onclick="AddTeacher()"class="btn btn-primary set-padding">确定</button>
			<button type="reset" name="B2" id="B2" class="btn btn-primary set-padding">重置</button>
			</div>
			</div>
			</fieldset>
		</form>
		<form method="post" action="AddTea2.php" id="myBatch" enctype='multipart/form-data' onsubmit="return validate()">
        <fieldset>
          <legend>请上传excel文件 <button type="button" name="single" id="single" class="btn btn-primary set-padding">点击单个添加</button></legend>
          <div id="myBatch">
           <div class="input-group">
              <input type="file" class="form-control" name="myfile" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">上传</button>
            </div>
            <div id="values" class="text-danger"></div>
         </div>
         </fieldset>
          <hr>
          <h5>温馨提示：</h5>
          <p class="text-muted">1.上传文件格式可以点击<a href="./teacher.xlsx" download="teacher上传模板.xlsx">模板下载</a>获得，请严格按照系统提供的数据模板填写客户信息，否则有可能导入不成功。</p>
          <p class="text-muted">2.单次上传文件不超过2M。</p>
          <p class="text-muted">3.仅支持xls/xlsx文件上传</p>
		</form>
		<hr>
		<div class="alert alert-dismissible alert-success" id='success'>添加成功！</div>
	</div>
</div>
<script>
  var valid = false;

 $(document).ready(function(){
   $('#inputGroupFileAddon04').hide();
    $("#myForm").show();
    $("#myBatch").hide();
    $("#success").hide();

  const url = location.search;//获取？后面的字符串（包括？）
  let theRequest = new Object();//定义一个对象，用来存储参数

  //转为可用的json格式，以便查看参数
  //这一步也可以使用URLSearchParams实现
  if(url.indexOf('?')!=-1){
    const allPara = url.substr(1);//去掉？
    const allParas = allPara.split("&");
    for(let i = 0;i < allParas.length; i++){
      const paraArr = allParas[i].split("=");
      const name = paraArr[0];
      const attr = paraArr[1];
      theRequest[name]=attr;
    }
    //判断如type字段为batch,即批量上传后的重定向则，转到批量上传界面
    if(theRequest.type == "batch"){
      $("#myForm").hide();
      $("#myBatch").show();
    }
    //判断如flag字段为success,则提示成功，否则提示失败
    if(theRequest.flag == "success"){
      $("#success").show();
    }
    else if(theRequest.flag == "fail"){
      $("#success").show();
      $("#success").removeClass("alert-success");
      $("#success").addClass("alert-danger");
      $("#success").text("添加失败！请重新上传");
    }

    const realURL = window.location;
    const para = "?type=batch";
		window.history.pushState({},'',realURL.origin + realURL.pathname + para);//pushState将url放入地址栏中
    //window.location.replace(realURL.origin + realURL.pathname);replace会重新加载所以不使用replace
  }

    //点击批量上传，显示batch表单
    $("#batch").click(function(){
      $("#myForm").hide();
      $("#myBatch").show();
      $("#success").hide();
    });
    //点击单个上传显示single表单
    $("#single").click(function(){
      $("#myForm").show();
      $("#myBatch").hide();
      $("#success").hide();
    });

    $("#inputGroupFile04").change(function(){
      $("#success").hide();
      $('#inputGroupFileAddon04').hide();
        var fileReader = new FileReader();
        var file = $(this).prop('files')[0];
        /*if (file) {
            fileReader.readAsDataURL(file);
        } else {
            tipFn('请选择文件');
            return;
        }
        */
        //判断文件大小
        if (file.size > 2000000) {
              $("#values").text('文件大小不得超过 2 M');
              return;
        };

        //判断文件类型
        const suffix = file.name.split(".")[1];
        if(!((suffix=="xlsx")||(suffix=="xls"))){
          $("#values").text('请上传xls/xlsx文件');
          return;
        }

        //将多个文件名分开
        var fullpath = $(this).val();
        var filename = fullpath.split('\\');
        //显示上传按钮
        $('#inputGroupFileAddon04').show();
        valid = true;
    })  
  })
  function validate(){
      if(valid!=true){
        $("#values").text('请上传满足条件的文件哦');
        return false;
      }
    return true;
  }
</script>
</body>
</html>