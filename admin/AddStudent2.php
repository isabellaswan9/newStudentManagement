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

<title>批量添加课程操作程序</title>
</head>

<body class="d-flex flex-column h-100">
<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){
	header("Location:index.php");
	exit();
	}else if($_SESSION["role"]<>"admin"){
	header("Location:student.php");
	exit();
		}
include("../conn/db_conn.php");
include("../conn/db_func.php");


require_once '../PHPExcel/Classes/PHPExcel.php';
//require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';
//require_once '../PHPExcel/Classes/PHPExcel/Reader/Excel5.php';
//以上三步加载phpExcel的类

include "../PHPExcel/Classes/PHPExcel/IOFactory.php";

//$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format 

//接收存在缓存中的excel表格
$filename = $_FILES['myfile']['name'];
$inputFileType = PHPExcel_IOFactory::identify($filename);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($filename); //$filename可以是上传的表格，或者是指定的表格


$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow();// 取得总行数 
$highestColumn = $sheet->getHighestColumn();// 取得总列数
//循环读取excel表格,读取一条,插入一条
//j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
//$a表示列号

for($j=2;$j<=$highestRow;$j++)  
    {
        $StuNo = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取StuNo列的值
        $ClassNo = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取ClassNo列的值
        $StuName = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取StuName列的值

        $StuNo=trim($StuNo);
        $StuName=trim($StuName);
        $ClassNo=trim($ClassNo);
        $pw='0000'.substr($StuNo,4,4);

        $AddStudent_SQL="insert into Student values('$StuNo','$ClassNo','$StuName',SHA1('$pw'))";
        $AddStudent_Result=db_query($AddStudent_SQL);
        if(!$AddStudent_Result){
            echo"<script>";
            echo"alert(\"添加学生失败，请重新添加\");";
            echo"location. href=\"AddStudent.php?flag=fail&type=batch\"";
            echo"</script>";
        }
    }
echo"<script>";
echo"alert(\"添加学生成功\");";
echo"location. href=\"AddStudent.php?flag=success&type=batch\"";
echo"</script>";
?>
</body>
</html>