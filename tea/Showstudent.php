<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看学生成绩-教师端页面</title>
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
	}/*
	unset($_SESSION['CouNo']);

	unset($_SESSION['data']);*/
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$StuNo=$_SESSION['username'];/*教师编号*/
	$CouNo=$_GET['CouNo'];/*课程编号*/
	$_SESSION['CouNo'] = $CouNo;
	$ShowCourse_sql="select student.StuNo,student.StuName,student.ClassNo,score.score,score.CouNo,score.flag,course.CouName
	from student join score 
	on student.StuNo=score.StuNo join course on course.CouNo=score.CouNo where score.CouNo='$CouNo' order by student.StuNo asc";
	$ShowCourseResult=db_query($ShowCourse_sql);

?>
<div class="contain-wrap">
<div class="myTable">
<table class="table table-hover" width="610" border="0" align="center" cellpadding="0" cellspacing="1">
	<caption align="top" style="text-align:center"><font size="5" color="black">
		<?php
		if(db_num_rows($ShowCourseResult)>0){
			$row1=db_fetch_array($ShowCourseResult);
			echo $row1[4];
			echo "：   ";
			echo $row1[6];
			}

	?>
		
	</font></caption>
					<thead>
						<tr class="table-primary" bgcolor="#0066CC" valign='middle' align='center'>
							<th width="80">
								<font color="#FFFFFF" align="center">序号</font>
							</th>				
														<th width="100">
								<font color="#FFFFFF" align="center">学院</font>
							</th>
																					<th width="100">
								<font color="#FFFFFF" align="center">班级</font>
							</th>

							
							<th width="80">
								<font color="#FFFFFF" align="center">学号</font>
							</th>
							<th width="100">
								<font color="#FFFFFF" align="center">姓名</font>
							</th>

							<th width="100">
								<font color="#FFFFFF" align="center">成绩</font>
							</th>
							<th width="100" name="hiden">
								<font color="#FFFFFF" align="center">添加成绩</font>
							</th>
						</tr>
					</thead>

<?php
if(db_num_rows($ShowCourseResult)>0){
	$number=db_num_rows($ShowCourseResult);
	for($i=0;$i<$number;$i++){
		if($i==0){
					$row = $row1;
		}
		else{
					$row = db_fetch_array($ShowCourseResult);
					
		}
		$ShowStudent_sql2="SELECT class.ClassName from student LEFT JOIN class ON class.ClassNo=student.ClassNo WHERE student.ClassNo=".$row['ClassNo'];
		$ShowStudentResult2=db_query($ShowStudent_sql2);
		$ShowStudent_sql3="SELECT department.DepartName from class
							LEFT JOIN department ON department.DepartNo=class.DepartNo
							WHERE class.ClassNo=".$row['ClassNo'];
		$ShowStudentResult3=db_query($ShowStudent_sql3);
		$class=db_fetch_array($ShowStudentResult2);
		$department=db_fetch_array($ShowStudentResult3);
		$data[] = $row['StuNo'];
			if($i%2 ==0)
			  echo"<tr bgcolor='#DDDDDD'>";
			else
			  echo"<tr>";

			  echo"<td width='80' valign='middle' align='center'>".($i+1)."</td>";
			  echo"<td width='80' valign='middle' align='center'>".$department[0]."</td>";
			  echo"<td width='80' valign='middle' align='center'>".$class[0]."</td>";
			  echo"<td width='80' valign='middle' align='center'>".$row['StuNo']."</td>";
			  
			  echo"<td width='80' valign='middle' align='center'>".$row['StuName']."</td>";
			  echo"<td width='80' valign='middle' align='center'>".$row['score']."</td>";
		 	  /*点击查看可以查看学生名单以及录入成绩*/		  
			 echo"<td width='55' name='hiden' valign='middle' align='center' ><form method='POST' action='ChangeAllScore.php'>       					 	
			 <input type='text' name='CJ[]'/>
        	</a></td>
        	";
			  echo"</tr>";
			  $j=$i+1; 
		 
		}
	}
?>



</table>
	<div class='form-group set-center'>
	<?php
			if($row['flag'] == 0){
					$_SESSION['data'] = $data;
		    echo" 
                      <button type='submit' name='temporary' id='button' class='btn btn-primary set-padding'>保存</button>
                      <button type='submit' name='permanent' id='button' class='btn btn-primary set-padding'>提交</button>
                      <button type='reset' name='B2' id='button' class='btn btn-primary set-padding'>重置</button>
                    </form>";
		}
		else{
			echo "<p id='get'></p></form>";
			echo" <form action='statis.php'>
              <button type='submit'  class='btn btn-primary set-padding'>成绩已提交，点击查看统计详情
              </button>
            </form>";
		}?>
		</div>
	</br>

				</div>
					</div>
<?php include("../footer.php"); ?>   


<script type="text/javascript">
	if(document.getElementById("get")!=null){
		var tab = document.getElementsByName("hiden");
		for(let index = 0; index < tab.length; index++){
			tab[index].style.display = "none";
		}
}

</script>


</body>
</html>