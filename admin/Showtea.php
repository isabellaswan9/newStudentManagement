<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">

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
	<div class="myTable">
		<table  class="table table-hover" width="810" border="0" align="center" cellpadding="0" cellspacing="1" >
			<thead>
				<tr class="table-primary" bgcolor="#0066CC" align='center'>
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


<?php include("../footer.php"); ?>         
</body>
</html>