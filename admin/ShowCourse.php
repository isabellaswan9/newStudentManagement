<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>



<title>学生选课系统（管理员）</title>

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
	$ShowCourse_sql="select * from course where CouNo not in(select CouNo from stucou where StuNo='$StuNo')ORDER BY CouNo";
	$ShowCourseResult=db_query($ShowCourse_sql);
?>

<div class="contain-wrap">
	<div class="myTable">
		<table  class="table table-hover" width="810" border="0" align="center" cellpadding="0" cellspacing="1" >
			<thead>
				<tr class="table-primary" bgcolor="#0066CC">
					<th width="80" align="center">
						<font color="#FFFFFF">课程编码</font>
					</th>
					<th width="220" align="center">
						<font color="#FFFFFF">课程名称</font>
					</th>
					<th width="110" align="center">
						<font color="#FFFFFF">课程类型</font>
					</th>
					<th width="50" align="center">
						<font color="#FFFFFF">学分</font>
					</th>
					<th width="80" align="center">
						<font color="#FFFFFF">任课教师</font>
					</th>
					<th width="100" align="center">
						<font color="#FFFFFF">上课时间</font>
					</th>
					<th width="50" align="center">
						<font color="#FFFFFF">操作</font>
					</th>
					<th width="50" align="center">
						<font color="#FFFFFF">操作</font>
					</th>
				</tr>

			<?php
			function chinese($num){
						$chinese='';
						switch ($num){
							case 1:
							$chinese='一';
							break;
							case 2:
							$chinese='二';
							break;
							case 3:
							$chinese='三';
							break;
							case 4:
							$chinese='四';
							break;
							case 5:
							$chinese='五';
							break;
							default:
							$chinese='';
							
						}
						return $chinese;
					}
			if(db_num_rows($ShowCourseResult)>0){
				$number=db_num_rows($ShowCourseResult);
				if(empty($_GET['p']))
				$p=0;
				else {$p=$_GET['p'];}	
				$check=$p +10;
				for($i=0;$i<$number;$i++){
					$row=db_fetch_array($ShowCourseResult);
					$num1=($row['time1']%5==0)?5:($row['time1']%5);
					$schooltime1="周".chinese(floor($row['time1']/6+1))."第".chinese($num1)."节<br>";
							
					if($row['time2']){
					$num2=($row['time2']%5==0)?5:($row['time2']%5);
					$schooltime2="周".chinese(floor($row['time2']/6+1))."第".chinese($num2)."节<br>";
					}
					else $schooltime2='';
						
					if($row["time3"]){
					$num3=($row['time3']%5==0)?5:($row['time3']%5);
					$schooltime3="周".chinese(floor($row['time3']/6+1))."第".chinese($num3)."节<br>";
					}
					else $schooltime3='';					
					if($i>=$p && $i < $check){
			$time1=array();$time2=array();$time3=array();

			$time1[]=array($row['time1']);
			$time2[]=array($row['time2']);
			$time3[]=array($row['time3']);
						if($i%2 ==0)
						  echo"<tr class='table-active'>";
					else
						  echo"<tr>";
						  echo"<td width='80' align='center'><a href='CourseDetail.php? CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
						  echo"<td width='220'>".$row['CouName']."</td>";
						  echo"<td width='80'>".$row['Kind']."</td>";
						  echo"<td width='50'>".$row['Credit']."</td>";
						  echo"<td width='80'>".$row['Teacher']."</td>";
						  echo"<td width='100'>".$schooltime1.$schooltime2.$schooltime3."</td>";
						  echo"<td width='40'><a href='ModifyCourse.php? CouNo=".$row['CouNo']."'>修改</a></td>";
						  echo"<td width='40'><a href='DeleteCourse1.php? CouNo=".$row['CouNo']."'>删除</a></td>";
						  echo"</tr>";
						  $j=$i+1; 
					 }
					}
				}
			?>

			</thead>
		</table>

<br>
<center>点击课程编码链接可以查看课程细节</center>
<br>
<table width="400" border="0" align="center">
  <tr>
      <td align="center"><a href="ShowCourse.php? p=0">第一页</a></td>
      <td align="center">
	  <?php
	  if($p>9){
		  $last=(floor($p/10)*10)-10;
		  echo"<a href='ShowCourse.php? p=$last'>上一页</a>";
		  }
		  else
		    echo"上一页";
      ?>
      </td>
      <td align="center">
      <?php
	  if($i>9 and $number>$check)
	     echo"<a href='ShowCourse.php?p=$j'>下一页</a>";
	  else
	     echo"下一页";
      ?>
      </td>
      <td align="center">
      <?php
      if($i>9)
      {
      $final=floor($number/10)*10;
      echo"<a href='ShowCourse.php? p=$final'>最后一页</a>";
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