<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">

<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>

<title>学生列表-超级管理员</title>
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
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$StuNo=$_SESSION['username'];
	$ShowStudent_sql="select * from student";
	$ShowStudentResult=db_query($ShowStudent_sql);
?>




<div class="contain-wrap">
	<div class="myTable">
		<table  class="table table-hover" width="810" border="0" align="center" cellpadding="0" cellspacing="1" >
			<thead>
				<tr class="table-primary" bgcolor="#0066CC">
					<th width="80" align="center">
						<font color="#FFFFFF">学生ID</font>
					</th>
					<th width="110" align="center">
						<font color="#FFFFFF">学生名字</font>
					</th>
					<th width="110" align="center">
						<font color="#FFFFFF">班级编号</font>
					</th>
					<th width="110" align="center">
						<font color="#FFFFFF">所属学院</font>
					</th>					
					<th width="50" align="center">
						<font color="#FFFFFF">操作</font>
					</th>
					<th width="80" align="center">
						<font color="#FFFFFF">操作</font>
					</th>
				</tr>
<?php
if(db_num_rows($ShowStudentResult)>0){
	$number=db_num_rows($ShowStudentResult);
	if(empty($_GET['p']))
	$p=0;
	else {$p=$_GET['p'];}	
	$check=$p +10;
	for($i=0;$i<$number;$i++){
		$row=db_fetch_array($ShowStudentResult);
		if($i>=$p && $i < $check){
			if($i%2 ==0)
			  echo"<tr bgcolor='#DDDDDD'>";
		else
			  echo"<tr>";
			  echo"<td width='80' align='center'>".$row['StuNo']."</td>";
			  echo"<td width='220'>".$row['StuName']."</td>";
			  echo"<td width='80'>".$row['ClassNo']."</td>";
			  echo"<td width='80'>".$row['Depart']."</td>";
			  echo"<td width='40'><a href='ModifyStudent.php? StuNo=".$row['StuNo']."'>修改</a></td>";
			  echo"<td width='40'><a href='DeleteStudent1.php? StuNo=".$row['StuNo']."'>删除</a></td>";
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
      <td align="center"><a href="Showstudent.php? p=0">第一页</a></td>
      <td align="center">
	  <?php
	  if($p>9){
		  $last=(floor($p/10)*10)-10;
		  echo"<a href='Showstudent.php? p=$last'>上一页</a>";
		  }
		  else
		    echo"上一页";
      ?>
      </td>
      <td align="center">
      <?php
	  if($i>9 and $number>$check)
	     echo"<a href='Showstudent.php?p=$j'>下一页</a>";
	  else
	     echo"下一页";
      ?>
      </td>
      <td align="center">
      <?php
      if($i>9)
      {
      $final=floor($number/10)*10;
      echo"<a href='Showstudent.php? p=$final'>最后一页</a>";
      }
      else
        echo"最后一页";
		?>
       
      </td>
  </tr>
</table>           
	</div>
</div>
      
</body>
</html>