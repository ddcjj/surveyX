<!DOCTYPE HTML>
<html>

<head>
  <title>maxvet</title>
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

if(isset($_REQUEST['wcf'])) $wcf = $_REQUEST["wcf"];
else $wcf = "";
if(isset($_REQUEST['company'])) $company = $_REQUEST["company"];
else $company = "";
if(isset($_REQUEST['contact'])) $contact = $_REQUEST["contact"];
else $contact = "";
if(isset($_REQUEST['email'])) $email = $_REQUEST["email"];
else $email = "";
if(isset($_REQUEST['whatsapp'])) $whatsapp = $_REQUEST["whatsapp"];
else $whatsapp = "";

$Mon_1 = isset($_REQUEST['Mon_1']) ? $_REQUEST['Mon_1'] : "";
$Mon_2 = isset($_REQUEST['Mon_2']) ? $_REQUEST['Mon_2'] : "";
$Tues_1 = isset($_REQUEST['Tues_1']) ? $_REQUEST['Tues_1'] : "";
$Tues_2 = isset($_REQUEST['Tues_2']) ? $_REQUEST['Tues_2'] : "";
$Wed_1 = isset($_REQUEST['Wed_1']) ? $_REQUEST['Wed_1'] : "";
$Wed_2 = isset($_REQUEST['Wed_2']) ? $_REQUEST['Wed_2'] : "";
$Thur_1 = isset($_REQUEST['Thur_1']) ? $_REQUEST['Thur_1'] : "";
$Thur_2 = isset($_REQUEST['Thur_2']) ? $_REQUEST['Thur_2'] : "";
$Fri_1 = isset($_REQUEST['Fri_1']) ? $_REQUEST['Fri_1'] : "";
$Fri_2 = isset($_REQUEST['Fri_2']) ? $_REQUEST['Fri_2'] : "";


$sql = $pdo -> prepare('insert maxvet_q values(
  null,?, ?,?,?,?,?,
		      ?,?,?,?,?,
          ?,?,?,?,?
);');

if($sql->execute([date("YmdHis"), 
	$wcf , $company, $contact, $email, $whatsapp,
	$Mon_1, $Mon_2, $Tues_1, $Tues_2, 
  $Wed_1, $Wed_2, $Thur_1, $Thur_2, 
  $Fri_1, $Fri_2
])) {

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
    <!-- <a href="https://m.me/necfreee?ref=lottery">
      <img class="button" src="images/finish/button.png" />
    </a> -->
  </div>
</body>

</html>