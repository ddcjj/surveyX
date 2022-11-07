<?php require 'common.php'; ?>
    <?php
    if(isset($_SESSION['account'])) {
        $account = $_SESSION['account'];
    }
    else {
        echo "<script>alert('請先登入');</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
    }
    if(isset($_REQUEST['project_name'])) {
        $project_name = $_REQUEST['project_name'];
    }
    else {

    }
    if(isset($_REQUEST['project_title'])) {
        $project_title = $_REQUEST['project_title'];
    }
    if(isset($_REQUEST['ga_head'])) {
        $ga_head = $_REQUEST['ga_head'];
    }
    if(isset($_REQUEST['ga_body'])) {
        $ga_body = $_REQUEST['ga_body'];
    }
    if(isset($_REQUEST['fb_code'])) {
        $fb_code = $_REQUEST['fb_code'];
    }
    if(isset($_REQUEST['talking_date'])) {
        $talking_date = $_REQUEST['talking_date'];
    }
    if(isset($_REQUEST['talking_time'])) {
        $talking_time = $_REQUEST['talking_time'];
    }
    if(isset($_REQUEST['bg_type'])) {
        $bg_type = $_REQUEST['bg_type'];
    }
    

    if(is_uploaded_file($_FILES['background_image']['tmp_name'])) {
        if(!file_exists('survey/'.$account)) {
            mkdir('survey/'.$account, 0700);
        }
        if(!file_exists('survey/'.$account.'/images')) {
            mkdir('survey/'.$account.'/images', 0700);
        }
        $bg_img = 'survey/'.$account.'/images/'
            .basename($_FILES['background_image']['name']);
        if(move_uploaded_file($_FILES['background_image']['tmp_name'], $bg_img)) {
            echo $_FILES['background_image']['name'], '上傳成功<br>';
            echo '<p><img src="', $bg_img, '"></p>';
        }
        else {
            echo $_FILES['background_image']['name'], '上傳失敗<br>';
        }
    }
    else {
        echo '請選擇檔案';
    }
    if(is_uploaded_file($_FILES['logo_image']['tmp_name'])) {
        if(!file_exists('survey/'.$account)) {
            mkdir('survey/'.$account, 0700);
        }
        if(!file_exists('survey/'.$account.'/images')) {
            mkdir('survey/'.$account.'/images', 0700);
        }
        $logo_img = 'survey/'.$account.'/images/'
            .basename($_FILES['logo_image']['name']);
        if(move_uploaded_file($_FILES['logo_image']['tmp_name'], $logo_img)) {
            echo $_FILES['logo_image']['name'], '上傳成功<br>';
            echo '<p><img src="', $logo_img, '"></p>';
        }
        else {
            echo $_FILES['logo_image']['name'], '上傳失敗<br>';
        }
    }
    else {
        echo '請選擇檔案';
    }

    $pdo = new PDO('mysql:host=localhost; 
            dbname=surveyx_creator;
            charset=utf8','root','');
    
    $sql = $pdo->prepare('insert into project_table 
                            values(
                            ?,?,?,?,?,
                            ?,?,?,?,?,
                            ?,?,?)');
    
    if($sql -> execute([$account, $project_name, $project_title, 
        $ga_head, $ga_body, $fb_code, $talking_date, $talking_time, 
        basename($_FILES['background_image']['name']), $bg_type, 
        basename($_FILES['logo_image']['name']),
        date('YmdHis'), date('YmdHis')])) {
        echo "<script>alert('專案新增成功');</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=project_manage.php>';
    }
    else {
        echo "<script>alert('專案名稱重複');</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=project_add.html>';
    }

    ?>


    <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>