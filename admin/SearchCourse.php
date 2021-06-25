<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">

<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>



<title>查询课程</title>
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
	$adminNo=$_SESSION['username'];
?>
  <div class="contain-wrap">
    <div class="myForm">
      <form method="get" action="SearchCourse1.php">
          <fieldset>
            <legend>请输入查询信息</legend>
            <div class="form-group">
              <label for="exampleSelect1" class="form-label mt-4">查询类型：</label>
              <select id="exampleSelect1" name="ColumnName">
                <option value="CouNo">课程编号</option>
                <option value="CouName">课程名称</option>
                <option value="Kind">类型</option>
                <option value="Credit">学分</option>
                <option value="Teacher">教师</option>
                <option value="DepartName">开课系部</option>
              </select>
            </div>    
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label mt-4">课程信息：</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  placeholder="" name="keyWord">
            </div>
            <div class="form-group set-center">
              <button type="submit" name="button" id="button" class="btn btn-primary set-padding">确定</button>
                <button type="reset" name="button" id="button" class="btn btn-primary set-padding">重置</button>
            </div>
          </fieldset>
      </form>
   </div>
  </div>

</body>
</html>