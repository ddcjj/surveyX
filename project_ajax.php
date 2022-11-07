<?php
header('Content-Type: application/json');

$pdo = new PDO('mysql:host=localhost; 
        dbname=surveyx_creator; 
        charset=utf8','root','password');

$con = mysqli_connect('localhost', 'root', 'password', 'surveyx_creator');

mysqli_set_charset($con, "utf8");//設定編碼為utf-8

date_default_timezone_set('Asia/Taipei');

$arrayRow = array();

$account = $_POST['account'];

if($_POST['command'] == 'insert') {
    if(!empty($_POST['q_title'])) {
        $sql = $pdo -> prepare('insert into question_table values(
                                ?,?,?,?,?,
                                ?,?,?,?,
                                ?,?,?,?,
                                ?,?,?,?)');
        $sql -> execute([$account, $_POST['project_name'], $_POST['q_no'],
            $_POST['q_title'], $_POST['q_form'], 
            $_POST['q_1'], $_POST['q_2'], 
            $_POST['q_3'], $_POST['q_4'], 
            $_POST['q_5'], $_POST['q_6'], 
            $_POST['q_7'], $_POST['q_8'], 
            $_POST['q_9'], $_POST['q_10'],
            date("YmdHis"), date("YmdHis")]);
        if(!file_exists('survey/'.$account.'/images')) {
            mkdir('survey/'.$account.'/images', 0700);
        }
        for($i=1; $i<=10; $i++) {
            if(is_uploaded_file($_FILES['q_'.$i.'_img']['tmp_name'])) {
                $q_image = 'survey/'.$account.'/images/'.$project_name.'_'.$_REQUEST['q_no'].'_'.$i.'.jpg';
                if(move_uploaded_file($_FILES['q_'.$i.'_img']['tmp_name'], $q_image)) {
                    echo $_FILES['q_'.$i.'_img']['name'], '上傳成功<br>';
                }
                else {
                    echo $_FILES['q_'.$i.'_img']['name'], '上傳失敗<br>';
                }
            }
        }
        $arrayRow = array("result" => true);  
    }
    else {
        $arrayRow = array("result" => false);  
    }
}
else {
    $arrayRow = array("result" => false);  
}
echo json_encode($arrayRow);

?>