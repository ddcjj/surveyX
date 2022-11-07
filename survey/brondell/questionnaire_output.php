<!DOCTYPE HTML>
<html>

<head>
  <title>Brondell 美國邦特爾 O2+ 抗敏濾菌空氣淨化器 ｜ 強大的4合一高效 True HEPA 濾網，用「芯」打造健康純淨的居家環境</title>
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
fbq('init', '708998240073647');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=708998240073647&ev=PageView&noscript=1"
/></noscript>
  <meta name="facebook-domain-verification" content="sev1n2jel81jxgv0ou34cgmvcdq028" />
<!-- End Facebook Pixel Code -->
</head>
<?php
$pdo = new PDO('mysql:host=localhost; 
	dbname=surveyx_questionnaire;
	charset=utf8','root','password');

date_default_timezone_set('Asia/Taipei');

$question1_1 = isset($_POST['question1_1'])?$_POST['question1_1']:"";
$question1_2 = isset($_POST['question1_2'])?$_POST['question1_2']:"";
$question1_3 = isset($_POST['question1_3'])?$_POST['question1_3']:"";
$question1_4 = isset($_POST['question1_4'])?$_POST['question1_4']:"";
$question1_5 = isset($_POST['question1_5'])?$_POST['question1_5']:"";
$question1_6 = isset($_POST['question1_6'])?$_POST['question1_6']:"";
$question1_7 = isset($_POST['question1_7'])?$_POST['question1_7']:"";

$question2_1 = isset($_POST['question2_1'])?$_POST['question2_1']:"";
$question2_2 = isset($_POST['question2_2'])?$_POST['question2_2']:"";
$question2_3 = isset($_POST['question2_3'])?$_POST['question2_3']:"";
$question2_4 = isset($_POST['question2_4'])?$_POST['question2_4']:"";
$question2_5 = isset($_POST['question2_5'])?$_POST['question2_5']:"";
$question2_6 = isset($_POST['question2_6'])?$_POST['question2_6']:"";
$question2_7 = isset($_POST['question2_7'])?$_POST['question2_7']:"";

$question3_1 = isset($_POST['question3_1'])?$_POST['question3_1']:"";
$question3_2 = isset($_POST['question3_2'])?$_POST['question3_2']:"";
$question3_3 = isset($_POST['question3_3'])?$_POST['question3_3']:"";
$question3_4 = isset($_POST['question3_4'])?$_POST['question3_4']:"";
$question3_5 = isset($_POST['question3_5'])?$_POST['question3_5']:"";
$question3_6 = isset($_POST['question3_6'])?$_POST['question3_6']:"";
$question3_7 = isset($_POST['question3_7'])?$_POST['question3_7']:"";
$question3_8 = isset($_POST['question3_8'])?$_POST['question3_8']:"";

$question4 = isset($_POST['question4'])?$_POST['question4']:"";
$question5 = isset($_POST['question5'])?$_POST['question5']:"";
$question6 = isset($_POST['question6'])?$_POST['question6']:"";
$question7 = isset($_POST['question7'])?$_POST['question7']:"";

if(isset($_REQUEST['email'])) $email = $_REQUEST["email"];
else $email = "";

if(isset($_REQUEST['tel'])) $tel = $_REQUEST["tel"];
else $tel = "";

if(isset($_REQUEST['message'])) $message = $_REQUEST["message"];
else $message = "";

$sql = $pdo -> prepare('insert into brondell_q values(
  null,?, ?,?,?,?,?,?,?,
		  ?,?,?,?,?,?,?,
		  ?,?,?,?,?,?,?,?,
		  ?,?,?,?,
		  ?,?,?
);');

if($sql->execute([date("YmdHis"), 
	$question1_1, $question1_2, $question1_3, $question1_4, $question1_5, $question1_6, $question1_7, 
	$question2_1, $question2_2, $question2_3, $question2_4, $question2_5, $question2_6, $question2_7, 
	$question3_1, $question3_2, $question3_3, $question3_4, $question3_5, $question3_6, $question3_7, $question3_8, 
	$question4, $question5, $question6, $question7,
	$email, $tel, $message
])) {
	
}
else {
	echo "<script>alert('資料庫異常');</script>";
}

?>

<body style="background-attachment: local;" class="landing is-preload">
<script>
  fbq('track', 'CompleteRegistration'); 
</script>
  <!-- Main -->
  <div class="main">
    <picture>
      <source media="(max-width: 798px)" srcset="images/finish/logo-m.png">
      <source media="(min-width: 798px)" srcset="images/finish/logo.png">
      <img data-src="images/finish/logo.png" />
    </picture>
    <a href="https://www.facebook.com/brondell.tw/posts/2981336188745275">
      <img class="button" src="images/finish/button.png" />
    </a>
  </div>
</body>

</html>