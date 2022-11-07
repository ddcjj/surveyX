<!DOCTYPE HTML>
<html>

<head>
  <title>DonDon喵星人 【2022年度最討喜可愛的治癒系招財貓，粉墨登場！旋風來襲！】</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/finish.css" />
  <!-- Facebook Pixel Code -->
  <!-- End Facebook Pixel Code -->
</head>
<?php
$pdo = new PDO('mysql:host=localhost; 
	dbname=surveyx_questionnaire;
	charset=utf8','root','password');

date_default_timezone_set('Asia/Taipei');

$question1 = isset($_POST['question1'])?$_POST['question1']:"";

$question2_1 = isset($_POST['question2_1'])?$_POST['question2_1']:"";
$question2_2 = isset($_POST['question2_2'])?$_POST['question2_2']:"";
$question2_3 = isset($_POST['question2_3'])?$_POST['question2_3']:"";
$question2_4 = isset($_POST['question2_4'])?$_POST['question2_4']:"";
$question2_5 = isset($_POST['question2_5'])?$_POST['question2_5']:"";

$question3_1 = isset($_POST['question3_1'])?$_POST['question3_1']:"";
$question3_2 = isset($_POST['question3_2'])?$_POST['question3_2']:"";
$question3_3 = isset($_POST['question3_3'])?$_POST['question3_3']:"";
$question3_4 = isset($_POST['question3_4'])?$_POST['question3_4']:"";

$question4 = isset($_POST['question4'])?$_POST['question4']:"";

$question5_1 = isset($_POST['question5_1'])?$_POST['question5_1']:"";
$question5_2 = isset($_POST['question5_2'])?$_POST['question5_2']:"";
$question5_3 = isset($_POST['question5_3'])?$_POST['question5_3']:"";
$question5_4 = isset($_POST['question5_4'])?$_POST['question5_4']:"";
$question5_5 = isset($_POST['question5_5'])?$_POST['question5_5']:"";
$question5_6 = isset($_POST['question5_6'])?$_POST['question5_6']:"";
$question5_7 = isset($_POST['question5_7'])?$_POST['question5_7']:"";
$question5_8 = isset($_POST['question5_8'])?$_POST['question5_8']:"";
$question5_9 = isset($_POST['question5_9'])?$_POST['question5_9']:"";
$question5_10 = isset($_POST['question5_10'])?$_POST['question5_10']:"";
$question5_11 = isset($_POST['question5_11'])?$_POST['question5_11']:"";
$question5_12 = isset($_POST['question5_12'])?$_POST['question5_12']:"";
$question5_13 = isset($_POST['question5_13'])?$_POST['question5_13']:"";

$question6 = isset($_POST['question6'])?$_POST['question6']:"";
$question7 = isset($_POST['question7'])?$_POST['question7']:"";
$question8 = isset($_POST['question8'])?$_POST['question8']:"";
$question9 = isset($_POST['question9'])?$_POST['question9']:"";

if(isset($_REQUEST['email'])) $email = $_REQUEST["email"];
else $email = "";

if(isset($_REQUEST['tel'])) $tel = $_REQUEST["tel"];
else $tel = "";

if(isset($_REQUEST['message'])) $message = $_REQUEST["message"];
else $message = "";

$sql = $pdo -> prepare('insert into dondon_q values(
  null,?, 
      ?,
      ?,?,?,?,?,
		  ?,?,?,?,
      ?,
      ?,?,?,?,?,?,?,?,?,?,
		  ?,?,?,
      ?,?,?,?,
      ?,?,?
);');

if($sql->execute([date("YmdHis"), 
	$question1, 
	$question2_1, $question2_2, $question2_3, $question2_4, $question2_5,
	$question3_1, $question3_2, $question3_3, $question3_4,
	$question4, 
  $question5_1, $question5_2, $question5_3, $question5_4, $question5_5, $question5_6, $question5_7, 
  $question5_8, $question5_9, $question5_10, $question5_11, $question5_12, $question5_13, 
  $question6, $question7, $question8, $question9,
	$email, $tel, $message
])) {
	
}
else {
	echo "<script>alert('資料庫異常');</script>";
}

?>

<body style="background-attachment: local;" class="landing is-preload">
  <!-- Main -->
  <div class="main">
    <picture>
      <source media="(max-width: 798px)" srcset="images/finish/logo-m.png">
      <source media="(min-width: 798px)" srcset="images/finish/logo.png">
      <img data-src="images/finish/logo.png" />
    </picture>
    <a href="https://www.facebook.com/royaldondon2021/">
      <img class="button" src="images/finish/button.png" />
    </a>
  </div>
</body>

</html>