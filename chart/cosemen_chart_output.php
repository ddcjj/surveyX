<?php
require_once "surveyx_questionnaire_db.php";

$sql = "SELECT column_name FROM information_schema.columns 
    WHERE table_schema = 'surveyx_questionnaire' AND table_name = 'cosemen_q';";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_row($result)) {
    $col_name[] = $row[0];
}
// q1 START
$sql_q1 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q1 .= ',count(if ('.$col_name[2].'='.$i.',true,null))';
}
$sql_q1 .= ' from cosemen_q;';
$result_q1 = mysqli_query($con, $sql_q1);
$row_q1 = mysqli_fetch_row($result_q1);
// q1 END

// q2 START
$sql_q2 = 'select count('.$col_name[0].')';
for($i=1; $i<=5; $i+=1) {
    $sql_q2 .= ',count(if ('.$col_name[3].'='.$i.',true,null))';
}
$sql_q2 .= ' from cosemen_q;';
$result_q2 = mysqli_query($con, $sql_q2);
$row_q2 = mysqli_fetch_row($result_q2);
// q2 END

// q3 START
$sql_q3 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q3 .= ',count(if ('.$col_name[$i+3].'='.$i.',true,null))';
}
$sql_q3 .= ' from cosemen_q;';
$result_q3 = mysqli_query($con, $sql_q3);
$row_q3 = mysqli_fetch_row($result_q3);
// q3 END

// q4 START
$sql_q4 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q4 .= ',count(if ('.$col_name[10].'='.$i.',true,null))';
}
$sql_q4 .= ' from cosemen_q;';
$result_q4 = mysqli_query($con, $sql_q4);
$row_q4 = mysqli_fetch_row($result_q4);
// q4 END

// q5 START
$sql_q5 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q5 .= ',count(if ('.$col_name[11].'='.$i.',true,null))';
}
$sql_q5 .= ' from cosemen_q;';
$result_q5 = mysqli_query($con, $sql_q5);
$row_q5 = mysqli_fetch_row($result_q5);
// q5 END

// q6 START
$sql_q6 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q6 .= ',count(if ('.$col_name[12].'='.$i.',true,null))';
}
$sql_q6 .= ' from cosemen_q;';
$result_q6 = mysqli_query($con, $sql_q6);
$row_q6 = mysqli_fetch_row($result_q6);
// q6 END

// q7 START
$sql_q7 = 'select count('.$col_name[0].')';
for($i=1; $i<=4; $i+=1) {
    $sql_q7 .= ',count(if ('.$col_name[13].'='.$i.',true,null))';
}
$sql_q7 .= ' from cosemen_q;';
$result_q7 = mysqli_query($con, $sql_q7);
$row_q7 = mysqli_fetch_row($result_q7);
// q7 END

// q8 START
$sql_q8 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q8 .= ',count(if ('.$col_name[14].'='.$i.',true,null))';
}
$sql_q8 .= ' from cosemen_q;';
$result_q8 = mysqli_query($con, $sql_q8);
$row_q8 = mysqli_fetch_row($result_q8);
// q8 END

// q8 START
$sql_q9 = 'select count('.$col_name[0].')';
for($i=1; $i<=6; $i+=1) {
    $sql_q9 .= ',count(if ('.$col_name[15].'='.$i.',true,null))';
}
$sql_q9 .= ' from cosemen_q;';
$result_q9 = mysqli_query($con, $sql_q9);
$row_q9 = mysqli_fetch_row($result_q9);
// q8 END

