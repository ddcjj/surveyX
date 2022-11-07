<!DOCTYPE HTML>
<html>

<head>
  <title>《那個江湖》上線前問卷調查</title>
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

$question2 = isset($_POST['question2'])?$_POST['question2']:"";

$question3_1 = isset($_POST['question3_1'])?$_POST['question3_1']:"";
$question3_2 = isset($_POST['question3_2'])?$_POST['question3_2']:"";
$question3_3 = isset($_POST['question3_3'])?$_POST['question3_3']:"";
$question3_4 = isset($_POST['question3_4'])?$_POST['question3_4']:"";
$question3_5 = isset($_POST['question3_5'])?$_POST['question3_5']:"";
$question3_6 = isset($_POST['question3_6'])?$_POST['question3_6']:"";

$question4 = isset($_POST['question4'])?$_POST['question4']:"";

$question5 = isset($_POST['question5'])?$_POST['question5']:"";
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

$sql = $pdo -> prepare('insert cosemen_q values(
  null,?, ?,?,
  		?,?,?,?,?,?,
		  ?,?,?,?,?,?,
		  ?,?,?
);');



if($sql->execute([date("YmdHis"), 
	$question1, $question2,
	$question3_1, $question3_2, $question3_3, $question3_4, $question3_5, $question3_6,
	$question4, $question5, $question6, 
  $question7, $question8, $question9, 
	$email, $tel, $message
])) {
}
else {
	echo "<script>alert('資料庫異常');</script>";
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
    <a href="https://www.facebook.com/cosemen/posts/229295739348571">
      <img id="outlinkButton" class="button" style="width: 120px;" src="images/finish/button.png" />
    </a>
    <!-- <img class="button" src="images/finish/button.png" /> -->
  </div>
</body>

</html>