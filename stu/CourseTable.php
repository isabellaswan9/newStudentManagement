<html>
<head>
<meta charset='UTF-8'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style>
caption{
	text-align:center;
	font-size:40px;
	color:#000000;
	margin:2%;

}
.table{
	width:80%;
	margin:auto;
	text-align:center;
	border:2px solid #ccc;	
}
td{
	height:120px;
	width:18%;
	border:1px solid #ccc;
}
th{
	text-align:center;
}
.coursetime{
	width:10%;
}
</style>

</head>
<body>
<table class="table">
  <caption>我的课表</caption>
  <thead>
    <tr>
      <th class='coursetime'>时间</th>
      <th >星期一</th>
	  <th>星期二</th>
	  <th>星期三</th>
	  <th>星期四</th>
	  <th>星期五</th>
      </tr>
  </thead>
 <tbody>
    <tr class="active">
      <td class='coursetime'>第一节</td>
      <td id='1'></td>
      <td id='6'></td>
	  <td id='11'></td>
	  <td id='16'></td>
	  <td id='21'></td>
	  </tr>
    <tr class="success">
      <td class='coursetime'>第二节</td>
      <td id='2'></td>
      <td id='7'></td>
	  <td id='12'></td>
	  <td id='17'></td>
	  <td id='22'></td>
	  </tr>
    <tr class="warning">
      <td class='coursetime'>第三节</td>
      <td id='3'></td>
      <td id='8'></td>
	  <td id='13'></td>
	  <td id='18'></td>
	  <td id='23'></td>
	  </tr>
    <tr class="danger">
      <td class='coursetime'>第四节</td>
      <td id='4'></td>
      <td id='9'></td>
	  <td id='14'></td>
	  <td id='19'></td>
	  <td id='24'></td>
	  </tr>
	<tr class="info">
      <td class='coursetime'>第五节</td>
      <td id='5'></td>
      <td id='10'></td>
	  <td id='15'></td>
	  <td id='20'></td>
	  <td id='25'></td>
	  </tr>
 </tbody>
</table>
</div>
<?php
session_start();
if(! isset($_SESSION["username"])){//会话不存在就回去登录
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	//$StuNo=$_POST[StuNo];//学号
	$StuNo='12345678';
	$ShowDetail_sql="select * from coursetable where StuNo='$StuNo'";//查看该学生选了什么课
	$ShowDetailResult=db_query($ShowDetail_sql);
	//获取StuNo, course.CouNo,CouName,Classroom,time1,time2,time3，一门课一行
	while($detail=mysql_fetch_array($ShowDetailResult)){//以课时号为定位把课程名和教室放入对应的格子
	for($i=1;$i<25;$i++){
		if($detail['time1']==$i)
		echo"<script>document.getElementById('".$i."').innerHTML='".$detail['CouName'].
		"<br>".$detail['Classroom']."'</script>";
		}
		for($i=1;$i<25;$i++){
		if($detail['time2']==$i)
		echo"<script>document.getElementById('".$i."').innerHTML='".$detail['CouName'].
		"<br>".$detail['Classroom']."'</script>";
		}
	for($i=1;$i<25;$i++){
		if($detail['time3']==$i)
		echo"<script>document.getElementById('".$i."').innerHTML='".$detail['CouName'].
		"<br>".$detail['Classroom']."'</script>";
		}			
	}

?>
</body>
</html>