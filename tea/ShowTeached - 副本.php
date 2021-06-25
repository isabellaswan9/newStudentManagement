<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看所任教课程-教师端页面</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>
</head>

<body class="d-flex flex-column h-100">

<?php include("header.php");?>
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
	$ShowCourse_sql="select * from course where Teacher in(select TeaName from Teacher where TeaNo='$StuNo') ORDER BY CouNo";
	$ShowCourseResult=db_query($ShowCourse_sql);

		if(empty($ShowCourseResult))
		{
			echo"<script>";
			echo"alert(\"课程暂无安排\");";
			echo"location.href=\"ShowCourse.php\"";
			echo"</script>";
		}
?>
<div class="contain-wrap">
<div class="myTable">
<table class="table table-hover" width="610" border="0" align="center" cellpadding="0" cellspacing="1">
					<thead>
						<tr class="table-primary" bgcolor="#0066CC" valign='middle' align='center'>
							<th width="80" align="center">
								<font color="#FFFFFF">课程编码</font>
							</th>
							<th width="220" align="center">
								<font color="#FFFFFF">课程名称</font>
							</th>
							<th width="80">
								<font color="#FFFFFF" align="center">课程类型</font>
							</th>
							<th width="50">
								<font color="#FFFFFF" align="center">学分</font>
							</th> 
							<th width="80">
								<font color="#FFFFFF" align="center">任课教师</font>
							</th>
							<th width="100">
								<font color="#FFFFFF" align="center">上课时间</font>
							</th>
							<th width="100">
								<font color="#FFFFFF" align="center">学生名单</font>
							</th>
						</tr>
					</thead>
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

		$number=db_num_rows($ShowCourseResult);
	
		if(empty($_GET['p']))
			{$p=0;}
		else {$p=$_GET['p'];}	
		$check=$p +10;
		for($i=0;$i<$number;$i++)
		{
			$row=db_fetch_array($ShowCourseResult);
			$num1=($row['time1']%5==0)?5:($row['time1']%5);
			$schooltime1="周".chinese(floor($row['time1']/6+1))."第".chinese($num1)."节<br>";
							
			if($row['time2'])
			{
				$num2=($row['time2']%5==0)?5:($row['time2']%5);
				$schooltime2="周".chinese(floor($row['time2']/6+1))."第".chinese($num2)."节<br>";
			}
			else $schooltime2='';
						
			if($row["time3"])
			{
				$num3=($row['time3']%5==0)?5:($row['time3']%5);
				$schooltime3="周".chinese(floor($row['time3']/6+1))."第".chinese($num3)."节<br>";
			}
			else $schooltime3='';
		
			if($i>=$p && $i < $check)
			{
				if($i%2 ==0)
			  		{echo"<tr bgcolor='#DDDDDD'>";}
			else{
			  echo"<tr>";
			  echo"<td width='80' valign='middle' align='center'>".$row['CouNo']."</td>";
			  echo"<td width='220' valign='middle' align='center'>".$row['CouName']."</td>";
			  echo"<td width='80' valign='middle' align='center'>".$row['Kind']."</td>";
			  echo"<td width='50' valign='middle' align='center'>".$row['Credit']."</td>";
			  echo"<td width='80' valign='middle' align='center'>".$row['Teacher']."</td>";
			  echo"<td width='100' valign='middle' align='center'>".$schooltime1.$schooltime2.$schooltime3."</td>";
		 	  /*点击查看可以查看学生名单以及录入成绩*/		  
			  echo"<td width='80' valign='middle' align='center'><a href='Showstudent.php?CouNo=".$row['CouNo']."'>查看学生</a></td>";

			  echo"</tr>";
			  $j=$i+1; 
		 		}
			}
		}
	
?>
</table>
</br>

<div class="set-center">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="ShowTeached.php? p=0">第一页</a>
						</li>
						<?php
						if($p>9){
							$last=(floor($p/10)*10)-10;
							echo "<li class='page-item'><a href='ShowTeached.php? p=$last' class='page-link'>上一页</a></li>";
							}
							else
							echo "<li class='page-item disabled'><a href='' class='page-link'>上一页</a></li>";
						?>
						<li class="page-item">
							<?php
								if($i>9 and $number>$check){
										echo"<li class='page-item'><a href='ShowTeached.php? p=$i' class='page-link'>下一页</a></li>";
									}
								else
									echo"<li class='page-item disabled'><a href='ShowCourse.php? p=$i' class='page-link'>下一页</a></li>";
								?>
						</li>
						<li class="page-item">
							<?php
				      if($i>9)
				      {
				      $final=floor($number/10)*10;
				      echo"<a class='page-link' href='ShowTeached.php? p=$final'>最后一页</a>";
				      }
				      else
				        echo"<li class='page-item disabled'><a href='' class='page-link'>最后一页</a></li>";
						?>
						</li>
					</ul>
				</div>
				</div>
					</div>
<?php include("../footer.php"); ?>         
</body>
</html>