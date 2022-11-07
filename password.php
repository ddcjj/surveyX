<?php require 'common.php' ?>
<?php
date_default_timezone_set('Asia/Taipei');
if(isset($_SESSION['modify_password'])) {
    $account = $_SESSION['modify_password'];
    unset($_SESSION['modify_password']);
    if($_POST['confirm_status']=='驗證成功') {
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $pdo = new PDO('mysql:host=localhost;
                        dbname=surveyx_creator;
                        charset=utf8','root','');
        $sql = $pdo->prepare('update member_profile set password = ?, updateDate=? where account = ?');
        if($sql->execute([$password, date("YmdHis"), $account])) {
            echo '<script>alert("密碼更新成功");</script>';
            echo '<meta http-equiv=REFRESH CONTENT=0;url=login.html>';
        }
    }
}
?>