<?php
require_once "surveyx_questionnaire_db.php";

$sql = "SELECT column_name FROM information_schema.columns 
    WHERE table_schema = 'surveyx_questionnaire' AND table_name = 'necfree_q';";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_row($result)) {
    $col_name[] = $row[0];
}
// q1 START
$sql_q1 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q1 .= ',count(if ('.$col_name[2].'='.$i.',true,null))';
}
$sql_q1 .= ' from necfree_q;';
$result_q1 = mysqli_query($con, $sql_q1);
$row_q1 = mysqli_fetch_row($result_q1);
// q1 END

// q2 START
$sql_q2 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q2 .= ',count(if ('.$col_name[$i+2].'='.$i.',true,null))';
}
$sql_q2 .= ' from necfree_q;';
$result_q2 = mysqli_query($con, $sql_q2);
$row_q2 = mysqli_fetch_row($result_q2);
// q2 END

// q3 START
$sql_q3 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q3 .= ',count(if ('.$col_name[$i+6].'='.$i.',true,null))';
}
$sql_q3 .= ' from necfree_q;';
$result_q3 = mysqli_query($con, $sql_q3);
$row_q3 = mysqli_fetch_row($result_q3);
// q3 END

// q4 START
$sql_q4 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q4 .= ',count(if ('.$col_name[$i+13].'='.$i.',true,null))';
}
$sql_q4 .= ' from necfree_q;';
$result_q4 = mysqli_query($con, $sql_q4);
$row_q4 = mysqli_fetch_row($result_q4);
// q4 END

// q5 START
$sql_q5 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q5 .= ',count(if ('.$col_name[20].'='.$i.',true,null))';
}
$sql_q5 .= ' from necfree_q;';
$result_q5 = mysqli_query($con, $sql_q5);
$row_q5 = mysqli_fetch_row($result_q5);
// q5 END

// q6 START
$sql_q6 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q6 .= ',count(if ('.$col_name[21].'='.$i.',true,null))';
}
$sql_q6 .= ' from necfree_q;';
$result_q6 = mysqli_query($con, $sql_q6);
$row_q6 = mysqli_fetch_row($result_q6);
// q6 END

// q7 START
$sql_q7 = 'select count('.$col_name[0].')';
for($i=1; $i<=7; $i+=1) {
    $sql_q7 .= ',count(if ('.$col_name[$i+21].'='.$i.',true,null))';
}
$sql_q7 .= ' from necfree_q;';
$result_q7 = mysqli_query($con, $sql_q7);
$row_q7 = mysqli_fetch_row($result_q7);
// q7 END

// q8 START
$sql_q8 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q8 .= ',count(if ('.$col_name[$i+28].'='.$i.',true,null))';
}
$sql_q8 .= ' from necfree_q;';
$result_q8 = mysqli_query($con, $sql_q8);
$row_q8 = mysqli_fetch_row($result_q8);
// q8 END

// q9 START
$sql_q9 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q9 .= ',count(if ('.$col_name[34].'='.$i.',true,null))';
}
$sql_q9 .= ' from necfree_q;';
$result_q9 = mysqli_query($con, $sql_q9);
$row_q9 = mysqli_fetch_row($result_q9);
// q9 END

