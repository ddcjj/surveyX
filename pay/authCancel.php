<?php
require_once ("common.php");
print_r($_POST);

$resultCode = $_POST['resultCode'];
$resultMesg = $_POST['resultMesg'];
$icpId = $_POST['icpId'];
$orderNo = $_POST['sonetOrderNo'];

$pdo = new PDO('mysql:host=localhost;
				dbname=plapet_order;
				charset=utf8','root','password');

showMsg(null,$resultMesg);

echo "<script>alert('購買失敗，請洽客服');</script>";
echo '<meta http-equiv=REFRESH CONTENT=1;url=../shopping_cart.html>';

function showMsg($fileName=null, $ErrMsg, $showCharset = "utf-8"){
	if($fileName == null){
		header('Content-type: text/html; charset=' . $showCharset);
		header('Vary: Accept-Language');
		echo ("<SCRIPT Language='JavaScript' charset='" . $showCharset . "'>");
		echo ("alert('" . $ErrMsg . "'); ");
		echo ("</SCRIPT>");
		exit ();
	}else{
		if (!strlen($ErrMsg))
		{
			header('Content-type: text/html; charset=' . $showCharset);
			header('Vary: Accept-Language');
			echo ("<SCRIPT Language='JavaScript' charset='" . $showCharset . "'>");
			echo ("location='" . $fileName . "';");
			echo ("</SCRIPT>");
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
			exit ();
		}
	}
}
?>