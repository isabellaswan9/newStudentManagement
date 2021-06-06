<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">学生选课系统（学生端）</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link " href="ShowCourse.php">所有课程
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="SearchCourse.php">查询课程</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showchoosed.php">浏览所选课程</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showscore.php">查询成绩</a>
        </li>
      </ul>
      <form class="d-flex">
           <ul class="navbar-nav me-auto">  
              <li class="nav-item dropdown">
                  <a href="changepwd.php" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">你好！
<?php if (!session_id()) session_start();echo $_SESSION['username']?></a>
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