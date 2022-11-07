<?php
require_once "surveyx_questionnaire_db.php";

$sql = "SELECT column_name FROM information_schema.columns 
    WHERE table_schema = 'surveyx_questionnaire' AND table_name = 'gogosong_q';";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_row($result)) {
    $col_name[] = $row[0];
}
// q1 START
$sql_q1 = 'select count('.$col_name[0].')';
for($i=1; $i<=7; $i+=1) {
    $sql_q1 .= ',count(if ('.$col_name[$i+1].'='.$i.',true,null))';
}
$sql_q1 .= ' from gogosong_q;';
$result_q1 = mysqli_query($con, $sql_q1);
$row_q1 = mysqli_fetch_row($result_q1);
// q1 END

// q2 START
$sql_q2 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q2 .= ',count(if ('.$col_name[$i+8].'='.$i.',true,null))';
}
$sql_q2 .= ' from gogosong_q;';
$result_q2 = mysqli_query($con, $sql_q2);
$row_q2 = mysqli_fetch_row($result_q2);
// q2 END

// q3 START
$sql_q3 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q3 .= ',count(if ('.$col_name[$i+14].'='.$i.',true,null))';
}
$sql_q3 .= ' from gogosong_q;';
$result_q3 = mysqli_query($con, $sql_q3);
$row_q3 = mysqli_fetch_row($result_q3);
// q3 END

// q4 START
$sql_q4_1 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q4_1 .= ',count(if ('.$col_name[20].'='.$i.',true,null))';
}
$sql_q4_1 .= ' from gogosong_q;';
$result_q4_1 = mysqli_query($con, $sql_q4_1);
$row_q4_1 = mysqli_fetch_row($result_q4_1);

$sql_q4_2 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q4_2 .= ',count(if ('.$col_name[21].'='.$i.',true,null))';
}
$sql_q4_2 .= ' from gogosong_q;';
$result_q4_2 = mysqli_query($con, $sql_q4_2);
$row_q4_2 = mysqli_fetch_row($result_q4_2);

$sql_q4_3 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q4_3 .= ',count(if ('.$col_name[22].'='.$i.',true,null))';
}
$sql_q4_3 .= ' from gogosong_q;';
$result_q4_3 = mysqli_query($con, $sql_q4_3);
$row_q4_3 = mysqli_fetch_row($result_q4_3);

$sql_q4_4 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q4_4 .= ',count(if ('.$col_name[23].'='.$i.',true,null))';
}
$sql_q4_4 .= ' from gogosong_q;';
$result_q4_4 = mysqli_query($con, $sql_q4_4);
$row_q4_4 = mysqli_fetch_row($result_q4_4);

$sql_q4_5 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q4_5 .= ',count(if ('.$col_name[24].'='.$i.',true,null))';
}
$sql_q4_5 .= ' from gogosong_q;';
$result_q4_5 = mysqli_query($con, $sql_q4_5);
$row_q4_5 = mysqli_fetch_row($result_q4_5);

$sql_q4_6 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q4_6 .= ',count(if ('.$col_name[25].'='.$i.',true,null))';
}
$sql_q4_6 .= ' from gogosong_q;';
$result_q4_6 = mysqli_query($con, $sql_q4_6);
$row_q4_6 = mysqli_fetch_row($result_q4_6);

$sql_q4_7 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q4_7 .= ',count(if ('.$col_name[26].'='.$i.',true,null))';
}
$sql_q4_7 .= ' from gogosong_q;';
$result_q4_7 = mysqli_query($con, $sql_q4_7);
$row_q4_7 = mysqli_fetch_row($result_q4_7);
// q4 END

// q5 START
$sql_q5 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q5 .= ',count(if ('.$col_name[27].'='.$i.',true,null))';
}
$sql_q5 .= ' from gogosong_q;';
$result_q5 = mysqli_query($con, $sql_q5);
$row_q5 = mysqli_fetch_row($result_q5);
// q5 END

// q6 START
$sql_q6 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q6 .= ',count(if ('.$col_name[28].'='.$i.',true,null))';
}
$sql_q6 .= ' from gogosong_q;';
$result_q6 = mysqli_query($con, $sql_q6);
$row_q6 = mysqli_fetch_row($result_q6);
// q6 END

// q7 START
$sql_q7 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q7 .= ',count(if ('.$col_name[29].'='.$i.',true,null))';
}
$sql_q7 .= ' from gogosong_q;';
$result_q7 = mysqli_query($con, $sql_q7);
$row_q7 = mysqli_fetch_row($result_q7);
// q7 END

