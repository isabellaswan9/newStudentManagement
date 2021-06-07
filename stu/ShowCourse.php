<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />

  <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>

	<title>学生端页面</title>
</head>

<body class="d-flex flex-column h-100">
	<div class="wrap">
		<div class="header">
			<?php include("header.php"); ?>
			<hr>
		</div>
		<div class="contain-wrap">
			<div class="myTable">
				<table class="table table-hover" width="610" border="0" align="center" cellpadding="0" cellspacing="1">
					<thead>
						<tr class="table-primary" bgcolor="#0066CC">
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
						</tr>
					</thead>
					<?php
					if (!session_id()) session_start();
					//检测是否登录，若没登录则转向登录界面
					if(!isset($_SESSION["username"]))
					{
						header("Location:../login.php");
						exit();
					}
					//包含数据库连接文件 
						include("../conn/db_conn.php");
						include("../conn/db_func.php");
						$StuNo=$_SESSION['username'];
						$ShowCourse_sql="select * from course where CouNo not in(select CouNo from stucou where StuNo='$StuNo')ORDER BY CouNo";
						$ShowCourseResult=db_query($ShowCourse_sql);
					?>
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
									if($i%2 ==0)
									echo"<tr bgcolor='#DDDDDD'>";
								else
									echo"<tr>";
									echo"<td width='80' align='center'><a href='CourseDetail.php? CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
									echo"<td width='220'>".$row['CouName']."</td>";
									echo"<td width='80'>".$row['Kind']."</td>";
									echo"<td width='50'>".$row['Credit']."</td>";
									echo"<td width='80'>".$row['Teacher']."</td>";
									echo"<td width='100'>".$schooltime1.$schooltime2.$schooltime3."</td>";
									echo"</tr>";
									$j=$i+1; 
								}
								}
							}
						?>
				</table>
				<div class="alert alert-dismissible alert-light set-center">
					点击<strong>课程编码链接</strong>可以查看课程细节
				</div>
				<div class="set-center">
					<ul class="pagination">
						<?php
						if($p>9){
							$last=(floor($p/10)*10)-10;
							echo "<li class='page-item'><a href='ShowCourse.php? p=$last' class='page-link'>&laquo;</a></li>";
							}
							else
							echo "<li class='page-item disabled'><a href='' class='page-link'>&laquo;</a></li>";
						?>
						<li class="page-item">
							<a class="page-link" href="ShowCourse.php? p=0">1</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="ShowCourse.php? p=11">2</a>
						</li>
						<li class="page-item">
							<?php
								if($i>9 and $number>$check){
										echo"<li class='page-item'><a href='ShowCourse.php? p=$j' class='page-link'>&raquo;</a></li>";
									}
								else
									echo"<li class='page-item disabled'><a href='ShowCourse.php? p=$j' class='page-link'>&raquo;</a></li>";
								?>	  
						</li>
					</ul>
				</div>
			</div>

		</div>
		<hr>
		<div class="footer">
			<?php include("../footer.php"); ?>
		</div>
	</div>
</body>

</html>