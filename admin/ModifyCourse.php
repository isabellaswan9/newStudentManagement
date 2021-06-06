<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>



<title>修改课程信息</title>
</head>

<body>
<?php include("header.php") ?>
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
$ShowDetail_sql="select * from course,department where CouNo='$CouNo' and course.DepartNo=department.DepartNo";
$ShowDetailResult=db_query($ShowDetail_sql);
$row=db_fetch_array($ShowDetailResult);
$CouNo='0'. strval(intval($row['CouNo'])+1);
$CouName='CouName'. strval(intval($row['CouName']));
$Kind='Kind'. strval(intval($row['Kind']));
$Credit='Credit'. strval(intval($row['Credit']));
$Teacher='Teacher'. strval(intval($row['Teacher']));
$DepartName='DepartName'. strval(intval($row['DepartName']));
$SchoolTime='SchoolTime'. strval(intval($row['SchoolTime']));
$LimitNum='LimitNum'. strval(intval($row['LimitNum']));
?>

<div class="contain-wrap">
  <div class="myForm">
    <form method="get" action="ModifyCourse1.php">
        <fieldset>
          <legend>修改课程信息</legend>
          <div class="form-group">
          <label for="exampleSelect1" class="form-label mt-4">编号：</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder=""  name="CouNo" value="<?php echo $row['CouNo']?>"/>

          <label for="exampleSelect1" class="form-label mt-4">名称:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="CouName" value="<?php echo $row['CouName']?>" />

          <label for="exampleSelect1" class="form-label mt-4">类型:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Kind" value="<?php echo $row['Kind']?>"/>

          <label for="exampleSelect1" class="form-label mt-4">学分:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Credit" value="<?php echo $row['Credit']?>"/>

          <label for="exampleSelect1" class="form-label mt-4">教师:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Teacher" value="<?php echo $row['Teacher']?>"/>

          <label for="exampleSelect1" class="form-label mt-4">上课时间:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="SchoolTime" value="<?php echo $row['SchoolTime']?>"/>

          <label for="exampleSelect1" class="form-label mt-4">限定人数:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="LimitNum" value="<?php echo $row['LimitNum']?>"/>
          <div class="form-group set-center">
          <button type="submit" name="B1" id="button" class="btn btn-primary set-padding">确定</button>
          <button type="reset" name="B2" id="button" class="btn btn-primary set-padding">重置</button>
        </div>
          </div>
         </div>
        </fieldset>
    </form>
 </div>
</div>


</body>
</html>