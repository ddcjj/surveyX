<?php require 'common.php' ?>

<?php
if(isset($_SESSION['account'])) {
	$account = $_SESSION['account'];
}
else {
	echo "<script>alert('請先登入');</script>";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=../login.html>';
}
$pdo = new PDO('mysql:host=localhost;
				dbname=surveyx_creator;
				charset=utf8','root','password');
foreach($pdo -> query('select * from member_profile where account="'.htmlspecialchars($_SESSION['account']).'";') as $row) {
	$c_name = $row['name'];
	$c_email = $row['email'];
	$c_phone = $row['tel'];
	$c_company = $row['company_name'];
	$uniform_numbers = $row['uniform_numbers'];
}
?>

</head>
	<br/><br/>
	<h1 style="margin-top:6vh"> <span>S</span>urvey<span>X</span></h1>
	<div class="bg-agile">
		<div class="left-agileits-w3layouts-img">
			<h3>您購買的內容</h3>
			<div><p>設定費：6000</p></div>
			<div><p>訂金：2000</p></div>
			<p>- 總計：NT$ 8000 -</p>
		</div>
		
		<div class="book-appointment">
			<h2>聯絡方式</h2>
			<div class="book-agileinfo-form">
				<form action="confirmPayment.php" method="POST">
					<input type="hidden" name="charge4w" value="charge4setUp">
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text1">
							<p style="color:white">姓名：</p>
							<input type="text" name="c_name" value="<?php echo $c_name; ?>" readonly>
						</div>
					</div>
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text1">
							<p style="color:white">公司名稱：</p>
							<input type="text" name="c_company" value="<?php echo $c_company; ?>" readonly>
						</div>
					</div>
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text2">
							<p style="color:white">統一編號：</p>
							<input type="text" name="uniform_numbers" value="<?php echo $uniform_numbers; ?>" readonly>
						</div>
					</div>
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text2">
							<p style="color:white">聯絡電話：</p>
							<input type="text" name="c_phone" value="<?php echo $c_phone; ?>" class="tel_type" readonly>
						</div>
					</div>
					<div class="agileits-btm-spc form-text">
						<p style="color:white">聯絡信箱：</p>
						<input type="email" name="c_email" value="<?php echo $c_email; ?>" readonly>
					</div>
					<div class="wthree-text">
						<h6>付款方式</h6>
							<ul class="radio-w3ls">
								<li>
									<input type="radio" id="credit_card" name="pay_method" value="CYC_CITI" required>
									<label for="credit_card">信用卡</label>
									<div class="check">
										<div class="inside"></div>
									</div>
								</li>
								<li>
									<input type="radio" id="ATM" name="pay_method" value="vATM_FCB">
									<label for="ATM">ATM轉帳</label>
									<div class="check">
										<div class="inside"></div>
									</div>
								</li>
							</ul>
							<div class="clear"></div>
					</div>
					<br/>
					<div class="main-agile-sectns">
						<h3 class="css_h3">「按下結帳按鈕代表您同意我們的<a href="#" target="_blank" style="color:#ffffff">服務條款</a>」</h3>
					</div>
					<div class="clear"></div>
					
					<input type="submit" value="結帳">
					<div class="clear"></div>
				</form>
			</div>
	</div>
	<!--copyright-->
	<!-- <div class="copy-w3layouts">
		<p>&copy; 2018.  . All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a>			</p>
	</div> -->
	<!--//copyright-->
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<!-- Time -->
	<script type="text/javascript" src="js/wickedpicker.js"></script>
	<!-- <script type="text/javascript">
		$('.timepicker').wickedpicker({
			twentyFour: false
		});
	</script> -->
	<!--// Time -->
	<!-- Calendar -->
	<script src="js/jquery-ui.js"></script>
	<!-- <script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script> -->
	<!-- //Calendar -->

</body>

</html>