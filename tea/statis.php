<html class="h-100">
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.js"></script>

<script src="echarts.min.js"></script>

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
	height:60px;
	width:20%;
	border:1px solid #ccc;
}
th{
	text-align:center;
}
.hide{
	width:0%;
	height:0%;
}
.chart{
	width: 80%;
	height:1000px;
	margin:auto; 
	margin-top:50px
}
</style>

</head>
<body class="d-flex flex-column h-100">
	<?php include("header.php");?>
<table class="table">
  <caption>成绩统计</caption>
  <thead>
    <tr>
      <th >最高分</th>
	  <th>最低分</th>
	  <th>平均分</th>
	  <th>及格人数</th>
	  <th>总人数</th>
      </tr>
  </thead>
 <tbody>
    <tr >
      <td class="success" id='maxscore'></td>
	  <td class="danger" id='minscore'></td>
	  <td class="info" id='avgscore'></td>
	  <td class='warning' id='passnum'></td>
	  <td  class="active" id='stunum'></td>

	  </tr>

 </tbody>
</table>

<div  class='hide' id='over'></div>
</div>

<?php
if (!session_id()) session_start();
if(! isset($_SESSION["username"])){//会话不存在就回去登录
	header("Location:../login.php");
	exit();
	}
	include("../conn/db_conn.php");
	include("../conn/db_func.php");
	$CuoNo=$_SESSION['CouNo'] ;
	$all_sql="select * from statistic where CouNo='$CuoNo'";//查看该课程的统计情况
	$allgradeResult=db_query($all_sql);
	$detail=mysql_fetch_array($allgradeResult);
	//将结果返回到页面上
	echo"<script>document.getElementById('maxscore').innerHTML='".$detail['maxscore']."'</script>";
	echo"<script>document.getElementById('minscore').innerHTML='".$detail['minscore']."'</script>";
	echo"<script>document.getElementById('avgscore').innerHTML='".$detail['avgscore']."'</script>";
	echo"<script>document.getElementById('passnum').innerHTML='".$detail['passnum']."'</script>";
	echo"<script>document.getElementById('stunum').innerHTML='".$detail['stunum']."'</script>";
	echo"<script>document.getElementById('over').innerHTML='".$detail['over90'].$detail['over80'].$detail['over70'].$detail['over60'].$detail['over50'].$detail['over40'].$detail['over30'].$detail['over20'].$detail['over10'].$detail['over0']."'</script>";
	
	


?>


<script type="module">
window.onload =function bargraph(){
var chartDom = document.getElementById('bar_graph');
var myChart = echarts.init(chartDom);
var option;
var over=document.getElementById('over').innerHTML;
option = {
		title:{
		text:'学生成绩分布图',
		margin: 50,
		textStyle:{
			color:'black',
			fontSize:'30px',
		}
		 
		
	},
    xAxis: {
        type: 'category',
		name:'分数段',	
        data: ['90', '80', '70', '60', '50', '40', '30','20','10','1']
    },
    yAxis: {
        type: 'value',
		name:'人数',
		
    },
    series: [{
		
        data: over,
        type: 'bar',
		itemStyle: {
					normal: {
						label: {
								show: true, //开启显示
								position: 'top', //在上方显示
								textStyle: { //数值样式
										color: 'gray',
										fontSize: 16,
	}}}}}
			]
};

option && myChart.setOption(option);
//第二张图饼图
var chartDom2 = document.getElementById('pie_graph');
var myChart2 = echarts.init(chartDom2);
var option2;

option2 = {
    legend: {
        top: 'bottom'
    },
    toolbox: {
        show: true,
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    series: [
        {  
		title:{
		text:'学生成绩百分比图',
		textStyle:{
			color:'black',
			fontSize:'30px',
			}
		},
            
            type: 'pie',
            radius: [50, 250],
            center: ['50%', '50%'],
            roseType: 'area',
            itemStyle: {
                borderRadius: 8
            },
			label:{            //饼图图形上的文本标签
                            normal:{
                                show:true,
                                position:'outer', //标签的位置
                                textStyle : {
                                    fontWeight : 300 ,
                                    fontSize : 16    //文字的字体大小
                                },
                                formatter:'{d}%'

                                
                            }
                        },
			
            data: [
                {value: over[0], name: '90-100'},
                {value: over[1], name: '80-89'},
                {value: over[2], name: '70-79'},
                {value: over[3], name: '60-69'},
                {value: over[4], name: '50-59'},
                {value: over[5], name: '40-49'},
                {value: over[6], name: '30-39'},
                {value: over[7], name: '20-29'},
				{value: over[8], name: '10-19'},
				{value: over[9], name: '0-9'}
            ]
        }
    ]
};

option2 && myChart2.setOption(option2);

}


</script>
<div id='bar_graph' class='chart' ></div>
<br>
<div id='pie_graph' class='chart' ></div>
</body>
</html>