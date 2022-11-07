<?php
require_once ("common.php");

$resultCode = $_POST['resultCode'];
$resultMesg = $_POST['resultMesg'];
$icpId = $_POST['icpId'];
$icpProdId = $_POST['icpProdId'];
$icpOrderId = $_POST['icpOrderId'];
$icpUserId = $_POST['icpUserId'];
$mpId = $_POST['mpId'];
$price = $_POST['price'];
$memo = $_POST['memo'];
$orderDataTime = $_POST['orderDataTime'];
$sonetOrderNo = $_POST['sonetOrderNo'];
$authCode = $_POST['authCode'];

switch($icpProdId) {
	case 'surveyx_setUp':
		$table_name = 'orders_setUp';
		$rank = 1;
		break;
	case 'surveyx_rent':
		$table_name = 'orders';
		$rank = 2;
		break;
}

$pdo = new PDO('mysql:host=localhost;
				dbname=surveyx_order;
				charset=utf8','root','password');

foreach($_POST as $key => $val){
	$resultMesg .= $key . ":" . $val . "<br>";
}


if($resultCode == "ok"){
	$data['icpId'] = $_POST['icpId'];
	$data['icpOrderId'] = $_POST['icpOrderId'];
	$data['sonetOrderNo'] = $_POST['sonetOrderNo'];
	
	$data['doAction'] = "confirmOrder";

	$somp = new Somp();
	
	$finalAry = $somp->doRequest($method,$data,$apiUrl);

	$sql_order = $pdo->prepare('update '.$table_name.' set orderStatus=?, sonetOrderNo=?,  
					  resultCode=?, resultMesg=? where orderNo=?;');
	if($sql_order->execute(['SUCCESS', $sonetOrderNo,
					$resultCode, $resultMesg, $icpOrderId])) {
		if($mpId == 'CYC_CITI') {
			$sql_pay = $pdo->prepare('update '.$table_name.' set payStatus=?, payDate=? where orderNo=?');
			if($sql_pay->execute(['付款完成', date('YmdHis'), $data['icpOrderId']])) {
				$pdo_mem = new PDO('mysql:host=localhost;
									dbname=surveyx_creator;
									charset=utf8','root','password');
				$sql_mem = $pdo_mem -> prepare('update member_profile set c_rank=? where account=?');
				$sql_mem -> execute([$rank, $icpUserId]);
				unset($_SESSION['rank']);
				$_SESSION['rank'] = $rank;
			}
		}
		else if($finalAry['vatmAccount'] != '') {
			$sql = $pdo->prepare('update '.$table_name.' set vatmAccount=?, expireDatetime=?, payStatus=? where orderNo = ?;');
			if($sql->execute([$finalAry['vatmAccount'], $finalAry['expireDatetime'], '未付款', $icpOrderId])) {
	
			}
		}
	
	}
	else {
		echo '<script>alert("訂單更新失敗");</script>';
	}

    // var_dump($finalAry); 
    // exit;
	unset($data['doAction']);

	
	// print_r($finalAry);
	// echo $resultCode;
//	exit;
}else{
	$sql_cancel = $pdo->prepare('update '.$table_name.' set orderStatus=? where orderNo = ?;');
	if($sql_cancel->execute(['訂單取消', $_POST['icpOrderId']])) {
		$sql_fail = $pdo->prepare('insert into transRecords values(?,?,?,?,?)');
		if($sql_fail->execute([$_POST['icpOrderId'], $_POST['mpId'], $resultCode, $resultMesg, date('YmdHis')])) {}
	}
	showMsg(null,$resultMesg);
}

function showMsg($fileName=null, $ErrMsg, $showCharset = "utf-8"){
	if($fileName == null){
		header('Content-type: text/html; charset=' . $showCharset);
		header('Vary: Accept-Language');
		// echo ("<SCRIPT Language='JavaScript' charset='" . $showCharset . "'>");
		// echo ("alert('" . $ErrMsg . "'); ");
		// echo ("</SCRIPT>");
		echo "<script Language='JavaScript' charset='".$showCharset."'>alert('訂單建立失敗 原因：".$ErrMsg."'');</script>";
		echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.html>';
		exit ();
	}else{
		if (!strlen($ErrMsg))
		{
			header('Content-type: text/html; charset=' . $showCharset);
			header('Vary: Accept-Language');
			echo ("<SCRIPT Language='JavaScript' charset='" . $showCharset . "'>");
			echo ("location='" . $fileName . "';");
			echo ("</SCRIPT>");
			echo "<script Language='JavaScript' charset='".$showCharset."'>alert('訂單建立失敗 原因：".$ErrMsg."');</script>";
			echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.html>';
			exit ();
		}
		else
		{
			header('Content-type: text/html; charset=' . $showCharset);
			header('Vary: Accept-Language');
			echo ("<SCRIPT Language='JavaScript' charset='" . $showCharset . "'>");
			echo ("alert('" . $ErrMsg . "'); ");
			echo ("location='" . $fileName . "';");
			echo ("</SCRIPT>");
			echo "<script Language='JavaScript' charset='".$showCharset."'>alert('訂單建立失敗 原因：".$ErrMsg."'');</script>";
			echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.html>';
			exit ();
		}
	}
}
?>

<script>
	var vatmAccount = <?php echo $finalAry['vatmAccount']; ?>;
	function pay4atm() {
		if (vatmAccount != '') {
			document.getElementById("atmAccount").style="display:block";
		}
	}
</script>
<body onload="pay4atm();">
<h1 style="margin-top: 10vh;"> <span>S</span>urvey<span>X</span></h1>

<div class="bg-agile">
		<div class="left-agileits-w3layouts-img">
			<h3>感謝您的購買</h3>
		</div>
		<div class="book-appointment">
			<h2>訂單資訊</h2>
			<div class="book-agileinfo-form">
			<form action="index.php" method="post" name="CallAuth" id="CallAuth">

				<div class="main-agile-sectns">
					<div class="agileits-btm-spc form-text1">
						<h3 class="css_h3"><?php echo '訂單編號：'.$icpOrderId; ?></h3>
					</div>
				</div>
				<div class="main-agile-sectns">
					<div class="agileits-btm-spc form-text2">
					<h3 class="css_h3"><?php echo '訂單金額：'.$price; ?></h3>
					</div>
				</div>
				<div id="atmAccount" style="display:none">
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text2">
						<h3 class="css_h3"><?php echo '轉帳帳戶：'.$finalAry['vatmAccount']; ?></h3>
						</div>
					</div>
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text2">
						<h3 class="css_h3"><?php echo '轉帳截止：'.$finalAry['expireDatetime']; ?></h3>
						</div>
					</div>
					
				</div>
				<br/>
				<div class="clear"></div>
				<!-- <input type="submit" value="確認"> -->
				<div class="clear"></div>
			</form>
		</div>	
	</div>
</div>
</body>
</html>