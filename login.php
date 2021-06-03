<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录界面</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="center">
  <form method="post" action="ChkLogin.php">
    <table>
      <caption>
        用户登录
      </caption>
      <tr>
        <td  class="input-group-addon">用户名：</td>
        <td ><label for="textfield"></label>
        <input name="username" type="text" id="textfield" size="15" class="form-control"/></td>
      </tr>
      <tr>
        <td class="input-group-addon">密码：</td>
        <td><label for="textfield2"></label>
        <input name="userpwd" type="password" id="textfield2" size="15" class="form-control"/></td>
      </tr>
      <tr>
        <td class="input-group-addon">身份：</td>
        <td><label for="select">
          <select name="role" size="1" class="btn btn-default dropdown-toggle">
            
            <option value="student">学生</option>
            <option value="teacher">教师</option>
            
          </select>
        </label></td>
      </tr>
    </table>
    <div class="btn-group" role="group" aria-label="...">
    <input type="submit" name="button" id="button" value="提交" class="btn btn-default"/>  
          </td>     
          <td >  
          <input type="reset" name="button2" id="button2" value="重置" class="btn btn-default"/>
          </div>
  </form>
  <p>管理员？请点击<a href="admin.php">这里登陆</a></p>
</center>
</body>
</html>