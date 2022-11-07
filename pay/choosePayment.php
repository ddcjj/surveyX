<?php
	require_once ("common.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>
<body>
<form method="post" action="confirmPayment.php">
<input type="hidden" name="icpId" id="icpId" value="<?php echo $icpId; ?>">

<!--商家自訂交易回傳URL-->
<input type="hidden" name="returnUrl" id="returnUrl" value="http://182.233.181.73/mmp/authSuccess.php">
<table>
	<tr>
		<td>付款方式</td>
            [信用卡]：　
            <input type="radio" name="mpId" value="CITI">信用卡付款
		</td>


		[小額計次]：　　
                <input type="radio" name="mpId" value="OTPCHT">中華市話
                <input type="radio" name="mpId" value="OTP839">中華839
			    <input type="radio" name="mpId" value="FET">遠傳/和信電信
			    <input type="radio" name="mpId" value="TCC">台灣大哥大
                <input type="radio" name="mpId" value="APT">亞太電信
                <input type="radio" name="mpId" value="HINET">HiNet
                <input type="radio" name="mpId" value="TSTART">台灣之星
	</tr>
	<tr>
		<td>訂單編號</td>
		<td>
		<input type="text" name="icpOrderId" id="icpOrderId" maxlength="20" value="<?php echo date("Ymdhis"); ?>">
		</td>
	</tr>
	<tr>
		<td>產品編號</td>
		<td>
			<input type="text" name="icpProdId" id="icpProdId" value="<?php echo $icpProdId; ?>">
		</td>
	</tr>
	<tr>
		<td>消費者識別碼</td>
		<td>
			<input type="text" name="icpUserId" id="icpUserId" value="test_user">
		</td>
	</tr>
	<tr>
		<td>Memo</td>
		<td>
	<input type="text" name="memo" id="memo" value="test">
		</td>
	</tr>
	<!--以下為信用卡/超商付費/虛擬ATM代碼繳費交易必傳參數值-->
	<tr>
		<td>商品名稱</td>
		<td>
	<input type="text" name="icpProdDesc" id="icpProdDesc" value="測試商品名稱">
		</td>
	</tr>
		<tr>
		<td>商品金額</td>
		<td>
	<input type="text" name="price" id="price" value="1">
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="送出"></td>
	</tr>
</table>
</form>
</body>