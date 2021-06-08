<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>




<title>显示课程信息</title>
</head>

<body class="d-flex flex-column h-100">
<?php include("header.php"); ?>
<?php
if (!session_id()) session_start();
if(! isset($_GET['CouNo']))
  {$CouNo=001;}
 else{$CouNo=$_GET['CouNo'];} 
if(! isset($_SESSION["username"])){
  header("Location:../login.php");
  exit();
  }
include("../conn/db_conn.php");
include("../conn/db_func.php");
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
$ShowDetail_sql="select * from course,department where CouNo='$CouNo' and course.DepartNo=department.DepartNo";
$ShowDetailResult=db_query($ShowDetail_sql);
$row=db_fetch_array($ShowDetailResult);
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
?>

<div class="contain-wrap">
  <div class="myTable">
    <table  class="table table-hover" width="500" border="0" align="center" cellpadding="0" cellspacing="1" margin="auto" >
      <thead>
        <tr class="table-primary" bgcolor="#0066CC">
          <th align="center" colspan="3" columspan="2"><div align="center"><font color="#FFFFFF">课程细节</font></div>
          </th>
        </tr>
        <tr class="table-active">
          <th width="125" align="center">
            <font>编号</font>
          </th>
          <th width="125" align="center">
            <font><?php echo $row['CouNo']?></font>
          </th>
        </tr>
        <tr>
          <th align="center">
            <font>名称</font>
          </th>
          <th  align="center">
            <font><?php echo $row['CouName']?></font>
          </th>
        </tr>
          <tr class="table-active">
          <th  align="center">
            <font>类型</font>
          </th>
          <th  align="center">
            <font><?php echo $row['Kind']?></font>
          </th>
        </tr>
          <tr>
          <th  align="center">
            <font>学分</font>
          </th>
          <th align="center">
            <font><?php echo $row['Credit']?></font>
          </th>
        </tr>
          <tr class="table-active">
          <th  align="center">
            <font>教师</font>
          </th>
          <th  align="center">
            <font><?php echo $row['Teacher']?></font>
          </th>
        </tr>
        <tr>
          <th align="center">
            <font>开课系部</font>
          </th>
          <th align="center">
            <font><?php echo $row['DepartName']?></font>
          </th>
        </tr>
        <tr class="table-active">
          <th align="center">
            <font>上课时间</font>
          </th>
          <th align="center">
            <font><?php echo $schooltime1.$schooltime2.$schooltime3;?></font>
          </th>
        </tr>
        <tr>
          <th align="center">
            <font>限定人数</font>
          </th>
          <th align="center">
            <font><?php echo $row['LimitNum']?></font>
          </th>
        </tr>

      </thead>
    </table>

<br>
<?php
$StuNo=$_SESSION["username"];
$GetTotal_SQL="select * from stucou where StuNo='$StuNo'";
$GetTotalResult=db_query($GetTotal_SQL);
if(db_num_rows($GetTotalResult)<5){
?>
<a href="ShowCourse.php">返回课程列表页</a>
<?php include("../footer.php"); ?>   
<?php
}
?>
  </div>
</div>

</body>
</html>