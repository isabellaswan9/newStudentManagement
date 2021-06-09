<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>
  <title>浏览已选课程</title>
</head>

<body class="d-flex flex-column h-100">
  <div class="wrap">
    <div class="header">
      <?php include("header.php");?>
      <hr>
    </div>
    <?php
      if (!session_id()) session_start();
      if(!isset($_SESSION['username']))
      {
        header("Location:../login.php");
        exit();
      }
      include("../conn/db_conn.php");
      include("../conn/db_func.php");
      $StuNo=$_SESSION['username'];
      $sql="select * from course,stucou where course.CouNo=stucou.CouNo and StuNo='$StuNo' ";
      $result=db_query($sql);
    ?>
    <div class="contain-wrap" >
      <div class="myTable">
        <table class="table table-hover" width="610" border="0" align="center" cellpadding="0" cellspacing="1">
					<thead>
						<tr class="table-primary" bgcolor="#0066CC" valign='middle' align='center'>
							<th width="80" align="center">
								<font color="#FFFFFF">课程编码</font>
							</th>
              <th width="80" align="center">
								<font color="#FFFFFF">操作</font>
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
                echo "<td width='40' valign='middle' align='center'><a href='CourseDetail.php?CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
                      echo"<td width='40' valign='middle' align='center'><a href='delCourse.php?CouNo=".$row['CouNo']."'>删除</a></td>";
            ?>
            <td width="108" valign='middle' align='center'>
              <?php echo $row['CouName'] ?>
            </td>
            <td width="127" valign='middle' align='center'>
              <?php echo $row['Kind']  ?>
            </td>
            <td width="105" valign='middle' align='center'>
              <?php echo $row['Credit']  ?>
            </td>
            <td width="56" valign='middle' align='center'>
              <?php echo $row['Teacher'] ?>
            </td>
            <td width="83" valign='middle' align='center'>
              <?php echo $schooltime1.$schooltime2.$schooltime3;  ?>
            </td>
          </tr>

          <?php		
            }
          ?>
      </div>

      </table>
      
    </div>
    
  </div>
  <hr>
  <div class="footer">
    <?php include("../footer.php"); ?>
  </div>
</body>

</html>