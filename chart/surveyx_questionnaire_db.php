<?php
$pdo = new PDO('mysql:host=localhost; 
dbname=surveyx_questionnaire;
charset=utf8','root','');

$con = mysqli_connect('localhost', 'root', '', 'surveyx_questionnaire');

mysqli_set_charset($con, "utf8");//設定編碼為utf-8

date_default_timezone_set('Asia/Taipei');
?>