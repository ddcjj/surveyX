<?php
require_once ("common.php");

$resultCode = $_POST['resultCode'];
$resultMesg = $_POST['resultMesg'];
$icpId = $_POST['icpId'];
$orderNo = $_POST['sonetOrderNo'];

echo "<script>alert('購買失敗，請洽客服');</script>";
echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.html>';

showMsg(null,$resultMesg);

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