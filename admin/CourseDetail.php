<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/bootstrap.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>




<title>显示课程信息</title>
</head>
<body>
<?php include("header.php"); ?>
<?php
session_start();
if(! isset($_GET['CouNo']))
  {$CouNo=001;}
 else{$CouNo=$_GET['CouNo'];} 
if(! isset($_SESSION["username"])){
  header("Location:../login.php");
  exit();
  }
include("../conn/db_conn.php");
include("../conn/db_func.php");
$ShowDetail_sql="select * from course,department where CouNo='$CouNo' and course.DepartNo=department.DepartNo";
$ShowDetailResult=db_query($ShowDetail_sql);
$row=db_fetch_array($ShowDetailResult);
?>
<center>
<table width="300">
<tr bgcolor="#0066CC">
  <td colspan="3" columspan="2"><div align="center"><font color="#FFFFFF">课程细节</font></div></td>
</tr>
<tr>
   <td width="81" rowspan="8"><img width='80' height='120' img src="../uploadpics/<?php echo $CouNo.'.jpg'?>" border="0" ></td>
   <td width="89" bgcolor='#DDDDDD'>编号</td>
   <td width="114" bgcolor='#DDDDDD'><?php echo $row['CouNo']?></td>
</tr>
<tr>
   <td>名称</td>
   <td><?php echo $row['CouName']?></td>
</tr>
<tr>
   <td bgcolor='#DDDDDD'> 类型</td>
   <td bgcolor='#DDDDDD'><?php echo $row['Kind']?></td>
</tr>
<tr>
   <td>学分</td>
   <td><?php echo $row['Credit']?></td>
</tr>
<tr>
    <td bgcolor='#DDDDDD'>教师</td>
    <td bgcolor='#DDDDDD'><?php echo $row['Teacher']?></td>
</tr>
<tr>
    <td>开课系部</td>
    <td><?php echo $row['DepartName']?></td>
</tr>
<tr>
    <td bgcolor='#DDDDDD'>上课时间</td>
    <td bgcolor='#DDDDDD'><?php echo $row['SchoolTime']?></td>
</tr>
<tr>
    <td>限定人数</td>
    <td><?php echo $row['LimitNum']?></td>
</tr>
</table>
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
</center>
</body>
</html>