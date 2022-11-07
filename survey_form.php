<?php
    header('Content-Type: application/json');

    $pdo = new PDO('mysql:host=localhost; 
                    dbname=surveyx_creator; 
                    charset=utf8','root','password');
    mysqli_set_charset($con, "utf8");//設定編碼為utf-8

    date_default_timezone_set('Asia/Taipei');

    $checkResult = array();

    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $company = isset($_POST['company']) ? $_POST['company'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
    $lf = isset($_POST['lf']) ? $_POST['lf'] : "";
    $time = isset($_POST['time']) ? $_POST['time'] : "";

    // check email valid start
    $url = "https://sift.email/api";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer atjsVNv4rce8iQIkSJu2T6TREeIgYPAeBxg3sQuLg724zt04LqTLayLG7OraLp1O",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    // pet loop start
    $arrayRow = array();
    
    $data = '{
        "email": "'.$email.'"
    }';
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    $resp = json_decode($resp,true);

    $arrayRow['valid_format'] = $resp['valid_format'];
    $arrayRow['disposable'] = $resp['disposable'];
    // check email valid end

    $sql = $pdo -> prepare('insert customer values(null,?,?,?,?,?,?,null,null,null,null,?);');
    if($sql -> execute([$name, $company, $email, $phone, $lf, $time, date("YmdHis")])) {
        $checkResult['result'] = true;
    } else {
        $checkResult['result'] = false;
    }
    

    echo json_encode($checkResult);
?>