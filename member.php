<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php session_start(); ?>
<html>
	<head>
		<title>SurveyX</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="pay/css/bootstrap.css" rel="stylesheet">
        <link href="pay/css/style.css" rel='stylesheet' type='text/css' />
        <link href="assets/css/fontawesome-all.min.css" rel='stylesheet' type='text/css'/>
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Montserrat+Alternates:200,400,500,600,700" rel="stylesheet">
        <link rel="Shortcut Icon" type="image/x-icon" href="images/webicon.png" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>

    <?php
        if(isset($_SESSION['account'])) {
            $rank = $_SESSION['rank'];
            switch($rank) {
                case 0:
                    $pay_url = 'pay/';
                    $pay_name = '繳交設定費';
                    break;
                case 1:
                    $pay_url = 'pay/rent.php';
                    $pay_name = '繳交月租費';
                    break;
                case 2:
                    $pay_url = '';
                    $pay_name = '';
                    break;
            }
        }
        else {
            header('Location: login.html?refer='. urlencode($_POST['refer']));
        }

        if(isset($_GET['logout'])) {
            unset($_SESSION['account']);
            unset($_SESSION['rank']);
            echo '<meta http-equiv=REFRESH CONTENT=0;url=index.html>';
        }
        $pdo = new PDO('mysql:host=localhost;
                        dbname=surveyx_creator;
                        charset=utf8','root','');
        foreach($pdo -> query('select * from member_profile where account="'.htmlspecialchars($_SESSION['account']).'";') as $row) {
            $c_name = $row['name'];
            $c_email = $row['email'];
            $c_phone = $row['tel'];
            $c_company = $row['company_name'];
            $uniform_numbers = $row['uniform_numbers'];
            $industry_category = $row['industry_category'];
        }
        date_default_timezone_set('Asia/Taipei');
        if(isset($_REQUEST['command'])) {
            switch ($_REQUEST['command']) {
                case 'update':
                    $sql = $pdo -> prepare('update member_profile set name=?, email=?, tel=?,
                                            company_name=?, uniform_numbers=?, industry_category=?,
                                            updateDate=? where account=?');
                    $sql -> execute([htmlspecialchars($_REQUEST['c_name']), $_REQUEST['c_email'],
                                    $_REQUEST['c_phone'], $_REQUEST['c_company'],
                                    $_REQUEST['uniform_numbers'], $_REQUEST['industry_category'],
                                    date("YmdHis"), $_SESSION['account']]);
                    $c_name = $_REQUEST['c_name'];
                    $c_email = $_REQUEST['c_email'];
                    $c_phone = $_REQUEST['c_phone'];
                    $c_company = $_REQUEST['c_company'];
                    $uniform_numbers = $_REQUEST['uniform_numbers'];
                    $industry_category = $_REQUEST['industry_category'];
                    echo '<script>alert("會員資料更新成功")</script>';
                    break;
                
            }
        }
    ?>
    <script>
        var pay_url = '<?php echo $pay_url ?>';
        var pay_name = '<?php echo $pay_name ?>';
        function payLoad() {
            if(pay_url != '') {
                document.getElementById('pay_zone').style="display:block";
            }
        }
        function pay(url) {
            location.href= url;
        }
    </script>

    <script>
        function logOut() {
            location.href="member.php?logout=";
        }
    </script>

<body class="is-preload" onload="payLoad();">
        <!-- Header -->
        <header id="header">
            <a href="index.html" class="title">SurveyX</a>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="project_manage.php">專案管理</a></li>
                    <li><a href="member.php" class="active">會員資料</a></li>
                </ul>
            </nav>
        </header>

	<div class="bg-agile" style="margin-top:6vh">
		<div class="left-agileits-w3layouts-img">
            <h3 style="margin-bottom:12vh">會員資料</h3>
            <div class="main-agile-sectns">
               <a href="modify_password.php" style="color:#ffffff">修改密碼</a>
            </div>
            <div class="main-agile-sectns">
                <button type="button" style="color:#000000;
                    background-color:#27f3d6;border-radius:30px;
                    margin:0 auto;padding:0 3em;height:3em;" onclick="logOut();">登出</a>
            </div>
		</div>
		
		<div class="book-appointment">
			<h2>個人/公司資料</h2>
			<div class="book-agileinfo-form">
				<form action="member.php" method="POST">
                    <input type="hidden" name="command" value="update" >
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text1">
							<p style="color:white">姓名：</p>
							<input type="text" name="c_name" value="<?php echo $c_name; ?>" >
						</div>
					</div>
					<div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text2">
							<p style="color:white">聯絡電話：</p>
                            <input type="tel" name="c_phone" placeholder="手機號碼" required 
                            ime-mode:disabled value="<?php echo $c_phone; ?>" readonly
						　　 onkeydown="if(event.keyCode==13)event.keyCode=9" onKeyPRess="if
						　　 ((event.keyCode<48 || event.keyCode>57)) event.returnValue=false">
						</div>
					</div>
					<div class="agileits-btm-spc form-text">
						<p style="color:white">聯絡信箱：</p>
						<input type="email" name="c_email" value="<?php echo $c_email; ?>" >
                    </div>
                    <div class="agileits-btm-spc form-text">
                        <p style="color:white">公司名稱：</p>
                        <input type="text" name="c_company" value="<?php echo $c_company; ?>" >
                    </div>
                    <div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text2">
							<p style="color:white">統一編號：</p>
                            <input type="text" name="uniform_numbers" placeholder="統一編號" 
                            ime-mode:disabled value="<?php echo $uniform_numbers; ?>"
						　　 onkeydown="if(event.keyCode==13)event.keyCode=9" onKeyPRess="if
						　　 ((event.keyCode<48 || event.keyCode>57)) event.returnValue=false">
						</div>
                    </div>
                    <div class="main-agile-sectns">
						<div class="agileits-btm-spc form-text1">
							<p style="color:white">產業類別：</p>
							<input type="text" name="industry_category" value="<?php echo $industry_category; ?>" >
						</div>
					</div>
					<br/>
					<div class="clear"></div>
                    <input type="submit" value="修改" style="padding:0">
                    <div id="pay_zone" class="main-agile-sectns" style="display:none">
                        <input type="button" value="<?php echo $pay_name; ?>" class="pay_button" style="background-color:#ffffff;
                                    color: #000000;float:right;width:49%;margin-top:1rem;height:8vh;
                                    border-radius:60px;font-size:1em;font-weight:bold;" onclick="pay('<?php echo $pay_url; ?>')">
                    </div>
                   
					<div class="clear"></div>
				</form>
			</div>
	</div>
	<!--copyright-->
	<!-- <div class="copy-w3layouts">
		<p>&copy; 2018.  . All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a>			</p>
	</div> -->
	<!--//copyright-->
	<script type="text/javascript" src="pay/js/jquery-2.2.3.min.js"></script>
	
	<script src="pay/js/jquery-ui.js"></script>
    </body>
</html>
