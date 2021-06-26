<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>


<title>教师列表-超级管理员</title>
</head>

<body class="d-flex flex-column h-100">
<?php include("header.php"); ?>
<?php
if (!session_id()) session_start();
if(! isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
	}
	$StuNo=$_SESSION['username'];
	$ShowTeacher_sql="select * from teacher";
	$ShowTeacherResult=db_query($ShowTeacher_sql);
?>

<div class="contain-wrap" >
	<div class="addModal1">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		添加教师
		</button>
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">添加教师</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
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
							<div class="form-group modal-footer">
							<button type="submit" name="B1" id="button" class="btn btn-primary set-padding">确定</button>
							<button type="reset" name="B2" id="button" class="btn btn-primary set-padding">重置</button>
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
			</div>
		</div>
	</div>
	<div class="myTable">
		<table  class="table table-hover" width="810" border="0" align="center" cellpadding="0" cellspacing="1" >
			<thead>
				<tr class="table-dark" bgcolor="#0066CC" align='center'>
					<th width="200" align="center">
						<font color="#FFFFFF">学院</font>
					</th>
					<th width="100" align="center">
						<font color="#FFFFFF">工号</font>
					</th>
					<th width="150" align="center">
						<font color="#FFFFFF">教师姓名</font>
					</th>
					
					<th width="80" align="center">
						<font color="#FFFFFF">操作</font>
					</th>
					<th width="80" align="center">
						<font color="#FFFFFF">操作</font>
					</th>
				</tr>
<?php
if(db_num_rows($ShowTeacherResult)>0){
	$number=db_num_rows($ShowTeacherResult);
	if(empty($_GET['p']))
	$p=0;
	else {$p=$_GET['p'];}	
	$check=$p +10;
	for($i=0;$i<$number;$i++){
		$row=db_fetch_array($ShowTeacherResult);
		if($i>=$p && $i < $check){
			if($i%2 ==0)
			  echo"<tr class='table-active'>";
		else
			  echo"<tr>";
			$Search_Depart = "SELECT DepartName FROM department WHERE DepartNo='".$row['DepartNo']."' ";
			  $Search_Result = db_query($Search_Depart);
			  $DepartName = db_fetch_array($Search_Result);
			  echo"<td  align='center'>".$DepartName[0]."</td>";
			  echo"<td align='center'>".$row['TeaNo']."</td>";
			  echo"<td align='center'>".$row['TeaName']."</td>";
			  
			  echo"<td align='center'><a href='ModifyTeacher.php? TeaNo=".$row['TeaNo']."'>修改</a></td>";
			  echo"<td align='center'><a href='DeleteTeacher1.php? TeaNo=".$row['TeaNo']."'>删除</a></td>";
			  echo"</tr>";
			  $j=$i+1; 
		 }
		}
	}
?>

			</thead>
		</table>

<br>

<table width="400" border="0" align="center">
  <tr>
      <td align="center"><a href="Showtea.php? p=0">第一页</a></td>
      <td align="center">
	  <?php
	  if($p>9){
		  $last=(floor($p/10)*10)-10;
		  echo"<a href='Showtea.php? p=$last'>上一页</a>";
		  }
		  else
		    echo"上一页";
      ?>
      </td>
      <td align="center">
      <?php
	  if($i>9 and $number>$check)
	     echo"<a href='Showtea.php?p=$j'>下一页</a>";
	  else
	     echo"下一页";
      ?>
      </td>
      <td align="center">
      <?php
      if($i>9)
      {
      $final=floor($number/10)*10;
      echo"<a href='Showtea.php? p=$final'>最后一页</a>";
      }
      else
        echo"最后一页";
		?>
       
      </td>
  </tr>
</table>
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