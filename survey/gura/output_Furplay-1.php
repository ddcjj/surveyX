
<!DOCTYPE HTML>
<html>
<head>

<title></title>
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
            if(isset($_REQUEST["question6"])) {
                $question6 = $_REQUEST["question6"];
            } else { $question6 = ""; }
            if(isset($_REQUEST["question7"])) {
                $question7 = $_REQUEST["question7"];
            } else { $question7 = ""; }
            if(isset($_REQUEST["phoneNo"])) {
                $phoneNo = $_REQUEST["phoneNo"];
            } else { $phoneNo = ""; }
    $pdo_q = new PDO('mysql:host=localhost; 
    dbname=surveyx_questionnaire;
    charset=utf8','root','password');
    date_default_timezone_set('Asia/Taipei');
    
    $pdo = new PDO('mysql:host=localhost;
                    dbname=line_point;
                    charset=utf8','root','password');
    
    $sql_q = $pdo_q->prepare('insert into gura_Furplay_q values(null ,
                                    ? , ?, ?, ?, ?,
                                    ?, ?, ?, ?)');
    if($sql_q->execute([date("YmdHis"), $question1, $question2, $question3, $question4, $question5, $question6, $question7, $phoneNo])){
        $key = 123456;
        $point_url = "";
        while(TRUE) {
            $semRes = sem_get($key, 1, 0666, 0); // get the resource for the semaphore
            if(sem_acquire($semRes)) { // try to acquire the semaphore. this function will block until the sem will be available
                
                foreach($pdo -> query('select * 
                                from line_point10 
                                where status is null or status="N"
                                limit 1;') as $point) {
                                    $point_url = $point['p'];
                                };
                $pdo -> query('update line_point10
                                set status = "Y"
                                where status is null or status="N"
                                limit 1;');
                sem_release($semRes); // release the semaphore so other process can use it
                break;
            }
        }
        if($point_url != null) {
            $curl = curl_init();
            // url
            $url = 'https://smsapi.mitake.com.tw/api/mtk/SmSend?';
            $url .= 'CharsetURL=UTF-8';
            // parameters
            $data = 'username=85079013';
            $data .= '&password=0975505229';
            $data .= '&dstaddr='.$phoneNo;
            $data .= '&smbody=謝謝您填寫Furplay的問卷！LINE POINTS 送給您～請點擊下方連結領取⬇️
            '.$point_url;
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
        }
        else {
            echo "<script>alert('感謝您的填寫，點數已全數發送完畢');</script>";
        }
    }
    else {
        echo "<script>alert('手機或信箱重複填寫');</script>";
    }
    ?>
</div>
    <div id="page-wrapper" style="background: url('images/iPhone 12 Pro Max – 11.png');">
			<!-- Banner -->
            <section class="css_div">
				<!-- <img src="images/iPhone 12 Pro Max – 12.png" width="100%"> -->
			</section>
			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<div>
                                <h2 class="css_h2" style="font-size:16px;">您的意見對我們來說都非常珍貴！</h2>
                                <h2 class="css_h2" style="font-size:16px;">
                                    <br/>
                                    為表達感謝，我們已發送10點LINE Points至您的手機
請參照簡訊步驟操作！
                                    <br/>
                                </h2>
                                <h2 class="css_h2" style="font-size:16px;">
                                邀請您至GoogleMap給予評價支持：
                                <a href="https://bit.ly/3xycQKU" style="color:blue;" target="_blank">https://bit.ly/3xycQKU</a>
                                </h2>
                                <h2 class="css_h2" style="font-size:16px;">
                                關注臉書～不定期更新資訊：
                                <a href="https://bit.ly/3gOToUe" style="color:blue;" target="_blank">https://bit.ly/3gOToUe</a>
                                </h2>
								<ul class="box">
									<li><a href="https://www.facebook.com/furplay.tech/" class="button primary"
                                        style="width: 200px;height: 50px;background-color: #fff;
                                    color: #000 !important;border-color: #64bab0;border-radius: 60px;
                                    box-shadow: inset 0 0 6px #64bab0;">至臉書觀看最新消息</a></li>
								</ul>

                                <p>
                                <h2>Furplay寵玩科技</h2><br/>
                                共享空間｜貓咪咖啡廳｜攝影空間｜活動包場
                                </p>
							</div>
						</header>
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