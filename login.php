<?php require 'common.php'; ?>
        <div id="wrapper">
            <?php
                $account = $_POST['account'];
                $password = $_POST['password'];
                $con = mysqli_connect("localhost", "root", "", "surveyx_creator");
                
                $sql = "select * from member_profile where account='".htmlspecialchars($account)."'";
                $result = mysqli_query($con, $sql);
                $row = @mysqli_fetch_row($result);

                if($account != null && $password != null 
                && $row[1] == $account && password_verify($password, $row[2])) {
                    $_SESSION['account'] = $account;
                    $_SESSION['rank'] = $row[3];
                    echo "<script>alert('登入成功');</script>";
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
                }
                else {
                    echo "<script>alert('登入失敗');</script>";
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
                }
            ?>
        </div>
        </body>
</html>