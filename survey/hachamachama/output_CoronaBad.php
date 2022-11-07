
<!DOCTYPE HTML>
<html>
<head>

<title>CoronaBad</title>
<meta charset='utf-8'/>
<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'/>
<link rel='stylesheet' href='../assets/css/main.css' />

</head>
<body class='landing is-preload'>
<?php

            if(isset($_REQUEST["question1"])) {
                $question1 = $_REQUEST["question1"];
            } else { $question1 = ""; }
            if(isset($_REQUEST["question2"])) {
                $question2 = $_REQUEST["question2"];
            } else { $question2 = ""; }
            if(isset($_REQUEST["question3"])) {
                $question3 = $_REQUEST["question3"];
            } else { $question3 = ""; }
            if(isset($_REQUEST["question4"])) {
                $question4 = $_REQUEST["question4"];
            } else { $question4 = ""; }
            if(isset($_REQUEST["question5"])) {
                $question5 = $_REQUEST["question5"];
            } else { $question5 = ""; }
    $pdo_q = new PDO('mysql:host=localhost; 
    dbname=surveyx_questionnaire; 
    charset=utf8','root','password');
    date_default_timezone_set('Asia/Taipei');
    
$sql_q = $pdo_q->prepare('insert into hachamachama_CoronaBad_q values(null ,? , ?, ?, ?, ?, ?)');
    if($sql_q->execute([date("YmdHis"), $question1, $question2, $question3, $question4, $question5])){
        $curl = curl_init();
        // url
        $url = 'https://smsapi.mitake.com.tw/api/mtk/SmSend?';
        $url .= 'CharsetURL=UTF-8';
        // parameters
        $data = 'username=85079013';
        $data .= '&password=0975505229';
        $data .= '&dstaddr='.$question3;
        $data .= '&smbody=感謝填寫～勤洗手，戴口罩，一起為防疫加油！';
        // 設定curl網址
        curl_setopt($curl, CURLOPT_URL, $url);
        // 設定Header
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HEADER,0);
        // 執行
        $output = curl_exec($curl);
        curl_close($curl);
    }?>
</div>
    <div id="page-wrapper" style="background: url('images/');">
			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2 class="css_h2">感謝您撥空填寫問卷！</h2>
						</header>
						<img src="images/" width="100%">
					</section>

				</section>
		</div>

    <!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery.dropotron.min.js"></script>
        <script src="../assets/js/jquery.scrollex.min.js"></script>
        <script src="../assets/js/browser.min.js"></script>
        <script src="../assets/js/breakpoints.min.js"></script>
        <script src="../assets/js/util.js"></script>
        <script src="../assets/js/main.js"></script>
</body>
</html>