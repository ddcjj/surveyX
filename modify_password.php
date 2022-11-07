<?php require 'common.php' ?>
<?php
if(isset($_REQUEST['account'])) {
    $account = htmlspecialchars($_REQUEST['account']);
    $pdo = new PDO('mysql:host=localhost;dbname=surveyx_creator;charset=utf8','root','');
    foreach($pdo->query('select tel from member_profile where account="'.$account.'";') as $row) {
        $tel = $row['tel'];
    }
    $_SESSION['modify_password'] = $account;
}
else {
    $account = '';
    $tel = '';
}
?>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-app.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-analytics.js"></script>
<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-auth.js"></script>	
<script src="assets/js/firebase.js"></script>
<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyC16kWbX6OIgG4wFJRh_raMii86hyelal8",
        authDomain: "surveyx-965ac.firebaseapp.com",
        projectId: "surveyx-965ac",
        storageBucket: "surveyx-965ac.appspot.com",
        messagingSenderId: "499062675104",
        appId: "1:499062675104:web:ba3ba779bf9e90f0241bc5",
        measurementId: "G-BXHYPBBCVN"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
<script>
    var account = '<?php echo $account ?>';
    var tel = '<?php echo $tel ?>';
    function check() {
        if(account!="" && tel!="") {
            document.getElementById('code_zone').style="display:block";
            document.getElementById('confirm_zone').style="display:none";
        }
    }
    function onConfirmClick() {
        const code = document.getElementById('auth_code').value;
            confirmationResult.confirm(code).then((result) => {
                // User signed in successfully.
                const user = result.user;
                document.getElementById('confirm_status').value="驗證成功";
                document.getElementById('password_zone').style="display:block";
                alert('驗證成功');

            }).catch((error) => {
                document.getElementById('confirm_status').value="驗證失敗";
                alert('驗證失敗： 驗證碼輸入錯誤');
            });
    }
     
    function checkPassword() {
        var new_password = document.getElementById('new_password').value;
        var confirm_password = document.getElementById('confirm_password').value;
        if(new_password == confirm_password) {
            return true;
        }
        else {
            alert('請再次確認輸入的密碼是否相同！')
            return false;
        }
    }
</script>
<body onload="check()">
<div id="wrapper">
    <section id="main" class="wrapper">
        <div class="inner">
            <h2 class="major">密碼變更</h2>
            <form id="confirm_zone" action="modify_password.php" method="POST">
                <label for="account">帳號：</label>
                <input type="text" name="account" id="account">
                <input type="submit" value="確認" style="margin-top:3vh;">
            </form>
            <div id="code_zone" style="display:none">
                <form method="POST" action="password.php" onsubmit="return checkPassword()">
                    <div class="col-6 col-12-xsmall">
                        <label for="customer_tel">手機號碼：</label>
                        <input type="tel" style="line-height: 2.75;" name="customer_tel" id="customer_tel" value="<?php echo $tel ?>" readonly/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <button type="button" id="get_code" class="register_button" style="color: aliceblue;" onclick="onGetClick();">取得驗證碼</button>
                        <div id="recaptcha-container" name="recaptcha-container"></div>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label for="auth_code" style="margin-top:3vh;">驗證碼：</label>
                        <input type="text" style="line-height: 2.75;" name="auth_code" id="auth_code" minlength="6" maxlength="6" placeholder="驗證碼" required/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <button type="button" id="confirm_code" class="register_button" style="color: aliceblue;" onclick="onConfirmClick();">驗證手機</button>
                    </div>
                    <div class="col-2">
                        <input type="text" style="text-align: center;width:16vh;margin-top:3vh" id="confirm_status" name="confirm_status" value="未驗證" readonly />
                    </div>
                    <div id="password_zone" style="display:none">
                        <div class="col-12">
                            <label for="customer_password" style="margin-top:3vh;">輸入新密碼：(至少8碼)</label>
                            <input type="password" name="new_password" id="new_password" minlength="8" maxlength="30" placeholder="新密碼" required/>
                        </div>
                        <div class="col-12">
                            <label for="confirm_password" style="margin-top:3vh;">確認新密碼：</label>
                            <input type="password" name="confirm_password" id="confirm_password" minlength="8" maxlength="30" placeholder="確認新密碼" required/>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" style="margin-top:3vh;" value="更新密碼" class="primary" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div>

            </div>
        </div>
    </section>
</div>
            
</body>
</html>
