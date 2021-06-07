<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>无标题文档</title>
</head>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>

<body class="d-flex flex-column h-100">
	<div class="wrap">
		<div class="header">
			<?php include("header.php"); ?>
			<?php
				if (!session_id()) session_start();
				if(!isset($_SESSION['username']))
				{
					header("Location:../login.php");
					exit();
				}
				$keyWord=$_GET['keyWord'];
				$ColumnName=$_GET['ColumnName'];
				$keyWord=trim($keyWord);
				include("../conn/db_conn.php");
				include("../conn/db_func.php");
				switch($ColumnName)
				{
					case "CouNo";
						$sql="select * from course where CouNo LIKE \"%".$keyWord."%\"";
						break;
					case "CouName";
						$sql="select * from course where CouName LIKE \"%".$keyWord."%\"";
						break;
					case "Kind";
						$sql="select * from course where Kind LIKE \"%".$keyWord."%\"";
						break;
					case "Credit";
						$sql="select * from course where Credit LIKE \"%".$keyWord."%\"";
						break;
					case "Teacher";
						$sql="select * from course where Teacher LIKE \"%".$keyWord."%\"";
						break;
					case "DepartName";
						$sql="select * from course,Department where course.DepartNo=Department.DepartNo and DepartName LIKE \"%".$keyWord."%\"";
						break;
					case "SchoolTime";
						$sql="select * from course where SchoolTime LIKE \"%".$keyWord."%\"";
						break;
				}
				$result=db_query($sql);
				?>
		</div>
		<div class="contain-wrap2">
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
						if(db_num_rows($result)>0){
							$number=db_num_rows($result);
						for($i=0;$i<$number;$i++)
							{
								$row=db_fetch_array($result);
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
								
								if($i%2==0)
									echo "<tr bgcolor='#dddddd'>";
								else
									echo "<tr>";
								echo "<td width='80'><a href='CourseDetail.php?CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
						?>

					<td width="220" align="center">
						<?php echo $row['CouName'] ?>
					</td>
					<td width="80">
						<?php echo $row['Kind']  ?>
					</td>
					<td width="50">
						<?php echo $row['Credit']  ?>
					</td>
					<td width="80">
						<?php echo $row['Teacher'] ?>
					</td>
					<td width="120">
						<?php echo $schooltime1.$schooltime2.$schooltime3;  ?>
					</td>
					</tr>

					<?php
						}
					}?>
				</table>
			</div>
		</div>
		
	</div>
</body>

</html>