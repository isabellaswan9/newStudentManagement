<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../../style.css">

<script type="text/javascript" src="../../bootstrap/js/bootstrap.bundle.js"></script>



<title>添加课程</title>
</head>

<body class="d-flex flex-column h-100">

<?php include("header.php"); ?>
<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){
	header("Location:../..//login.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
		header("Location:../..//login.php");
		exit();
		}
?>

<div class="contain-wrap" style=" min-height: 1200px;">
    <div class="myForm">
        <form method="post" action="AddCourse1.php">
            <fieldset>
                <legend>请输入课程信息</legend>
                <div class="form-group">
                    <label for="exampleSelect1" class="form-label mt-4">课程编号：</label>
                    <?php
                    $adminNo=$_SESSION['username'];
                    $ShowCourse_sql="select * from course order by CouNo desc";
                    $ShowCourseResult=db_query($ShowCourse_sql);
                    $row=db_fetch_array($ShowCourseResult);
                    $CouNo='0'. strval(intval($row['CouNo'])+1);
                    ?>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="CouNo"/>

                    <label for="exampleSelect1" class="form-label mt-4">课程名称：</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="CouName"/>

                    <label for="exampleSelect1" class="form-label mt-4">课程类型：</label>
                    <select id="exampleSelect1" name="Kind">
                    <option value="信息技术">信息技术</option>
                    <option value="工程技术">工程技术</option>
                    <option value="人文">人文</option>
                    <option value="管理">管理</option>
                    </select>
                    </br>

                    <label for="exampleSelect1" class="form-label mt-4">学分：</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Credit">
                    <label for="exampleSelect1" class="form-label mt-4">课程所属学院：</label>
                    <select id="exampleSelect1" name="DepartNo">
                    <option value="01">数学与信息科学学院</option>
                    <option value="02">外国语学院</option>
                    <option value="03">土木建筑学院</option>
                    <option value="04">计算机学院</option>
                    <option value="05">电气与工程学院</option>
                    <option value="06">化学与材料学院</option>
                    <option value="07">经济与统计学院</option>
                    <option value="08">人文学院</option>
                    <option value="09">体育学院</option>
                    </select>
                    <label for="exampleSelect1" class="form-label mt-4">授课教师姓名：</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Teacher">

                    <label for="exampleSelect1" class="form-label mt-4">上课时间：</label>
                  <p>每周第一次课时间：
                    <select id="exampleSelect1" name="week1">
                        <option value="1">周一</option>
                        <option value="2">周二</option>
                        <option value="3">周三</option>
                        <option value="4">周四</option>
                        <option value="5">周五</option>
                    </select>
                    <select id="exampleSelect1" name="time1">
                        <option value="1">第一大节</option>
                        <option value="2">第二大节</option>
                        <option value="3">第三大节</option>
                        <option value="4">第四大节</option>
                        <option value="5">第五大节</option>
                    </select>
                  </p>
                  <p>每周第二次课时间：
                    <select id="exampleSelect1" name="week2">
                        <option value="0">无</option>
                        <option value=1>周一</option>
                        <option value="2">周二</option>
                        <option value="3">周三</option>
                        <option value="4">周四</option>
                        <option value="5">周五</option>
                    </select>
                    <select id="exampleSelect1" name="time2">
                        <option value="0">无</option>
                        <option value=1>第一大节</option>
                        <option value="2">第二大节</option>
                        <option value="3">第三大节</option>
                        <option value="4">第四大节</option>
                        <option value="5">第五大节</option>
                    </select>
                    </p>
                    <p>每周第三次课时间：
                    <select id="exampleSelect1" name="week3">
                        <option value="0">无</option>
                        <option value="1">周一</option>
                        <option value="2">周二</option>
                        <option value="3">周三</option>
                        <option value="4">周四</option>
                        <option value="5">周五</option>
                    </select>
                    <select id="exampleSelect1" name="time3">
                        <option value="0">无</option>
                        <option value="1">第一大节</option>
                        <option value="2">第二大节</option>
                        <option value="3">第三大节</option>
                        <option value="4">第四大节</option>
                        <option value="5">第五大节</option>
                    </select>
                    </p>
                    <label for="exampleSelect1" class="form-label mt-4">上课地点：</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="Classroom">
                    <label for="exampleSelect1" class="form-label mt-4">限定人数：</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="" name="LimitNum">

                    <div class="form-group set-center">
                      <button type="submit" name="B1" id="button" class="btn btn-primary set-padding">确定</button>
                      <button type="reset" name="B2" id="button" class="btn btn-primary set-padding">重置</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</br>
</br>
</br>

</body>
</html>