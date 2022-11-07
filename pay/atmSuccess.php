<?php

/**
* 設定內容為UTF-8的編碼
*/
// header('Content-type: text/html; charset=utf-8');
/**
* 載入Somp的Class
*/
require_once ("Somp.class.php");
/**
* 設定API的運作方法為，可以是post或是soap模式
*/
$method = "post";

date_default_timezone_set('Asia/Taipei');

// MMP正式環境
// $frontHost = "https://mpay.so-net.net.tw/";
// $apiHost = "https://mpapi.so-net.net.tw/";

//MMP測試環境
$frontHost = "https://mpay-dev.so-net.net.tw/";
$apiHost = "https://mpapi-dev.so-net.net.tw/";

//商店代碼
$icpId = "futureapp";

//測試商品代碼(商家自訂)
// $icpProdId = "surveyx";

/**
* So-net Micropayment的付款中心條款頁面，通常不用更改
*/
$actionUrl = $frontHost . "paymentRule.php";

/**
* So-net Micropayment的Api Post網址
* $apiHost . "microPaymentPost.php"
* So-net Micropayment的Api Soap網址
* //正式機
* $apiHost . "xml/microPaymentServiceProd.wsdl"
* //測試機
* $apiHost . "xml/microPaymentServiceProdDev.wsdl"
*
*/
if($method == "post"){
	$apiUrl = $apiHost . "microPaymentPost.php";
}else if($method == "soap"){
	$apiUrl = $apiHost . "xml/microPaymentServiceProdDev.wsdl";
}else{
	die();	
}


$sonetOrderNo = $_POST['sonetOrderNo'];
$mpId = $_POST['mpId'];
$icpId = $_POST['icpId'];
$icpUserId = $_POST['icpUserId'];
$vatmAccount = $_POST['vatmAccount'];
$price = $_POST['price'];
$payDate = $_POST['payDate'];
$hash = $_POST['hash'];

foreach($_POST as $key => $val){
	$resultMesg .= $key . ":" . $val . "<br>";
}

$pdo = new PDO('mysql:host=localhost;
			dbname=surveyx_order;
			charset=utf8','root','password');
$sql_rent = $pdo->prepare('update orders set payStatus=?, payDate=? where sonetOrderNo=? and vatmAccount=?');
$sql_setUp = $pdo->prepare('update orders_setUp set payStatus=?, payDate=? where sonetOrderNo=? and vatmAccount=?');

$pdo_c = new PDO('mysql:host=localhost;
			dbname=surveyx_creator;
			charset=utf8','root','password');
$sql_c_rent = $pdo_c->prepare('update member_profile set c_rank=2 where account=?');
$sql_c_setUp = $pdo_c->prepare('update member_profile set c_rank=1 where account=?');

if($sql_rent->execute(['付款完成', $payDate, $sonetOrderNo, $vatmAccount])) {
	if($sql_c_rent->execute([$icpUserId])) {
		echo '0000';
	}
	else {
		echo 'rank更新失敗';
	}
	
}
else {
	echo 'plapet資料更新失敗';
}
if($sql_setUp->execute(['付款完成', $payDate, $sonetOrderNo, $vatmAccount])) {
	if($sql_c_setUp->execute([$icpUserId])) {
		echo '0000';
	}
	else {
		echo 'rank更新失敗';
	}
}
else {
	echo 'plapet資料更新失敗';
}

?>
</body>
</html>