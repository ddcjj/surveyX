<!DOCTYPE HTML>
<?php session_start(); ?>
<html>
	<head>
		<title>SurveyX</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <!-- //Meta tags -->
        <!-- Facebook Fans Page -->
        <!-- <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v9.0" nonce="0BIbepto"></script> -->
        <!-- End Facebook Fans Page -->
        <!-- Stylesheet -->
        <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="../assets/css/fontawesome-all.min.css" rel='stylesheet' type='text/css'/>
        <link rel="Shortcut Icon" type="image/x-icon" href="../images/webicon.png" />
        <!-- //Stylesheet -->
        <!--fonts-->
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Montserrat+Alternates:200,400,500,600,700" rel="stylesheet">
        <!--//fonts-->
        <!-- Scripts -->
        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
        <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
        <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
        <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
        <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
        <script src="js/scripts.js"></script> <!-- Custom scripts -->
    </head>


    <body data-spy="scroll" data-target=".fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="../index.html"><img src="../images/LOGO@2x.png" alt="plapet"></a> 
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../index.html">?????? <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../project_manage.php">????????????</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="../member.php">????????????</a>
                    </li>
                </ul>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
	
<?php 
/**
* ???????????????UTF-8?????????
*/
// header('Content-type: text/html; charset=utf-8');
/**
* ??????Somp???Class
*/
require_once ("Somp.class.php");
/**
* ??????API??????????????????????????????post??????soap??????
*/
$method = "post";

date_default_timezone_set('Asia/Taipei');

// MMP????????????
// $frontHost = "https://mpay.so-net.net.tw/";
// $apiHost = "https://mpapi.so-net.net.tw/";

//MMP????????????
$frontHost = "https://mpay-dev.so-net.net.tw/";
$apiHost = "https://mpapi-dev.so-net.net.tw/";

//????????????
$icpId = "futureapp";

//??????????????????(????????????)
// $icpProdId = "surveyx";

/**
* So-net Micropayment????????????????????????????????????????????????
*/
$actionUrl = $frontHost . "paymentRule.php";

/**
* So-net Micropayment???Api Post??????
* $apiHost . "microPaymentPost.php"
* So-net Micropayment???Api Soap??????
* //?????????
* $apiHost . "xml/microPaymentServiceProd.wsdl"
* //?????????
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

?>