<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="../bootstrap/bootstrap.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../style.css">

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>


<title>结果 -查询教师 -超级管理员</title>
</head>

<body class="d-flex flex-column h-100">
	<?php include("header.php"); ?>
<?php
if (!session_id()) session_start();
if(!isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
}
$keyWord=$_GET['keyWord'];
$ColumnName=$_GET['ColumnName'];
$keyWord=trim($keyWord);
include("../conn/db_conn.php");
include("../conn/db_func.php");
switch($ColumnName)
{
	case "TeaNo";
		$sql="select * from teacher where TeaNo LIKE \"%".$keyWord."%\"";
		break;
	case "TeaName";
		$sql="select * from teacher where TeaName LIKE \"%".$keyWord."%\"";
		break;
	case "DepartNo";
		$sql="select * from teacher where DepartNo LIKE \"%".$keyWord."%\"";
		break;
}
$result=db_query($sql);
?>



<div class="contain-wrap" style=" min-height: 400px;">
	<div class="myTable">
		<table class="table table-hover" width="610" border="0" align="center" cellpadding="0" cellspacing="1">
			<thead>
				<tr class="table-primary" bgcolor="#0066CC" align='center' >
					<th width="80" align="center">
						<font color="#FFFFFF">工号</font>
					</th>
					<th width="220" align="center">
						<font color="#FFFFFF">教师姓名</font>
					</th>
					<th width="80">
						<font color="#FFFFFF" align="center">学院</font>
					</th>
				</tr>
			</thead>
			<?php
			if(db_num_rows($result)>0){
				$number=db_num_rows($result);
			for($i=0;$i<$number;$i++)
				{
					$row=db_fetch_array($result);
					
					if($i%2==0)
						echo "<tr bgcolor='#dddddd'>";
					else
						echo "<tr>";
					echo "<td width='80' align='center'>".$row['TeaNo']."</td>";
			?>

			<td width="220" align="center">
				<?php echo $row['TeaName'] ?>
			</td>
			<td width="80"  align="center">
				<?php echo $row['DepartNo']  ?>
			</td>
			</tr>

			<?php
				}
			}?>
		</table>
	</div>
</div>
</table>
</body>
</html>