?>
<!DOCTYPE HTML>
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
            // 單選
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
                    text: '一樣米養百樣人，每個人都有自己的小癖好。您是否能接受NTR(戴綠帽)呢？',
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
                            {value: <?php echo $row_q1[1] ?>, name: '我最愛NT...'},
                            {value: <?php echo $row_q1[2] ?>, name: '沒到很愛但...'},
                            {value: <?php echo $row_q1[3] ?>, name: '無所謂，沒...'},
                            {value: <?php echo $row_q1[4] ?>, name: '不太能接受'},
                            {value: <?php echo $row_q1[5] ?>, name: '完全不行，...'}
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
            // 單選
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
                    text: '在玩一款成人向RPG的時候，您覺得遊戲性與色色內容的理想分配是？',
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
                            {value: <?php echo $row_q2[1] ?>, name: '我不需要成...'},
                            {value: <?php echo $row_q2[2] ?>, name: '遊戲性優先...'},
                            {value: <?php echo $row_q2[3] ?>, name: '一半一半，...'},
                            {value: <?php echo $row_q2[4] ?>, name: '成人要素優...'},
                            {value: <?php echo $row_q2[5] ?>, name: '好不好玩不...'}
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
                    text: '那個江湖是一款武俠風格成人RPG，各式內容豐富多趣，您最希望體驗到什麼樣的遊戲內容？',
                    left: 'center'
                },
                xAxis: {
                    type: 'category',
                    data: ['精彩的主線...','拜師、角色...','多樣的蒐集...','有趣的戰鬥...', '精心製作的...', '極其煽情的...'],
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
            // 單選
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
                    text: '在玩RPG的時候，您喜歡怎樣的遊戲系統跟戰鬥機制？',
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
                            {value: <?php echo $row_q4[1] ?>, name: '我最喜歡研...'},
                            {value: <?php echo $row_q4[2] ?>, name: '我喜歡複雜...'},
                            {value: <?php echo $row_q4[3] ?>, name: '我希望遊戲...'},
                            {value: <?php echo $row_q4[4] ?>, name: '越無腦越好...'}
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
            // 單選
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
                    text: '在遊玩一款成人向RPG時，您希望劇情規模應如何？',
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
                            {value: <?php echo $row_q5[1] ?>, name: '希望能像一...'},
                            {value: <?php echo $row_q5[2] ?>, name: '可以"用"...'},
                            {value: <?php echo $row_q5[3] ?>, name: '我來只是想...'}
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
                    text: '您喜歡下面哪個女角色？',
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
                            {value: <?php echo $row_q6[1] ?>, name: '綠涴歌：本...'},
                            {value: <?php echo $row_q6[2] ?>, name: '袁黎艾：王...'},
                            {value: <?php echo $row_q6[3] ?>, name: '我全都要'},
                            {value: <?php echo $row_q6[4] ?>, name: '都不是我的...'}
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
            // 單選
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
                    text: '您喜歡下面哪個男角色？',
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
                            {value: <?php echo $row_q7[1] ?>, name: '綠洸鼎：王...'},
                            {value: <?php echo $row_q7[2] ?>, name: '寧兲仞：性...'},
                            {value: <?php echo $row_q7[3] ?>, name: '男的也好我...'},
                            {value: <?php echo $row_q7[4] ?>, name: '都不是我的...'}
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

        <div id="container8" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
        <script type="text/javascript">
            // 單選
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
                            {value: <?php echo $row_q8[1] ?>, name: '男性'},
                            {value: <?php echo $row_q8[2] ?>, name: '女性'},
                            {value: <?php echo $row_q8[3] ?>, name: '多元性別'}
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

        <div id="container9" style="height: 500px;width: 1000px;margin: 0 auto;margin-top:20px;"></div>
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
                            {value: <?php echo $row_q9[1] ?>, name: '18歲以下'},
                            {value: <?php echo $row_q9[2] ?>, name: '19-24歲'},
                            {value: <?php echo $row_q9[3] ?>, name: '25-30歲'},
                            {value: <?php echo $row_q9[4] ?>, name: '31-40歲'},
                            {value: <?php echo $row_q9[5] ?>, name: '41-50歲'},
                            {value: <?php echo $row_q9[6] ?>, name: '51歲以上'}
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
            <a href="skg_csv.php"
                style="background-color: #27f3d6; height: 30px;
                    width: 120px; border-radius: 20px; color: white;
                    text-align: center;" target="_blank">匯出CSV</a>
        </div>
    </body>
</html>