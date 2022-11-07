<?php
require_once "surveyx_questionnaire_db.php";

$sql = "SELECT column_name FROM information_schema.columns 
    WHERE table_schema = 'surveyx_questionnaire' AND table_name = 'rexin_q';";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_row($result)) {
    $col_name[] = $row[0];
}
// q1 START
$sql_q1 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q1 .= ',count(if ('.$col_name[2].'='.$i.',true,null))';
}
$sql_q1 .= ' from rexin_q;';
$result_q1 = mysqli_query($con, $sql_q1);
$row_q1 = mysqli_fetch_row($result_q1);
// q1 END

// q2 START
$sql_q2 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q2 .= ',count(if ('.$col_name[$i+2].'='.$i.',true,null))';
}
$sql_q2 .= ' from rexin_q;';
$result_q2 = mysqli_query($con, $sql_q2);
$row_q2 = mysqli_fetch_row($result_q2);
// q2 END

// q3 START
$sql_q3 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q3 .= ',count(if ('.$col_name[9].'='.$i.',true,null))';
}
$sql_q3 .= ' from rexin_q;';
$result_q3 = mysqli_query($con, $sql_q3);
$row_q3 = mysqli_fetch_row($result_q3);
// q3 END

// q4 START
$sql_q4 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q4 .= ',count(if ('.$col_name[$i+9].'='.$i.',true,null))';
}
$sql_q4 .= ' from rexin_q;';
$result_q4 = mysqli_query($con, $sql_q4);
$row_q4 = mysqli_fetch_row($result_q4);
// q4 END

// q5 START
$sql_q5 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q5 .= ',count(if ('.$col_name[16].'='.$i.',true,null))';
}
$sql_q5 .= ' from rexin_q;';
$result_q5 = mysqli_query($con, $sql_q5);
$row_q5 = mysqli_fetch_row($result_q5);
// q5 END

// q6 START
$sql_q6 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q6 .= ',count(if ('.$col_name[17].'='.$i.',true,null))';
}
$sql_q6 .= ' from rexin_q;';
$result_q6 = mysqli_query($con, $sql_q6);
$row_q6 = mysqli_fetch_row($result_q6);
// q6 END

// q7 START
$sql_q7 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q7 .= ',count(if ('.$col_name[18].'='.$i.',true,null))';
}
$sql_q7 .= ' from rexin_q;';
$result_q7 = mysqli_query($con, $sql_q7);
$row_q7 = mysqli_fetch_row($result_q7);
// q7 END

// q8 START
$sql_q8 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q8 .= ',count(if ('.$col_name[19].'='.$i.',true,null))';
}
$sql_q8 .= ' from rexin_q;';
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
                    text: '您是否會在意耳機的外觀呢？',
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
                            {value: <?php echo $row_q1[1] ?>, name: '會，我認為...'},
                            {value: <?php echo $row_q1[2] ?>, name: '會，但只要...'},
                            {value: <?php echo $row_q1[3] ?>, name: '會，我希望...'},
                            {value: <?php echo $row_q1[4] ?>, name: '不會，我只...'},
                            {value: <?php echo $row_q1[5] ?>, name: '不會，連線...'}
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
                    text: '您目前在藍芽耳機的使用上有沒有遇到以下問題？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['挑到外型與...','使用大約1...','耳機的樣式','都是塑膠外','其他'],
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

        <div id="container4" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
        //單選
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
                    text: '以往使用藍芽耳機的經驗裡，會有戴不好的困擾嗎？有興趣體驗可以舒服配戴的「REXIN only」嗎？',
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
                            {value: <?php echo $row_q3[1] ?>, name: '我有耳機戴不好的困擾，值得體驗'},
                            {value: <?php echo $row_q3[2] ?>, name: '我沒有這樣的困擾，但對這個服務有興趣了解'},
                            {value: <?php echo $row_q3[3] ?>, name: '我有耳機戴不好的困擾，但已經找到適合的耳機'},
                            {value: <?php echo $row_q3[4] ?>, name: '我沒有這樣的困擾，對這個服務也沒有興趣'}
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

        <div id="container3" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
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
                    text: 'REXIN only有別於目前市面上藍芽耳機的特色中，哪幾項吸引您呢？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['富有藝術感...','可隨喜好更','手工縫製、...','多角度試戴...','皮革外盒與...','電池終身保...'],
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
                    text: '植鞣革外盒、可換的漂亮飾板、類客製服務這樣具有職人精神的藍芽耳機，在您心中理想的價格是？',
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
                            {value: <?php echo $row_q5[1] ?>, name: '2600 ...'},
                            {value: <?php echo $row_q5[2] ?>, name: '2800 ...'},
                            {value: <?php echo $row_q5[3] ?>, name: '3000 ...'},
                            {value: <?php echo $row_q5[4] ?>, name: '3200 ...'}
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
                    text: '如果單獨購買不同樣式、不同設計師的可換飾板的價格是$300的話，您會願意額外搭配幾對飾板？',
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
                            {value: <?php echo $row_q6[1] ?>, name: '0'},
                            {value: <?php echo $row_q6[2] ?>, name: '1'},
                            {value: <?php echo $row_q6[3] ?>, name: '2'},
                            {value: <?php echo $row_q6[4] ?>, name: '3'},
                            {value: <?php echo $row_q6[5] ?>, name: '4'},
                            {value: <?php echo $row_q6[6] ?>, name: '5對以上'}
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
            <a href="rexin_csv.php" 
                style="background-color: #27f3d6; height: 30px;
                    width: 120px; border-radius: 20px; color: white;
                    text-align: center;" target="_blank">匯出CSV</a>
        </div>
    </body>
</html>