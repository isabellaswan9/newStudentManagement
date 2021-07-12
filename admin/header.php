<div class="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">学生选课系统（管理员）</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">课程管理</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../ManageCourse/ShowCourse.php">课程列表</a>
            <a class="dropdown-item" href="../ManageCourse/SearchCourse.php">查询课程</a>
            <a class="dropdown-item" href="./ManageCourse/AddCourse.php">添加课程</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">教师管理</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../ManageTeacher/Showtea.php">教师列表</a>
            <a class="dropdown-item" href="../ManageTeacher/Searchtea.php">查询教师</a>
            <a class="dropdown-item" href="../ManageTeacher/Addtea.php">添加教师</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">学生管理</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="Showstudent.php">学生列表</a>
            <a class="dropdown-item" href="SearchStudent.php">查询学生</a>
            <a class="dropdown-item" href="AddStudent.php">添加学生</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
           <ul class="navbar-nav me-auto">  
              <li class="nav-item dropdown">
                  <a href="changepwd.php" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">你好！
<?php 
if (!session_id()) session_start();

  include("../../conn/db_conn.php");
  include("../../conn/db_func.php");
$Namemun = $_SESSION['username'];
$Name_Search = "SELECT adminName FROM admin WHERE adminNo = '$Namemun'";
$Name_Result = db_query($Name_Search);
$Name = mysql_fetch_array($Name_Result);
echo $Name[0];
?></a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="Changepwd.php">修改密码</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">退出系统</a>
                  </div>
              </li>
            </ul>
      </form>
    </div>
  </div>
</nav>
</div>
