<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">学生选课系统（教师端）</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link " href="ShowCourse.php">浏览课程
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="SearchCourse.php">查询课程</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ShowTeached.php">所教课程</a>
        </li>
      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
            你好！<?php if (!session_id()) session_start(); echo $_SESSION['username']?></a>
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