// q8 START
$sql_q8 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q8 .= ',count(if ('.$col_name[30].'='.$i.',true,null))';
}
$sql_q8 .= ' from gogosong_q;';
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
                    text: '根據法蘭克福大學進行的研究，唱歌可以增強免疫系統！請問您平常會在哪邊唱歌呢？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['公園','KTV','浴室','小巨蛋','陽台','客廳','平常沒有唱...'],
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
                    text: '想外出唱歌時是否有遇到‧‧‧？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['人太多訂不...','煙味太重','揪不到人','環境出入複...','遇到疫情在...','歌單限制...'],
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
                    text: '在使用現有的無線麥克風/伴唱點歌機中，會遇到的問題是？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['歌單太舊','平常沒有在...','設備金額門...','設備不通用...','音響設備對...'],
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

        <div id="container4_1" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4_1");
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
                    text: '台灣設計MIT生產製造',
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
                            {value: <?php echo $row_q4_1[1] ?>, name: '1'},
                            {value: <?php echo $row_q4_1[2] ?>, name: '2'},
                            {value: <?php echo $row_q4_1[3] ?>, name: '3'},
                            {value: <?php echo $row_q4_1[4] ?>, name: '4'},
                            {value: <?php echo $row_q4_1[5] ?>, name: '5'}
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
        <div id="container4_2" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4_2");
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
                    text: '可消除原唱人聲',
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
                            {value: <?php echo $row_q4_2[1] ?>, name: '1'},
                            {value: <?php echo $row_q4_2[2] ?>, name: '2'},
                            {value: <?php echo $row_q4_2[3] ?>, name: '3'},
                            {value: <?php echo $row_q4_2[4] ?>, name: '4'},
                            {value: <?php echo $row_q4_2[5] ?>, name: '5'}
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
        <div id="container4_3" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4_3");
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
                    text: '兩隻連線多唱',
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
                            {value: <?php echo $row_q4_3[1] ?>, name: '1'},
                            {value: <?php echo $row_q4_3[2] ?>, name: '2'},
                            {value: <?php echo $row_q4_3[3] ?>, name: '3'},
                            {value: <?php echo $row_q4_3[4] ?>, name: '4'},
                            {value: <?php echo $row_q4_3[5] ?>, name: '5'}
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
        <div id="container4_4" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4_4");
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
                    text: '售後服務完整',
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
                            {value: <?php echo $row_q4_4[1] ?>, name: '1'},
                            {value: <?php echo $row_q4_4[2] ?>, name: '2'},
                            {value: <?php echo $row_q4_4[3] ?>, name: '3'},
                            {value: <?php echo $row_q4_4[4] ?>, name: '4'},
                            {value: <?php echo $row_q4_4[5] ?>, name: '5'}
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
        <div id="container4_5" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4_5");
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
                    text: '效果功能(ex升降KEY/迴音)',
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
                            {value: <?php echo $row_q4_5[1] ?>, name: '1'},
                            {value: <?php echo $row_q4_5[2] ?>, name: '2'},
                            {value: <?php echo $row_q4_5[3] ?>, name: '3'},
                            {value: <?php echo $row_q4_5[4] ?>, name: '4'},
                            {value: <?php echo $row_q4_5[5] ?>, name: '5'}
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
        <div id="container4_6" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4_6");
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
                    text: '麥克風/喇叭音質',
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
                            {value: <?php echo $row_q4_6[1] ?>, name: '1'},
                            {value: <?php echo $row_q4_6[2] ?>, name: '2'},
                            {value: <?php echo $row_q4_6[3] ?>, name: '3'},
                            {value: <?php echo $row_q4_6[4] ?>, name: '4'},
                            {value: <?php echo $row_q4_6[5] ?>, name: '5'}
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
        <div id="container4_7" style="height: 500px;width: 1000px;margin: 0 auto;"></div>
        <script type="text/javascript">
            var dom = document.getElementById("container4_7");
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
                    text: '車用連結',
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
                            {value: <?php echo $row_q4_7[1] ?>, name: '1'},
                            {value: <?php echo $row_q4_7[2] ?>, name: '2'},
                            {value: <?php echo $row_q4_7[3] ?>, name: '3'},
                            {value: <?php echo $row_q4_7[4] ?>, name: '4'},
                            {value: <?php echo $row_q4_7[5] ?>, name: '5'}
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
                    text: '這樣一支高音質、方便攜帶、造型好看的神奇無線麥克風，您心中理想的價位是？',
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
                            {value: <?php echo $row_q5[1] ?>, name: '4500-5500'},
                            {value: <?php echo $row_q5[2] ?>, name: '5500-6500'},
                            {value: <?php echo $row_q5[3] ?>, name: '6500以上'}
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
                    text: 'Gogosong提供多種外觀選擇！您最想要入手哪種顏設？',
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
                            {value: <?php echo $row_q6[1] ?>, name: '嘹亮白'},
                            {value: <?php echo $row_q6[2] ?>, name: '甜美粉'},
                            {value: <?php echo $row_q6[3] ?>, name: '空靈綠'},
                            {value: <?php echo $row_q6[4] ?>, name: '其他'}
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
        <!-- <div style="display: flex;justify-content: center;margin-bottom: 30px;">
            <a href="awake_csv.php" 
                style="background-color: #27f3d6; height: 30px;
                    width: 120px; border-radius: 20px; color: white;
                    text-align: center;" target="_blank">匯出CSV</a>
        </div> -->
    </body>
</html>