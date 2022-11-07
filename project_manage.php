<?php require 'common.php' ?>
    <table style="width:100%;table-layout:fixed;word-break:break-all;">
        <tr><th>專案名稱</th><th>問卷標題</th><th colspan="2">網址</th><th></th><th></th><th></th></tr>
    <?php 
    if(isset($_SESSION['account'])) {
        $account = $_SESSION['account'];
        if($_SESSION['rank'] == 0) {
            echo "<script>alert('請先付設定費');</script>";
            echo '<meta http-equiv=REFRESH CONTENT=0;url=member.php>';
        }
    }
    else {
        echo "<script>alert('請先登入');</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
    }
    $pdo = new PDO('mysql:host=localhost;dbname=surveyx_creator;charset=utf8','root','');
    foreach($pdo -> query('select * from project_table where project_account="'.htmlspecialchars($account).'";') as $row) {
        echo '<tr>';
        echo '<form method="POST" action="project.php">';
        echo '<input type="hidden" name="account" value="', $row['project_account'], '">';
        echo '<input type="hidden" name="project_name" value="', $row['project_name'], '">';
        echo '<td>', $row['project_name'], '</td>';
        echo '<td>', $row['project_title'], '</td>';
        echo '<td colspan="2"><a href="https://www.surveyx.tw/survey/', $account,'/', $row['project_name'],'.php" target="_blank">https://www.surveyx.tw/survey/', $account,'/', $row['project_name'],'.php</a></td>';
        echo '<td><input type="submit" value="修改"></td>';
        echo '</form>';
        echo '<form method="POST" action="chart/chart_output.php" target="_blank">';
        echo '<input type="hidden" name="account" value="', $row['project_account'], '">';
        echo '<input type="hidden" name="project_name" value="', $row['project_name'], '">';
        echo '<td><input type="submit" value="匯出圖表"></td>';
        echo '</form>';
        echo '<form method="POST" action="chart/csv.php">';
        echo '<input type="hidden" name="account" value="', $row['project_account'], '">';
        echo '<input type="hidden" name="project_name" value="', $row['project_name'], '">';
        echo '<td><input type="submit" value="匯出CSV"></td>';
        echo '</form>';
        echo '</tr>';
    }
    
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><a href="project_add.html" class="button scrolly" style="padding-top:3vh;padding-bottom:3vh;">新增</a></td>
        <td></td>
        <td></td>
    </tr>
    </table>
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