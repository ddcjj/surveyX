
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta charset='utf-8'/>
<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'/>
<link rel='stylesheet' href='../assets/css/main.css' />
</head>
<body class='landing is-preload'>
<?php

    $pdo_q = new PDO('mysql:host=localhost; 
    dbname=surveyx_questionnaire; 
    charset=utf8','root','password');
    date_default_timezone_set('Asia/Taipei');
    
$sql_q = $pdo_q->prepare('insert into gura_q values(null ,? )');
    if($sql_q->execute([date("YmdHis")])){

    }?>
</div>
    <div id="page-wrapper" style="background: url('images/');">
			<!-- Banner -->
            <section class="css_div">
				<img src="images/" width="100%">
			</section>
			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2 class="css_h2">感謝您撥空填寫問卷！
								<br/>
								歡迎點選下⽅加好友
								<br/>
								獲得第一手資訊！
							</h2>
							<div>
								<ul class="box">
									<li><a href="" class="button primary">加好友</a></li>
								</ul>
							</div>
						</header>
						<img src="images/" width="100%">
					</section>

				</section>
		</div>

    <!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery.dropotron.min.js"></script>
        <script src="../assets/js/jquery.scrollex.min.js"></script>
        <script src="../assets/js/browser.min.js"></script>
        <script src="../assets/js/breakpoints.min.js"></script>
        <script src="../assets/js/util.js"></script>
        <script src="../assets/js/main.js"></script>
</body>
</html>