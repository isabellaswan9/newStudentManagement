
<?php
if (!session_id()) session_start();
include("../conn/db_conn.php");
include("../conn/db_func.php");
if(!isset($_SESSION['username']))
{
	header("Location:../login.php");
	exit();
}
$keyWord=$_POST['keyWord'];
$ColumnName=$_POST['ColumnName'];
$keyWord=trim($keyWord);
switch($ColumnName)
{
	case "TeaNo";
		$sql="select * from teacher where TeaNo='$keyWord'";
		break;
	case "TeaName";
		$sql="select * from teacher where TeaName LIKE \"%".$keyWord."%\"";
		break;
	case "DepartNo";
		$sql="SELECT * from teacher INNER JOIN department ON department.DepartNo = teacher.DepartNo where department.DepartName LIKE \"%".$keyWord."%\"";
		break;
}
$result=db_query($sql);
?>



<div class="contain-wrap" style=" min-height: 650px;">
	<div class="myTable">
		<table class="table table-hover" width="610" border="0" align="center" cellpadding="0" cellspacing="1">
			<thead>
				<tr class="table-primary" bgcolor="#0066CC" align='center' >
					<th width=30% align="center">
						<font color="#FFFFFF">工号</font>
					</th>
					<th width=30% align="center">
						<font color="#FFFFFF">教师姓名</font>
					</th>
					<th width=40%>
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
					echo "<td  align='center'>".$row['TeaNo']."</td>";
			?>

			<td align="center">
				<?php echo $row['TeaName'] ?>
			</td>
			<?php $Search_Depart = "SELECT DepartName FROM department WHERE DepartNo='".$row['DepartNo']."' ";
			  $Search_Result = db_query($Search_Depart);
			  $DepartName = db_fetch_array($Search_Result);
			  echo"<td  align='center'>".$DepartName[0]."</td>";?>
		
			</tr>

			<?php
				}
			}?>
		</table>
	</div>
</div>