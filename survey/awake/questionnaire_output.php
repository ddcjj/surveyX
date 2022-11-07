<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-44MTHY430M"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-44MTHY430M');
    </script>
		<!-- Google Tag Manager -->
		<script>
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-WQCKSF9');
		</script>
		<!-- End Google Tag Manager -->
		<title>咕溜被問卷</title>
		<meta charset="utf-8"/>
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
    fbq('init', '139444808200580');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=139444808200580&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- LINE Tag Base Code -->
		<!-- Do Not Modify -->
		<script>
			(function(g,d,o){
			g._ltq=g._ltq||[];g._lt=g._lt||function(){g._ltq.push(arguments)};
			var h=location.protocol==='https:'?'https://d.line-scdn.net':'http://d.line-cdn.net';
			var s=d.createElement('script');s.async=1;
			s.src=o||h+'/n/line_tag/public/release/v1/lt.js';
			var t=d.getElementsByTagName('script')[0];t.parentNode.insertBefore(s,t);
				})(window, document);
			_lt('init', {
			customerType: 'lap',
			tagId: '6dca2cba-adb4-4a10-a0e3-e40cfab411a7'
			});
			_lt('send', 'pv', ['6dca2cba-adb4-4a10-a0e3-e40cfab411a7']);
		</script>
		<noscript>
		<img height="1" width="1" style="display:none"
			src="https://tr.line.me/tag.gif?c_t=lap&t_id=6dca2cba-adb4-4a10-a0e3-e40cfab411a7&e=pv&noscript=1" />
		</noscript>
		<!-- End LINE Tag Base Code -->
</head>
<?php
$pdo = new PDO('mysql:host=localhost; 
	dbname=surveyx_questionnaire;
	charset=utf8','root','password');

$pdo_p = new PDO('mysql:host=localhost;
	dbname=line_point;
	charset=utf8','root','password');

mysqli_set_charset($con, "utf8");//設定編碼為utf-8

date_default_timezone_set('Asia/Taipei');

if(isset($_REQUEST['question1_1'])) $question1_1 = $_REQUEST["question1_1"];
else $question1_1 = "";
if(isset($_REQUEST['question1_2'])) $question1_2 = $_REQUEST["question1_2"];
else $question1_2 = "";
if(isset($_REQUEST['question1_3'])) $question1_3 = $_REQUEST["question1_3"];
else $question1_3 = "";
if(isset($_REQUEST['question1_4'])) $question1_4 = $_REQUEST["question1_4"];
else $question1_4 = "";
if(isset($_REQUEST['question1_5'])) $question1_5 = $_REQUEST["question1_5"];
else $question1_5 = "";
if(isset($_REQUEST['question1_6'])) $question1_6 = $_REQUEST["question1_6"];
else $question1_6 = "";

if(isset($_REQUEST['question2'])) $question2 = $_REQUEST["question2"];
else $question2 = "";

if(isset($_REQUEST['question3_1'])) $question3_1 = $_REQUEST["question3_1"];
else $question3_1 = "";
if(isset($_REQUEST['question3_2'])) $question3_2 = $_REQUEST["question3_2"];
else $question3_2 = "";
if(isset($_REQUEST['question3_3'])) $question3_3 = $_REQUEST["question3_3"];
else $question3_3 = "";
if(isset($_REQUEST['question3_4'])) $question3_4 = $_REQUEST["question3_4"];
else $question3_4 = "";
if(isset($_REQUEST['question3_5'])) $question3_5 = $_REQUEST["question3_5"];
else $question3_5 = "";
if(isset($_REQUEST['question3_6'])) $question3_6 = $_REQUEST["question3_6"];
else $question3_6 = "";
if(isset($_REQUEST['question3_7'])) $question3_7 = $_REQUEST["question3_7"];
else $question3_7 = "";

if(isset($_REQUEST['question4'])) $question4 = $_REQUEST["question4"];
else $question4 = "";

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

$sql = $pdo -> prepare('insert awake_q values(
	null, ?,?,?,?,?,
		  ?,?,?,?,?,
		  ?,?,?,?,?,
		  ?,?,?,?,?,
		  ?,?,?
);');

if($sql->execute([date("YmdHis"), 
	$question1_1, $question1_2, $question1_3, $question1_4, $question1_5, $question1_6,
	$question2, $question3_1, $question3_2, $question3_3, $question3_4, $question3_5, $question3_6, $question3_7,
	$question4, $question5, $question6, $question7, $question8, $email, $tel, $message
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
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQCKSF9"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
			<!-- Main -->
      <div><img class="logo" src="images/finish/logo.png"/></div>
      <div class="btn-bk"><a href="https://www.facebook.com/duphene/"><img class="button" src="images/finish/button.png"/></a></div>     
	</body>
</html>