// q10 START
$sql_q10 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q10 .= ',count(if ('.$col_name[35].'='.$i.',true,null))';
}
$sql_q10 .= ' from necfree_q;';
$result_q10 = mysqli_query($con, $sql_q10);
$row_q10 = mysqli_fetch_row($result_q10);
// q10 END
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
        //單選
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
                title: {
                    text: '您是否曾經長途駕駛時有過肩頸痠痛經驗或無法好好睡覺？',
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
                            {value: <?php echo $row_q1[1] ?>, name: '有，我很常...'},
                            {value: <?php echo $row_q1[2] ?>, name: '有，我很難...'},
                            {value: <?php echo $row_q1[3] ?>, name: '沒有，可是...'},
                            {value: <?php echo $row_q1[4] ?>, name: '沒有太大的...'}
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

        <div id="container2" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
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
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {  
                        type: 'shadow'
                    }
                },
                title: {
                    text: '您是否曾經購買過車枕？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['是','否','給駕駛用','給乘客'],
                    axisTick: {
                        alignWithLabel: true
                    }
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: <?php echo json_encode(array_splice($row_q2, 1)); ?>,
                    type: 'bar'
                }]
            };
            option && myChart.setOption(option);
        </script>

        <div id="container3" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container3");
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
                    text: '車枕曾帶給您什麼困擾？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['太軟缺乏支...','太硬不合脖...','悶熱不通氣...','面料差，肌...', '會上下移動...', '其他'],
                    axisTick: {
                        alignWithLabel: true
                    }
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: <?php echo json_encode(array_splice($row_q3, 1)); ?>,
                    type: 'bar'
                }]
            };
            option && myChart.setOption(option);
        </script>

        <div id="container4" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
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
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {  
                        type: 'shadow'
                    }
                },
                title: {
                    text: '［頸站頂天車枕］的設計，以下哪些特點是您喜歡的呢？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['專利⽀撐設...','義大利豪華...','專利弧度設...','專利可拆式...','頂級止滑皮...','高彈力枕頭...'],
                    axisTick: {
                        alignWithLabel: true
                    }
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: <?php echo json_encode(array_splice($row_q4, 1)); ?>,
                    type: 'bar'
                }]
            };
            option && myChart.setOption(option);
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
                    text: '這個一路幫您撐著頭部的漂浮車枕，將推出黑色、藏青色兩款，嘖嘖預購58折！價錢只要$3480，定價$6000，買一顆立馬省下$2520。請問您願意贊助［頸站頂天車枕］嗎？',
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
                            {value: <?php echo $row_q5[1] ?>, name: '超級⼼動！...'},
                            {value: <?php echo $row_q5[2] ?>, name: '讓我考慮下...'},
                            {value: <?php echo $row_q5[3] ?>, name: '暫時不會想...'}
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
                    text: '讓您想購買的最大原因為何？',
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
                            {value: <?php echo $row_q6[1] ?>, name: '買給駕駛者'},
                            {value: <?php echo $row_q6[2] ?>, name: '買給乘客'},
                            {value: <?php echo $row_q6[3] ?>, name: '都買'}
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

        <div id="container7" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
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
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {  
                        type: 'shadow'
                    }
                },
                title: {
                    text: '會讓您考慮再三的原因為何？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['價格太貴','泡綿太硬','不能⽔洗','⽪料太好','⽪料太差','顏色不滿意','安全考量'],
                    axisTick: {
                        alignWithLabel: true
                    }
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: <?php echo json_encode(array_splice($row_q7, 1)); ?>,
                    type: 'bar'
                }]
            };
            option && myChart.setOption(option);
        </script>

        <div id="container8" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
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
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {  
                        type: 'shadow'
                    }
                },
                title: {
                    text: '請問如果有額外折扣，您希望⼀次購買幾入呢？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['⼀入，⾃⼰...','兩入，⼩家...','四入，全家...','10入，好...','20入，車...'],
                    axisTick: {
                        alignWithLabel: true
                    }
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    data: <?php echo json_encode(array_splice($row_q8, 1)); ?>,
                    type: 'bar'
                }]
            };
            option && myChart.setOption(option);
        </script>

        <div id="container9" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container9");
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
                            {value: <?php echo $row_q9[1] ?>, name: '男性'},
                            {value: <?php echo $row_q9[2] ?>, name: '女性'},
                            {value: <?php echo $row_q9[3] ?>, name: '多元性別'}
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

        <div id="container10" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container10");
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
                            {value: <?php echo $row_q10[1] ?>, name: '18歲以下'},
                            {value: <?php echo $row_q10[2] ?>, name: '19-24歲'},
                            {value: <?php echo $row_q10[3] ?>, name: '25-30歲'},
                            {value: <?php echo $row_q10[4] ?>, name: '31-40歲'},
                            {value: <?php echo $row_q10[5] ?>, name: '41-50歲'},
                            {value: <?php echo $row_q10[6] ?>, name: '51歲以上'}
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
            <a href="necfree_csv.php" 
                style="background-color: #27f3d6; height: 30px;
                    width: 120px; border-radius: 20px; color: white;
                    text-align: center;" target="_blank">匯出CSV</a>
        </div>
    </body>
</html>