<!DOCTYPE HTML>
<html>

<head>
  <title>REXIN only - 不只是耳機 更是專屬於妳，的耳機</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/finish.css" />
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '283734166912232');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"

  src="https://www.facebook.com/tr?id=283734166912232&ev=PageView&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
</head>
<?php
$pdo = new PDO('mysql:host=localhost; 
	dbname=surveyx_questionnaire;
	charset=utf8','root','password');

date_default_timezone_set('Asia/Taipei');

if(isset($_REQUEST['question1'])) $question1 = $_REQUEST["question1"];
else $question1 = "";

if(isset($_REQUEST['question2_1'])) $question2_1 = $_REQUEST["question2_1"];
else $question2_1 = "";
if(isset($_REQUEST['question2_2'])) $question2_2 = $_REQUEST["question2_2"];
else $question2_2 = "";
if(isset($_REQUEST['question2_3'])) $question2_3 = $_REQUEST["question2_3"];
else $question2_3 = "";
if(isset($_REQUEST['question2_4'])) $question2_4 = $_REQUEST["question2_4"];
else $question2_4 = "";
if(isset($_REQUEST['question2_5'])) $question2_5 = $_REQUEST["question2_5"];
else $question2_5 = "";
if(isset($_REQUEST['question2_text'])) $question2_text = $_REQUEST["question2_text"];
else $question2_text = "";

if(isset($_REQUEST['question3'])) $question3 = $_REQUEST["question3"];
else $question3 = "";

if(isset($_REQUEST['question4_1'])) $question4_1 = $_REQUEST["question4_1"];
else $question4_1 = "";
if(isset($_REQUEST['question4_2'])) $question4_2 = $_REQUEST["question4_2"];
else $question4_2 = "";
if(isset($_REQUEST['question4_3'])) $question4_3 = $_REQUEST["question4_3"];
else $question4_3 = "";
if(isset($_REQUEST['question4_4'])) $question4_4 = $_REQUEST["question4_4"];
else $question4_4 = "";
if(isset($_REQUEST['question4_5'])) $question4_5 = $_REQUEST["question4_5"];
else $question4_5 = "";
if(isset($_REQUEST['question4_6'])) $question4_6 = $_REQUEST["question4_6"];
else $question4_6 = "";

if(isset($_REQUEST['question5'])) $question5 = $_REQUEST["question5"];
else $question5 = "";

if(isset($_REQUEST['question6'])) $question6 = $_REQUEST["question6"];
else $question6 = "";

if(isset($_REQUEST['question7'])) $question7 = $_REQUEST["question7"];
else $question7 = "";

if(isset($_REQUEST['question8'])) $question8 = $_REQUEST["question8"];
else $question8 = "";

if(isset($_REQUEST['email'])) $email = $_REQUEST["email"];
else $email = "";

if(isset($_REQUEST['tel'])) $tel = $_REQUEST["tel"];
else $tel = "";

if(isset($_REQUEST['message'])) $message = $_REQUEST["message"];
else $message = "";

$sql = $pdo -> prepare('insert rexin_q values(
  null,?, ?,
  		  ?,?,?,?,?,?,
		  ?,?,?,?,?,?,
		  ?,?,?,?,?,
		  ?,?,?
);');

if($sql->execute([date("YmdHis"), 
	$question1,
	$question2_1, $question2_2, $question2_3, $question2_4, $question2_5, $question2_text, 
	$question3, 
	$question4_1, $question4_2, $question4_3, $question4_4, $question4_5, $question4_6, 
	$question5, $question6, $question7, $question8, 
	$email, $tel, $message
])) {
	// $key = 123456;
	// $point_url = "";
	// while(TRUE) {
	// 	$semRes = sem_get($key, 1, 0666, 0); // get the resource for the semaphore
	// 	if(sem_acquire($semRes)) { // try to acquire the semaphore. this function will block until the sem will be available
			
	// 		foreach($pdo_p -> query('select * 
	// 						from line_point10 
	// 						where status is null or status="N"
	// 						limit 1;') as $point) {
	// 							$point_url = $point['p'];
	// 						};	
	// 		$pdo_p -> query('update line_point10
	// 						set status = "Y"
	// 						where status is null or status="N"
	// 						limit 1;');
	// 		sem_release($semRes); // release the semaphore so other process can use it
	// 		break;
	// 	}
	// }
	// if($point_url != null) {
	// 	$curl = curl_init();
	// 	// url
	// 	$url = 'https://smsapi.mitake.com.tw/api/mtk/SmSend?';
	// 	$url .= 'CharsetURL=UTF-8';
	// 	// parameters
	// 	$data = 'username=85079013';
	// 	$data .= '&password=0975505229';
	// 	$data .= '&dstaddr='.$phoneNo;
	// 	$data .= '&smbody=謝謝您填寫Furplay的問卷！LINE POINTS 送給您～請點擊下方連結領取⬇️
	// 	'.$point_url;
	// 	// 設定curl網址
	// 	curl_setopt($curl, CURLOPT_URL, $url);
	// 	// 設定Header
	// 	curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
	// 	curl_setopt($curl, CURLOPT_POST, 1);
	// 	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	// 	curl_setopt($curl, CURLOPT_HEADER,0);
	// 	// 執行
	// 	$output = curl_exec($curl);
	// 	curl_close($curl);
	// }
	// else {
	// 	echo "<script>alert('感謝您的填寫，點數已全數發送完畢');</script>";
	// }
}
else {
	echo "<script>alert('手機重複填寫');</script>";
}

?>
<body class="landing is-preload">
  <!-- Main -->
  <div class="main">
    <picture>
      <source media="(max-width: 798px)" srcset="images/finish/logo-m.png">
      <source media="(min-width: 798px)" srcset="images/finish/logo.png">
      <img data-src="images/finish/logo.png" />
    </picture>
    <div class="float-button">
      <a href="https://www.facebook.com/REXIN.CIEM/posts/231680012332415">
      <img class="button" src="images/finish/button.png" />
      <!-- </a> -->
    </div>
  </div>
</body>

</html>