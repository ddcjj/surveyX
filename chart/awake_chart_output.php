<?php
require_once "surveyx_questionnaire_db.php";

$sql = "SELECT column_name FROM information_schema.columns 
    WHERE table_schema = 'surveyx_questionnaire' AND table_name = 'awake_q';";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_row($result)) {
    $col_name[] = $row[0];
}
// q1 START
$sql_q1 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q1 .= ',count(if ('.$col_name[$i+1].'='.$i.',true,null))';
}
$sql_q1 .= ' from awake_q;';
$result_q1 = mysqli_query($con, $sql_q1);
$row_q1 = mysqli_fetch_row($result_q1);
// q1 END
// q2 START
$sql_q2 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q2 .= ',count(if ('.$col_name[8].'='.$i.',true,null))';
}
$sql_q2 .= ' from awake_q;';
$result_q2 = mysqli_query($con, $sql_q2);
$row_q2 = mysqli_fetch_row($result_q2);
// q2 END
// q3 START
$sql_q3 = 'select count('.$col_name[0].')';
for($i=1; $i<=7; $i+=1) {
    $sql_q3 .= ',count(if ('.$col_name[$i+8].'='.$i.',true,null))';
}
$sql_q3 .= ' from awake_q;';
$result_q3 = mysqli_query($con, $sql_q3);
$row_q3 = mysqli_fetch_row($result_q3);
// q3 END
// q4 START
$sql_q4 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q4 .= ',count(if ('.$col_name[16].'='.$i.',true,null))';
}
$sql_q4 .= ' from awake_q;';
$result_q4 = mysqli_query($con, $sql_q4);
$row_q4 = mysqli_fetch_row($result_q4);
// q4 END
// q5 START
$sql_q5 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q5 .= ',count(if ('.$col_name[17].'='.$i.',true,null))';
}
$sql_q5 .= ' from awake_q;';
$result_q5 = mysqli_query($con, $sql_q5);
$row_q5 = mysqli_fetch_row($result_q5);
// q5 END
// q6 START
$sql_q6 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q6 .= ',count(if ('.$col_name[18].'='.$i.',true,null))';
}
$sql_q6 .= ' from awake_q;';
$result_q6 = mysqli_query($con, $sql_q6);
$row_q6 = mysqli_fetch_row($result_q6);
// q6 END
// q7 START
$sql_q7 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q7 .= ',count(if ('.$col_name[19].'='.$i.',true,null))';
}
$sql_q7 .= ' from awake_q;';
$result_q7 = mysqli_query($con, $sql_q7);
$row_q7 = mysqli_fetch_row($result_q7);
// q7 END
// q8 START
$sql_q8 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q8 .= ',count(if ('.$col_name[20].'='.$i.',true,null))';
}
$sql_q8 .= ' from awake_q;';
$result_q8 = mysqli_query($con, $sql_q8);
$row_q8 = mysqli_fetch_row($result_q8);
// q8 END
?>
<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>SurveyX</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="Shortcut Icon" type="../image/x-icon" href="../images/webicon.png" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload" style="background-color: white;">
        <!-- Header -->
        <header id="header">
            <a href="../index.html" class="title">SurveyX</a>
            <nav>
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../project_manage.php">專案管理</a></li>
                    <li><a href="../member.php" class="active">會員資料</a></li>
                </ul>
            </nav>
        </header>
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="js/echarts.js"></script>

        <div style="display:flex;justify-content:center;">
            <h2 style="color:black;">問卷總數：<?php echo $row_q1[0]; ?></h2>
        </div>

        <div id="container1" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container1");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {  
                        type: 'shadow'
                    }
                },
                title: {
                    text: '炎熱的夏季又要來了！你家的涼被也有以下狀況嗎？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['說透氣一點...','不抗菌防螨...','質地太粗糙...','過於輕薄沒...','只能單一季...','不保暖，每...'],
                    axisTick: {
                        alignWithLabel: true
                    }
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: <?php echo json_encode(array_splice($row_q1, 1)); ?>,
                    type: 'bar'
                }]
            };
            option && myChart.setOption(option);
        </script>
        <div id="container2" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container2");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                title: {
                    text: '在汰換新的涼被時，您一定聽過【Tencel】莫代爾天絲，但您有聽過咕溜的膠原蛋白絲嗎？',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [
                    {
                        type: 'pie',
                        radius: '50%',
                        data: [
                            {value: <?php echo $row_q2[1] ?>, name: '我聽過'},
                            {value: <?php echo $row_q2[2] ?>, name: '沒聽過'},
                            {value: <?php echo $row_q2[3] ?>, name: '沒興趣了解'}
                        ],
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            if (option && typeof option === "object") {
                var startTime = +new Date();
                myChart.setOption(option, true);
                var endTime = +new Date();
                var updateTime = endTime - startTime;
                console.log("Time used:", updateTime);
            }
        </script>
        <div id="container3" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container3");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {  
                        type: 'shadow'
                    }
                },
                title: {
                    text: '膠原蛋白絲與恆溫100%石墨烯搭在一起的【咕溜被】具有以下特點，哪些最吸引你呢？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['瞬涼又消臭...','超強抗菌率...','把你的皮膚...','只有1.8公斤...','兩用被設計...','低溫遠紅外...','超耐洗，紗...']
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: <?php echo json_encode(array_splice($row_q3, 1)); ?>,
                    type: 'bar'
                }]
            };
            if (option && typeof option === "object") {
                var startTime = +new Date();
                myChart.setOption(option, true);
                var endTime = +new Date();
                var updateTime = endTime - startTime;
                console.log("Time used:", updateTime);
            }
        </script>
        <div id="container4" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                title: {
                    text: '這樣一條咕溜、親膚、可隨著四季變換溫度的神奇兩用小被被，心中理想的價格會是？',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [
                    {
                        type: 'pie',
                        radius: '50%',
                        data: [
                            {value: <?php echo $row_q4[1] ?>, name: '2,580~2,780'},
                            {value: <?php echo $row_q4[2] ?>, name: '2,980~3,180'},
                            {value: <?php echo $row_q4[3] ?>, name: '3,380~3,580'},
                            {value: <?php echo $row_q4[4] ?>, name: '3,780~3,980'}
                        ],
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            if (option && typeof option === "object") {
                var startTime = +new Date();
                myChart.setOption(option, true);
                var endTime = +new Date();
                var updateTime = endTime - startTime;
                console.log("Time used:", updateTime);
            }
        </script>
        <div id="container5" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container5");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                title: {
                    text: '請問如果有額外折扣，你希望一次購買幾入呢？',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [
                    {
                        type: 'pie',
                        radius: '50%',
                        data: [
                            {value: <?php echo $row_q5[1] ?>, name: '一入，自己...'},
                            {value: <?php echo $row_q5[2] ?>, name: '兩入，小家...'},
                            {value: <?php echo $row_q5[3] ?>, name: '四入，全家...'},
                            {value: <?php echo $row_q5[4] ?>, name: '八入，大家...'},
                            {value: <?php echo $row_q5[5] ?>, name: '不會購買'}
                        ],
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            if (option && typeof option === "object") {
                var startTime = +new Date();
                myChart.setOption(option, true);
                var endTime = +new Date();
                var updateTime = endTime - startTime;
                console.log("Time used:", updateTime);
            }
        </script>
        <div id="container6" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container6");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                title: {
                    text: '請問您知道【微波被】嗎？',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [
                    {
                        type: 'pie',
                        radius: '50%',
                        data: [
                            {value: <?php echo $row_q6[1] ?>, name: '知道！我也...'},
                            {value: <?php echo $row_q6[2] ?>, name: '知道！我沒...'},
                            {value: <?php echo $row_q6[3] ?>, name: '知道，但我...'},
                            {value: <?php echo $row_q6[4] ?>, name: '不知道，只...'}
                        ],
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            if (option && typeof option === "object") {
                var startTime = +new Date();
                myChart.setOption(option, true);
                var endTime = +new Date();
                var updateTime = endTime - startTime;
                console.log("Time used:", updateTime);
            }
        </script>
        <div id="container7" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container7");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                title: {
                    text: '請問您的性別是？',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [
                    {
                        type: 'pie',
                        radius: '50%',
                        data: [
                            {value: <?php echo $row_q7[1] ?>, name: '男性'},
                            {value: <?php echo $row_q7[2] ?>, name: '女性'},
                            {value: <?php echo $row_q7[3] ?>, name: '多元性別'}
                        ],
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            if (option && typeof option === "object") {
                var startTime = +new Date();
                myChart.setOption(option, true);
                var endTime = +new Date();
                var updateTime = endTime - startTime;
                console.log("Time used:", updateTime);
            }
        </script>
        <div id="container8" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container8");
            var myChart = echarts.init(dom);
            var app = {};
            option = null;
            option = {
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                title: {
                    text: '請問您的年齡區間？',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                },
                series: [
                    {
                        type: 'pie',
                        radius: '50%',
                        data: [
                            {value: <?php echo $row_q8[1] ?>, name: '18歲以下'},
                            {value: <?php echo $row_q8[2] ?>, name: '19-24歲'},
                            {value: <?php echo $row_q8[3] ?>, name: '25-30歲'},
                            {value: <?php echo $row_q8[4] ?>, name: '31-40歲'},
                            {value: <?php echo $row_q8[5] ?>, name: '41-50歲'},
                            {value: <?php echo $row_q8[6] ?>, name: '51歲以上'}
                        ],
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            if (option && typeof option === "object") {
                var startTime = +new Date();
                myChart.setOption(option, true);
                var endTime = +new Date();
                var updateTime = endTime - startTime;
                console.log("Time used:", updateTime);
            }
        </script>
        <div style="display: flex;justify-content: center;margin-bottom: 30px;">
            <a href="awake_csv.php" 
                style="background-color: #27f3d6; height: 30px;
                    width: 120px; border-radius: 20px; color: white;
                    text-align: center;" target="_blank">匯出CSV</a>
        </div>
    </body>
</html>