<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看学生成绩-教师端页面</title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <script type="text/javascript" src="./bootstrap/js/bootstrap.bundle.js"></script>
</head>

<body>

<?php include("header.php");?>
<?php
session_start();
if(! isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
	}/*
	unset($_SESSION['CouNo']);

	unset($_SESSION['data']);*/
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$StuNo=$_SESSION['username'];/*教师编号*/
	$CouNo=$_GET['CouNo'];/*课程编号*/
	$_SESSION['CouNo'] = $CouNo;
	$ShowCourse_sql=" select student.StuNo,student.StuName,student.ClassNo,score.score,score.CouNo,score.flag,course.CouName
	from student join score 
	on student.StuNo=score.StuNo join course on course.CouNo=score.CouNo where score.CouNo='$CouNo'";
	$ShowCourseResult=db_query($ShowCourse_sql);
?>
<div class="contain-wrap">
<div class="myTable">
<table class="table table-hover" width="610" border="0" align="center" cellpadding="0" cellspacing="1">
					<thead>
						<tr class="table-primary" bgcolor="#0066CC">
							<th width="80">
								<font color="#FFFFFF" align="center">课程编码</font>
							</th>
							<th width="50">
								<font color="#FFFFFF" align="center">课程名称</font>
							</th> 
							<th width="80">
								<font color="#FFFFFF" align="center">学号</font>
							</th>
							<th width="100">
								<font color="#FFFFFF" align="center">班级</font>
							</th>
							<th width="100">
								<font color="#FFFFFF" align="center">姓名</font>
							</th>
							<th width="100">
								<font color="#FFFFFF" align="center">成绩</font>
							</th>
							<th width="100">
								<font color="#FFFFFF" align="center">添加成绩</font>
							</th>
						</tr>
					</thead>
<?php
if(db_num_rows($ShowCourseResult)>0){
	$number=db_num_rows($ShowCourseResult);
	if(empty($_GET['p']))
	$p=0;
	else {$p=$_GET['p'];}	
	$check=$p +10;
	for($i=0;$i<$number;$i++){
		$row=db_fetch_array($ShowCourseResult);
		$data[] = $row['StuNo'];
		echo "</br>";
		if($i>=$p && $i < $check){
			if($i%2 ==0)
			  echo"<tr bgcolor='#DDDDDD'>";
			else
			  echo"<tr>";
			  echo"<td width='80' align='center'>".$row['CouNo']."</td>";
			  echo"<td width='320'>".$row['CouName']."</td>";
			  echo"<td width='80'>".$row['StuNo']."</td>";
			  echo"<td width='80'>".$row['ClassNo']."</td>";
			  echo"<td width='80'>".$row['StuName']."</td>";
			  echo"<td width='80'>".$row['score']."</td>";
		 	  /*点击查看可以查看学生名单以及录入成绩*/		  
			 echo"<td width='55'><form method='POST' action='ChangeAllScore.php'>       					 	
			 <input type='text' name='CJ[]'/>
        	</a></td>
        	";
			  echo"</tr>";
			  $j=$i+1; 
		 }
		}
		if($row['flag'] == 0){
					$_SESSION['data'] = $data;
		    echo"                <div class='form-group set-center'>
                      <button type='submit' name='temporary' id='button' class='btn btn-primary set-padding'>保存</button>
                      <button type='submit' name='permanent' id='button' class='btn btn-primary set-padding'>提交</button>
                      <button type='reset' name='B2' id='button' class='btn btn-primary set-padding'>重置</button>
                    </div></form>";
		}
		else{
			echo "<p>成绩已提交</p>";
		}

	}
?>



</table>
<?php
    if(isset($_POST['submitStu'])){
        $stuNum=$_POST['stuNum'];
        if($stuNum>=0){
            echo '<div>';
            echo '<form action="" method="post" name="form1">';
                echo '<table border="1" >';
                    echo '<tr><td>Sno:</td><td>Name:</td><td>Score:</td></tr>';
                    for($i=0;$i<$stuNum;$i++){
                        echo '<tr><td><input type="text" name="XH[]"/></td><td><input type="text" name="XM[]"/></td><td><input type="text" name="CJ[]"/></td></tr>';
                    }
                    echo '<tr><td colspan="3"><input type="submit" value="OK" name="bt_stu"/></td></tr>';
                echo '</table>';
            echo '</form>';
            echo '</div>';
        }else{
            echo "Please input corrent num";
        }
    }
?>

<!--翻页功能尚未实现-->
<div class="set-center">
					<ul class="pagination">
						<li class="page-item">
							<?php 
							echo"<a class='page-link' href='Showstudent.php?p=0&CouNo=".$row['CouNo']."'>第一页</a>"
							?>
						</li>
						<?php
						if($p>9){
							$last=(floor($p/10)*10)-10;
							echo "<li class='page-item'><a href='Showstudent.php? p=$last & CouNo=".$row['CouNo']."' class='page-link'>上一页</a></li>";
							}
							else
							echo "<li class='page-item disabled'><a href='' class='page-link'>上一页</a></li>";
						?>
						<li class="page-item">
							<?php
								if($i>9 and $number>$check){
										echo"<li class='page-item'><a href='Showstudent.php?p=$j & CouNo=".$row['CouNo']."' class='page-link'>下一页</a></li>";
									}
								else
									echo"<li class='page-item disabled'><a href='ShowCourse.php? p=$j' class='page-link'>下一页</a></li>";
								?>
						</li>
						<li class="page-item">
							<?php
				      if($i>9)
				      {
				      $final=floor($number/10)*10;
				      echo"<a class='page-link' href='Showstudent.php? p=$final& CouNo=".$row['CouNo']."'>最后一页</a>";
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