<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>登录界面</title>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <script type="text/javascript" src="./bootstrap/js/bootstrap.bundle.js"></script>
  <script>
    
  </script>
</head>
<style>
  .align1{
    display:flex;
    flex-direction: column;
  }
  canvas{
    
  }
  .myFormControl {
  display: inline-block;
  padding: 0.75rem 1.5rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #55595c;
  background-color: #f7f7f9;
  background-clip: padding-box;
  border: 0 solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.myFormControl:focus {
  color: #55595c;
  background-color: #f7f7f9;
  border-color: #8d8d8d;
  outline: 0;
  box-shadow: 0 0 0 0.25rem rgba(26, 26, 26, 0.25);
}
</style>
<body class="d-flex flex-column h-100">
  <div class="wrap">
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">学生管理系统（用户端）</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">登录页
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="contain-wrap">
      <div id="myForm" class="myForm">
        <form method="post" action="ChkLogin.php" onsubmit="return verified()" enctype="multipart/fromdata">
          <fieldset>
            <legend>用户登录</legend>
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label mt-4">用户名</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="请输入学号或工号" name="username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="form-label mt-4">密码</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码" name="userpwd">
            </div>
            <div class="form-group">
              <label for="exampleSelect1" class="form-label mt-4">身份</label>
              <select class="form-select" id="exampleSelect1" name="role">
                <option value="teacher">老师</option>
                <option value="student">学生</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleSelect1" class="form-label mt-4">验证码</label>
              <div class="row">
                <canvas id="canvas" width="120" height="40" class="col-sm-5"></canvas>
                  <input class="myFormControl col-sm-5" type="text" id="verify" placeholder="请输入验证码" name="verify">
              </div>
            <hr>
            <div class="form-group set-center">
              <button type="submit" name="button" id="submit" class="btn btn-primary set-padding">提交</button>
              <button type="reset" name="button" id="reset" class="btn btn-primary set-padding">重置</button>
            </div>
          </fieldset>
        </form>
        <hr>
        <div class="alert alert-dismissible alert-light">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>管理员？</strong>请点击<a href="admin.php" class="alert-link">这里</a>登陆
        </div>
      </div>
    </div>
    <div class="footer">
    </div>
  </div>
  <script>
        var canvas = document.getElementById("canvas");//演员
        var context = canvas.getContext("2d");//舞台，getContext() 方法可返回一个对象，该对象提供了用于在画布上绘图的方法和属性。
        var button = document.getElementById("submit");//获取按钮
        var input = document.getElementById("verify");//获取输入框

        var num //定义容器接收验证码,注意定义为全局变量

        draw();
        canvas.onclick = function () {
            context.clearRect(0, 0, 120, 40);//在给定的矩形内清除指定的像素
            draw();
        }
        
        // 随机颜色函数
        function getColor() {
            var r = Math.floor(Math.random() * 256);
            var g = Math.floor(Math.random() * 256);
            var b = Math.floor(Math.random() * 256);
            return "rgb(" + r + "," + g + "," + b + ")";
        }

        function draw() {
            context.strokeRect(0, 0, 120, 40);//绘制矩形（无填充）
            var aCode = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"];
            // 绘制字母
            var arr = [] //定义一个数组用来接收产生的随机数
            
            for (var i = 0; i < 4; i++) {
                var x = 20 + i * 20;//每个字母之间间隔20
                var y = 20 + 10 * Math.random();//y轴方向位置为20-30随机
                var index = Math.floor(Math.random() * aCode.length);//随机索引值
                var txt = aCode[index];
                context.font = "bold 20px 微软雅黑";//设置或返回文本内容的当前字体属性
                context.fillStyle = getColor();//设置或返回用于填充绘画的颜色、渐变或模式，随机
                context.translate(x, y);//重新映射画布上的 (0,0) 位置，字母不可以旋转移动，所以移动容器
                var deg = 90 * Math.random() * Math.PI / 180;//0-90度随机旋转
                context.rotate(deg);// 	旋转当前绘图
                context.fillText(txt, 0, 0);//在画布上绘制“被填充的”文本
                context.rotate(-deg);//将画布旋转回初始状态
                context.translate(-x, -y);//将画布移动回初始状态
                arr[i] = txt //接收产生的随机数
            }
            num = arr[0] + arr[1] + arr[2] + arr[3] //将产生的验证码放入num
            // 绘制干扰线条
            for (var i = 0; i < 8; i++) {
                context.beginPath();//起始一条路径，或重置当前路径
                context.moveTo(Math.random() * 120, Math.random() * 40);//把路径移动到画布中的随机点，不创建线条
                context.lineTo(Math.random() * 120, Math.random() * 40);//添加一个新点，然后在画布中创建从该点到最后指定点的线条
                context.strokeStyle = getColor();//随机线条颜色
                context.stroke();// 	绘制已定义的路径
            }
            // 绘制干扰点，和上述步骤一样，此处用长度为1的线代替点
            for (var i = 0; i < 20; i++) {
                context.beginPath();
                var x = Math.random() * 120;
                var y = Math.random() * 40;
                context.moveTo(x, y);
                context.lineTo(x + 1, y + 1);
                context.strokeStyle = getColor();
                context.stroke();
            }
        }
    function verified(){
      var text = input.value //获取输入框的值
                if (text === num) {
                    alert('验证通过')
                    return true;
                } else {
                    alert('验证失败')
                    return false;
                }
      return true;
    }

  </script>
</body>
</html>