<?php
    $pdo = new PDO('mysql:host=localhost;
    dbname=surveyx_creator;
    charset=utf8','root','password');

    $con = mysqli_connect('localhost', 'root', 'password', 'surveyx_creator');

    mysqli_set_charset($con, "utf8");//設定編碼為utf-8

    date_default_timezone_set('Asia/Taipei');
?>