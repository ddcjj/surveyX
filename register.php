<?php require 'common.php' ?>
        <div id="wrapper">
        <?php
        if(isset($_POST['customer_account'])){
            $account = htmlspecialchars($_POST['customer_account']);
        }
        if(isset($_POST['customer_password'])){
            $password = password_hash($_POST['customer_password'], PASSWORD_DEFAULT);
        }
        if(isset($_POST['customer_name'])){
            $name = $_POST['customer_name'];
        }
        if(isset($_POST['customer_email'])){
            $email = $_POST['customer_email'];
        }
        if(isset($_POST['customer_tel'])){
            $tel = $_POST['customer_tel'];
        }
        if(isset($_POST['company_name'])){
            $company_name = $_POST['company_name'];
        }
        if(isset($_POST['uniform_numbers'])){
            $uniform_numbers = $_POST['uniform_numbers'];
        }
        if(isset($_POST['industry_category'])) {
            $industry_category = $_POST['industry_category'];
        }

        $pdo = new PDO('mysql:host=localhost; 
                    dbname=surveyx_creator; 
                    charset=utf8','root','');
        $sql = $pdo->prepare('insert into member_profile 
                            values(null,
                            ?,?,?,?,?,
                            ?,?,?,?,?,
                            ?)');

        if($sql->execute([
                        $account, $password, 0, $name, $email, $tel, 
                        $company_name, $uniform_numbers, $industry_category, 
                        date('YmdHis'), date('YmdHis')])) {
            echo '<script>alert("註冊成功")</script>';
        }
        else {
            echo '<script>alert("註冊失敗")</script>';
        }
        ?>
            <?php   
            $url = "index.html"; 
            ?>
            <html>   
            <head>   
            <meta http-equiv="refresh" content="1;url=<?php echo $url; ?>">   
            </head>   
            <body> 
            </body>
            </html>
        </div>
    </body>
</html>
