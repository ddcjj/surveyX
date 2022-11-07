<?php
require_once "surveyx_questionnaire_db.php";

$sql = "SELECT column_name FROM information_schema.columns 
    WHERE table_schema = 'surveyx_questionnaire' AND table_name = 'brondell_q';";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_row($result)) {
    $col_name[] = $row[0];
}
// q1 START
$sql_q1 = 'select count('.$col_name[0].')';
for($i=1; $i<=7; $i+=1) {
    $sql_q1 .= ',count(if ('.$col_name[1+$i].'='.$i.',true,null))';
}
$sql_q1 .= ' from brondell_q;';
$result_q1 = mysqli_query($con, $sql_q1);
$row_q1 = mysqli_fetch_row($result_q1);
// q1 END

// q2 START
$sql_q2 = 'select count('.$col_name[0].')';
for($i=1; $i<=7; $i+=1) {
    $sql_q2 .= ',count(if ('.$col_name[$i+8].'='.$i.',true,null))';
}
$sql_q2 .= ' from brondell_q;';
$result_q2 = mysqli_query($con, $sql_q2);
$row_q2 = mysqli_fetch_row($result_q2);
// q2 END

// q3 START
$sql_q3 = 'select count('.$col_name[0].')';
for($i=1; $i<=8; $i+=1) {
    $sql_q3 .= ',count(if ('.$col_name[$i+15].'='.$i.',true,null))';
}
$sql_q3 .= ' from brondell_q;';
$result_q3 = mysqli_query($con, $sql_q3);
$row_q3 = mysqli_fetch_row($result_q3);
// q3 END

// q4 START
$sql_q4 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q4 .= ',count(if ('.$col_name[24].'='.$i.',true,null))';
}
$sql_q4 .= ' from brondell_q;';
$result_q4 = mysqli_query($con, $sql_q4);
$row_q4 = mysqli_fetch_row($result_q4);
// q4 END

// q5 START
$sql_q5 = 'select count('.$col_name[0].')';
for($i=1; $i<=10; $i+=1) {
    $sql_q5 .= ',count(if ('.$col_name[25].'='.$i.',true,null))';
}
$sql_q5 .= ' from brondell_q;';
$result_q5 = mysqli_query($con, $sql_q5);
$row_q5 = mysqli_fetch_row($result_q5);
// q5 END

// q6 START
$sql_q6 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q6 .= ',count(if ('.$col_name[26].'='.$i.',true,null))';
}
$sql_q6 .= ' from brondell_q;';
$result_q6 = mysqli_query($con, $sql_q6);
$row_q6 = mysqli_fetch_row($result_q6);
// q6 END

// q7 START
$sql_q7 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q7 .= ',count(if ('.$col_name[27].'='.$i.',true,null))';
}
$sql_q7 .= ' from brondell_q;';
$result_q7 = mysqli_query($con, $sql_q7);
$row_q7 = mysqli_fetch_row($result_q7);
// q7 END
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
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {  
                        type: 'shadow'
                    }
                },
                title: {
                    text: '室內空汙是健康的隱形殺手，您在生活中是否會有以下困擾？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['一換季就過...','空氣清淨機...','外出擔心帶...','有家庭成員...','沒空定期清...','家具或裝修...','滿屋寵物異...'],
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

        <div id="container2" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
        <script type="text/javascript">
            //複選
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
                    text: '過去使用空氣清淨機，有遇過什麼問題嗎?',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['運轉時音量...','不知道過濾...','適用坪數不...','沒有除臭功...','無法去除甲...','無法濾除病...','從來沒使用...'],
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
                    text: 'Brondell抗敏濾菌空氣淨化器，下列哪些特色功能較吸引您?',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['美國True...','「天然椰殼...','「智能離子...','冷觸媒自動...','定時器及靜...','有效覆蓋面...','兩年產品保...','美國 ETL...'],
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
                    text: '您願意花多少金額，入手一台Brondell抗敏濾菌空氣淨化器？',
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
                            {value: <?php echo $row_q4[1] ?>, name: '6000 - 7000'},
                            {value: <?php echo $row_q4[2] ?>, name: '7000 - 8000'},
                            {value: <?php echo $row_q4[3] ?>, name: '8000 - 9000'},
                            {value: <?php echo $row_q4[4] ?>, name: '9000以上'}
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
                    text: '請問您願意贊助的意願（滿分10分）',
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
                            {value: <?php echo $row_q5[1] ?>, name: '1'},
                            {value: <?php echo $row_q5[2] ?>, name: '2'},
                            {value: <?php echo $row_q5[3] ?>, name: '3'},
                            {value: <?php echo $row_q5[4] ?>, name: '4'},
                            {value: <?php echo $row_q5[5] ?>, name: '5'},
                            {value: <?php echo $row_q5[6] ?>, name: '6'},
                            {value: <?php echo $row_q5[7] ?>, name: '7'},
                            {value: <?php echo $row_q5[8] ?>, name: '8'},
                            {value: <?php echo $row_q5[9] ?>, name: '9'},
                            {value: <?php echo $row_q5[10] ?>, name: '10'}
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
                            {value: <?php echo $row_q6[1] ?>, name: '男性'},
                            {value: <?php echo $row_q6[2] ?>, name: '女性'},
                            {value: <?php echo $row_q6[3] ?>, name: '多元性別'}
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
                            {value: <?php echo $row_q7[1] ?>, name: '18歲以下'},
                            {value: <?php echo $row_q7[2] ?>, name: '19-24歲'},
                            {value: <?php echo $row_q7[3] ?>, name: '25-30歲'},
                            {value: <?php echo $row_q7[4] ?>, name: '31-40歲'},
                            {value: <?php echo $row_q7[5] ?>, name: '41-50歲'},
                            {value: <?php echo $row_q7[6] ?>, name: '51歲以上'}
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
            <a href="brondell_csv.php" 
                style="background-color: #27f3d6; height: 30px;
                    width: 120px; border-radius: 20px; color: white;
                    text-align: center;" target="_blank">匯出CSV</a>
        </div>
    </body>
</html>