<?php
session_start();
if(isset($_SESSION['account'])) {
	$account = $_SESSION['account'];
}
else {
	echo "<script>alert('請先登入');</script>";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../login.html>';
}
if(isset($_REQUEST['c_name'])) {
	$c_name = $_REQUEST['c_name'];
}
else {
	$c_name = '';
}
if(isset($_REQUEST['c_company'])) {
	$c_company = $_REQUEST['c_company'];
}
else {
	$c_company = '';
}
if(isset($_REQUEST['c_phone'])) {
	$c_phone = $_REQUEST['c_phone'];
}
else {
	$c_phone = '';
}
if(isset($_REQUEST['c_email'])) {
	$c_email = $_REQUEST['c_email'];
}
else {
	$c_email = '';
}
if(isset($_REQUEST['orderMemo'])) {
	$orderMemo = $_REQUEST['orderMemo'];
}
else {
	$orderMemo = '';
}

if(isset($_REQUEST['pay_method'])) {
	$pay_method = $_REQUEST['pay_method'];
	switch($pay_method) {
		case 'CYC_CITI':
			$payCall = '信用卡';
			break;
		case 'vATM_FCB':
			$payCall = 'ATM轉帳';
			break;
	}
}
else {
	$pay_method = '';
}

if(isset($_REQUEST['charge4w'])) {
	$charge4w = $_REQUEST['charge4w'];
	switch($charge4w) {
		case 'charge4setUp':
			$icpProdDesc = '問卷行銷工具設定費';
			$price = 8000;
			$table_name = 'orders_setUp';
			$icpProdId = "surveyx_setUp";
			break;
		case 'charge4rent':
			$icpProdDesc = '問卷行銷工具月租費';
			$price = 500;
			$table_name = 'orders';
			$icpProdId .= "surveyx_rent";
			break;
	}
}
else {
	$charge4w = '';
}



$today = date("Ymd");
function milliseconds($format = 'u', $utimestamp = null)
{
    if (is_null($utimestamp)){
        $utimestamp = microtime(true);
    }
    $timestamp = floor($utimestamp);
    $milliseconds = round(($utimestamp - $timestamp) * 1000000);//改這裡的數值控制毫秒位數
    return $milliseconds;
}
// echo milliseconds();
$ms = milliseconds();
$orderNum = $today.$ms;

$orderStauts = '訂單建立';

date_default_timezone_set('Asia/Taipei');
$createDate = date('YmdHis');

$pdo = new PDO('mysql:host=localhost;
				dbname=surveyx_order;
				charset=utf8','root','password');

$sql = $pdo->prepare('insert into customer values(?,?,?,?,?,
												  ?,?,?,?,?)');
if($sql->execute([$orderNum, $orderStauts, $account,
				  $c_name, $c_company, $c_phone, $c_email,
				  $pay_method, $orderMemo, $createDate,
				  ])) {

}
else {
	echo '<script>客戶資料建立失敗</script>';
	exit();
}

?>
<?php
require_once ("common.php");

$data['icpId'] = $icpId;
$data['icpOrderId'] = $orderNum;
$data['icpProdId'] = $icpProdId;
$data['mpId'] = $pay_method;
$data['memo'] = $orderMemo;
$data['icpUserId'] = $account;
$data['icpProdDesc'] = $icpProdDesc;
$data['price'] = $price;
$data['returnUrl'] = 'https://www.surveyx.tw/pay/authSuccess.php';
$data['doAction'] = "authOrderCredit";

$somp = new Somp();
$finalAry = $somp->doRequest($method,$data,$apiUrl);

$rtMsg = (string)$finalAry['resultCode'];

$sql_order = $pdo->prepare('insert into '.$table_name.' values(
											?,?,?,?,?,
											?,?,?,?,?,
											?,?,?,?,?,
											?,?,?,?)');
if($sql_order->execute([$orderNum, 'AUTH', '', $icpProdId, $data['icpProdDesc'],
	$data['icpUserId'], $pay_method, $icpId, $price, $orderMemo,
	$finalAry['authCode'], $finalAry['resultCode'], $finalAry['resultMesg'], 'Y', 
	$finalAry['authRelyDateTime'], '', '', '付款中', ''])) {
}
else {
	echo '<script>alert("訂單建立失敗");</script>';
	exit();
}

if($rtMsg == "00000"){
	unset($data['doAction']);
	$data['authCode'] = $finalAry['authCode'];
}else{
	$data = null;
	$data['resultCode'] = $finalAry['resultCode'];
	$data['resultMesg'] = $finalAry['resultMesg'];
	$actionUrl = "authFail.php";
	$sql_fail = $pdo->prepare('insert into transRecords values(
								?,?,?,?,?)');
	if($sql_fail->execute([$orderNum, $pay_method, $data['resultCode'],
						   $data['resultMesg'], date('YmdHis')])) {

	}
	echo '<script>alert("訂單授權失敗");</script>';
	// exit();
}

?>
<h1 style="margin-top: 10vh;"> <span>S</span>urvey<span>X</span></h1>
<div class="bg-agile">
	<div class="left-agileits-w3layouts-img">
		<h3>SurveyX</h3>
	</div>
	<div class="book-appointment">
			<h2>訂單確認</h2>
			<div class="book-agileinfo-form">
			<form action="<?php echo $actionUrl ?>" method="post" name="CallAuth" id="CallAuth">

				<div class="main-agile-sectns">
					<div class="agileits-btm-spc form-text1">
						<h3 class="css_h3"><?php echo '付款方式：'.$payCall; ?></h3>
					</div>
				</div>
				<div class="main-agile-sectns">
					<div class="agileits-btm-spc form-text2">
						<h3 class="css_h3"><?php echo '訂單編號：'.$orderNum; ?></h3>		
					</div>
				</div>
				<div class="main-agile-sectns">
					<div class="agileits-btm-spc form-text2">
					<h3 class="css_h3"><?php echo '訂單金額：'.$price; ?></h3>					
					</div>
				</div>
				<div class="main-agile-sectns">
					<div class="agileits-btm-spc form-text2">
					<h3 class="css_h3"><?php echo '聯絡電話：'.$c_phone; ?></h3>				
					</div>
				</div>
				<div class="main-agile-sectns">
					<div class="agileits-btm-spc form-text2">
					<h3 class="css_h3"><?php echo '聯絡信箱：'.$c_email; ?></h3>
					</div>
				</div>
				
				<div class="book-agileinfo-form">
					<input id="icpId" type="hidden" value="<?php echo $data["icpId"]; ?>" name="icpId" />
					<input id="icpOrderId" type="hidden" value="<?php echo $data["icpOrderId"]; ?>" name="icpOrderId"/>
					<input id="icpProdId" type="hidden" value="<?php echo $data["icpProdId"]; ?>" name="icpProdId"/>
					<input id="mpId" type="hidden" value="<?php echo $data["mpId"]; ?>" name="mpId"/>
					<input id="memo" type="hidden" value="<?php echo $data["memo"]; ?>" name="memo"/>
					<input id="icpUserId" type="hidden" value="<?php echo $data["icpUserId"]; ?>" name="icpUserId" />
					<input id="authCode" type="hidden" value="<?php echo $data["authCode"]; ?>" name="authCode"/>
					<input id="returnUrl" type="hidden" value="<?php echo $data["returnUrl"]; ?>" name="returnUrl"/>
				</div>
				<br/>
				<div class="clear"></div>
				<input type="submit" value="確認">
				<div class="clear"></div>
			</form>
			<!-- <script type="text/javascript">CallAuth.submit();
			</script> -->
			</div>
</div>

</body>
</html>