<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>

<title>添加学生</title>

<script>
  
</script>
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
    <form method="post" action="AddStudent1.php" id="myForm">
        <fieldset>
          <legend>请输入学生信息 <button type="button" name="batch" id="batch" class="btn btn-primary set-padding">点此批量上传</button></legend>
          <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">学号：</label>
            <?php
            include("../conn/db_conn.php");
            include("../conn/db_func.php");
            $adminNo=$_SESSION['username'];
            $ShowStudent_sql="select * from student order by StuNo desc";
            $ShowStudentResult=db_query($ShowStudent_sql);
            $row=db_fetch_array($ShowStudentResult);
            $StuNo=''. strval(intval($row['StuNo'])+1);
            ?>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder=""  name="StuNo" value="<?php echo $StuNo?>"/>

          <label for="exampleSelect1" class="form-label mt-4">学生名字：</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="StuName"/>
          <label for="exampleSelect1" class="form-label mt-4">学生班级：</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="ClassNo"/>

       <!--  <label for="exampleSelect1" class="form-label mt-4">密码：</label>
         <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Pwd">
		  	<label class="form-label mt-4"><font color="red">注意：密码为8位数字</font></label>-->
          <div class="form-group set-center">
            <button type="submit" name="B1" id="button" class="btn btn-primary set-padding">确定</button>
              <button type="reset" name="B2" id="button" class="btn btn-primary set-padding">重置</button>
          </div>
         </div>
        </fieldset>
    </form>
    <form method="post" action="AddStudent2.php" id="myBatch" enctype='multipart/form-data'>
        <fieldset>
          <legend>请上传excel文件 <button type="button" name="single" id="single" class="btn btn-primary set-padding">点击单个添加</button></legend>
          <div id="myBatch">
           <div class="input-group">
              <input type="file" class="form-control" name="myfile" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">上传</button>
            </div>
            <div id="values"></div>
         </div>
         </fieldset>
          <hr>
          <h5>温馨提示：</h5>
          <p class="text-muted">1.上传文件格式可以点击<a>模板下载</a>获得，请严格按照系统提供的数据模板填写客户信息，否则有可能导入不成功。</p>
          <p class="text-muted">2.单次上传文件不超过2M。</p>
          <p class="text-muted">3.仅支持xls/xlsx文件上传</p>
    </form>
    <hr>
    <div class="alert alert-dismissible alert-success" id='success'>添加成功！</div>
 </div>
</div>
<script>

 $(document).ready(function(){
   $('#inputGroupFileAddon04').hide();
    $("#myForm").show();
    $("#myBatch").hide();
    $("#success").hide();

  const url = location.search;//获取？后面的字符串（包括？）
  let theRequest = new Object();//定义一个对象，用来存储参数
  //转为可用的json格式
  if(url.indexOf('?')!=-1){
    const allPara = url.substr(1);//去掉？
    const allParas = allPara.split("&");
    for(let i = 0;i < allParas.length; i++){
      const paraArr = allParas[i].split("=");
      const name = paraArr[0];
      const attr = paraArr[1];
      theRequest[name]=attr;
    }
    if(theRequest.type == "batch"){
      $("#myForm").hide();
      $("#myBatch").show();
    }
    if(theRequest.flag == "success"){
      $("#success").show();
    }
    else if(theRequest.flag == "fail"){
      $("#success").show();
      $("#success").removeClass("alert-success");
      $("#success").addClass("alert-danger");
      $("#success").text("添加失败！请重新上传");
    }
  }

    $("#batch").click(function(){
      $("#myForm").hide();
      $("#myBatch").show();
      $("#success").hide();
    });

    $("#single").click(function(){
      $("#myForm").show();
      $("#myBatch").hide();
      $("#success").hide();
    });

    $("#inputGroupFile04").change(function(){
      $("#success").hide();
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
          //将多个文件名分开
          var fullpath = $(this).val();
          var filename = fullpath.split('\\');
          //显示上传按钮
          $('#inputGroupFileAddon04').show();
    })
  })

</script>
</body>
</html>