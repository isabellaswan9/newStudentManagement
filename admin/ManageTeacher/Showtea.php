<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../../style.css">
<script type="text/javascript" src="../../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.bundle.js"></script>


<title>教师列表-超级管理员</title>
</head>

<body class="d-flex flex-column h-100">
<?php include("../header.php"); ?>
<?php
if (!session_id()) session_start();
if(! isset($_SESSION['username']))
{
	header("Location:../../login.php");
	exit();
	}
	$StuNo=$_SESSION['username'];
	$ShowTeacher_sql="select * from teacher";
	$ShowTeacherResult=db_query($ShowTeacher_sql);
?>

<div class="contain-wrap" >
	<div class="addModal1 set-right">
		<button type="button" class="btn btn-primary set-padding" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		添加教师
		</button>
	</div>
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">添加教师</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="post" id="myForm">
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
							<button type="button" name="B1" id="B1" onclick="AddTeacher()" class="btn btn-primary set-padding">确定</button>
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
<script type="text/javascript" src="./js/changeModel.js"></script>/>
<script type="text/javascript" src="./js/loadXMLDoc.js"></script>/>
<script>
	function AddTeacher() {
    const myForm = document.getElementById("myForm");
	const formdata=new FormData(myForm);
    loadXMLDoc(formdata, "./AddTea1.php", function () {
        
    });
	
}
	// function loadXMLDoc() {
	// 	var myForm = document.getElementById("myForm");
	// 	var formdata=new FormData(myForm);
	// 	if (window.XMLHttpRequest) {
	// 		xmlhttp = new XMLHttpRequest();
	// 	}
	// 	else {
	// 		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	// 	}
	// 	xmlhttp.open("POST", "./AddTea1.php", true);
	// 	xmlhttp.send(formdata);
	// }
</script>
</body>
</html>