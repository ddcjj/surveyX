<?php require 'common.php' ?>

<script type="text/javascript" language="javascript">
    function checkfile(sender) {

        // 可接受的附檔名
        var validExts = new Array(".jpeg", ".jpg", ".png");

        var fileExt = sender.value;
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (validExts.indexOf(fileExt) < 0) {
            alert("檔案類型錯誤，可接受的副檔名有：" + validExts.toString());
            sender.value = null;
            return false;
        }
        else return true;
    }
</script>

    <table style="width:100%;table-layout:fixed;word-break:break-all;">
        <?php
        $password = '';
        $pdo = new PDO('mysql:host=localhost;dbname=surveyx_creator;charset=utf8','root',$password);
    
        if(isset($_SESSION['account'])) {
            $account = $_SESSION['account'];
            if(isset($_REQUEST['project_name'])) {
                $project_name = $_REQUEST['project_name'];
            }
        }
        else {
            echo "<script>alert('請重新登入');</script>";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=login.html>';
        }

        if(isset($_REQUEST['command'])) {
            switch ($_REQUEST['command']) {
                case 'insert':
                    if(empty($_REQUEST['q_title'])) break;
                    $sql = $pdo -> prepare('insert into question_table values(
                                            ?,?,?,?,?,
                                            ?,?,?,?,
                                            ?,?,?,?,
                                            ?,?,?,?)');
                    $sql -> execute([$account, $project_name, $_REQUEST['q_no'],
                        $_REQUEST['q_title'], $_REQUEST['q_form'], 
                        $_REQUEST['q_1'], $_REQUEST['q_2'], 
                        $_REQUEST['q_3'], $_REQUEST['q_4'], 
                        $_REQUEST['q_5'], $_REQUEST['q_6'], 
                        $_REQUEST['q_7'], $_REQUEST['q_8'], 
                        $_REQUEST['q_9'], $_REQUEST['q_10'],
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

                break;
                case 'update':
                    if(empty($_REQUEST['q_title'])) break;
                    $sql = $pdo -> prepare('update question_table set q_title=?, q_form=?, 
                        q_1=?, q_2=?, q_3=?, q_4=?, q_5=?, q_6=?, 
                        q_7=?, q_8=?, q_9=?, q_10=?, updateDate=? where creator_account=? and project_name=? and q_no=?');
                    $sql -> execute([$_REQUEST['q_title'], $_REQUEST['q_form'], 
                        $_REQUEST['q_1'], $_REQUEST['q_2'], $_REQUEST['q_3'], $_REQUEST['q_4'], 
                        $_REQUEST['q_5'], $_REQUEST['q_6'], $_REQUEST['q_7'], $_REQUEST['q_8'], 
                        $_REQUEST['q_9'], $_REQUEST['q_10'], date("YmdHis"), $account, $project_name, $_REQUEST['q_no']]);
                break;
                case 'delete':
                    $sql = $pdo -> prepare('update question_table set q_title=?, q_form=?, 
                        q_1=?, q_2=?, q_3=?, q_4=?, q_5=?, q_6=?, 
                        q_7=?, q_8=?, q_9=?, q_10=?, updateDate=? where creator_account=? and project_name=? and q_no=?');
                    $sql -> execute(['', '', 
                        '', '', '', '', 
                        '', '', '', '', 
                        '', '', date("YmdHis"), $account, $project_name, $_REQUEST['q_no']]);
                break;
            }
        }
        $q_no = 0;
        foreach ($pdo -> query('select * from question_table where creator_account="'.htmlspecialchars($account).'" and project_name="'.htmlspecialchars($project_name).'" order by q_no asc;') as $row) {
            $q_no += 1;
            echo '<form action="project.php" method="POST">',"\n";
            echo '<input type="hidden" name="command" value="update">',"\n";
            echo '<input type="hidden" name="project_name" value="', $row['project_name'], '">',"\n";
            echo '<input type="hidden" name="q_no" value="', $q_no,'">',"\n";
            echo '<tr>',"\n";
            echo '<td><input type="text" style="text-align:center;background-color:#27f3d6;color:#000000;" name="q_no" value="', $q_no, '" readonly="readonly"></td>',"\n";
            echo '<td rowspan="2" colspan="3"><textarea name="q_title" rows="3" >', $row['q_title'],'</textarea></td>',"\n";
            echo '</tr>',"\n";
            echo '<tr>',"\n";
            echo '<td>',"\n";
            echo '<select name="q_form">',"\n";
            echo '<option value="', $row['q_form'],'">[原本]', $row['q_form'],'</option>',"\n";
            echo '<option>單選</option>',"\n";
            echo '<option>多選</option>',"\n";
            echo '<option>填空</option>',"\n";
            echo '<option>展示</option>',"\n";
            echo '</select>',"\n";
            echo '</td>',"\n";
            echo '</tr>',"\n";
            for($j=1; $j<=4; $j++) {
                echo '<tr>',"\n";
                echo '<td>選項'.$j.'</td>',"\n";
                echo '<td colspan="3">',"\n";
                echo '<input type="text" name="q_'.$j.'" value="', $row['q_'.$j], '">',"\n";
                echo '</td>',"\n";
                echo '</tr>',"\n";
            }
            for($j=5; $j<=10; $j++) {
                echo '<tr id="tr_'.$q_no.'_'.$j.'" style="display:none">',"\n";
                echo '<td>選項'.$j.'</td>',"\n";
                echo '<td colspan="3">',"\n";
                echo '<input type="text" name="q_'.$j.'" value="', $row['q_'.$j], '">',"\n";
                echo '</td>',"\n";
                echo '</tr>',"\n";
            }
            echo '<tr>',"\n";
            echo '<td><input type="button" value="展開" onclick="show_tr_'.$q_no.'()"></td>',"\n";
            echo '<td><input type="button" value="隱藏" onclick="hide_tr_'.$q_no.'()"></td>',"\n";
            echo '<script>',"\n";
            for($k=5; $k<=10; $k++) {
                echo 'var tr_'.$q_no.'_'.$k.'_style = document.getElementById("tr_'.$q_no.'_'.$k.'").style;',"\n";
            }
            echo 'function show_tr_'.$q_no.'() {',"\n";
            for($l=5; $l<=10; $l++) {
                echo 'if(tr_'.$q_no.'_'.$l.'_style.display != "none") {',"\n";
            }
            for($l=10; $l>=5; $l--) {
                echo '}',"\n";
                echo 'else {tr_'.$q_no.'_'.$l.'_style.display = "table-row";}',"\n";
            }
            echo '}',"\n";
            echo 'function hide_tr_'.$q_no.'() {',"\n";
            for($m=10; $m>=5; $m--) {
                echo 'if(tr_'.$q_no.'_'.$m.'_style.display != "table-row") {',"\n";
            }
            for($m=5; $m<=10; $m++) {
                echo '}',"\n";
                echo 'else {tr_'.$q_no.'_'.$m.'_style.display = "none";}',"\n";
            }
            echo '}',"\n";
            echo '</script>',"\n";
            echo '</tr>',"\n";
            echo '<tr>',"\n";
            echo '<td><input type="submit" value="確定修改"></td>',"\n";
            echo '</form>',"\n";
            echo '<form action="project.php" method="POST">',"\n";
            echo '<input type="hidden" name="command" value="delete">',"\n";
            echo '<input type="hidden" name="project_name" value="', $row['project_name'], '">',"\n";
            echo '<input type="hidden" name="q_no" value="', $q_no, '">',"\n";
            echo '<td><input type="submit" value="確定刪除"></td>',"\n";
            echo '</form>',"\n";
            echo '</tr>';
            echo "\n";
        }
        ?>
        <form id="ajax_project" action="project.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="command" value="insert">
            <input type="hidden" name="account" value="<?php echo $account; ?>">
            <input type="hidden" name="project_name" value="<?php echo $project_name; ?>">
            <tr id="newone">
                <td><input type="text" style="text-align:center;background-color:#27f3d6;color:#000000;" name="q_no" value="<?php echo $q_no+1; ?>" readonly="readonly"></td>
                <td rowspan="2" colspan="3"><textarea name="q_title" rows="3" ></textarea></td>  
            </tr> 
            <tr>
                <td><select name="q_form"><option>單選</option><option>多選</option><option>填空</option><option>展示</option></select></td>
            </tr>
            <tr>
                <td>選項1</td>
                <td colspan="3"><input type="text" name="q_1">
                <input type="file" name="q_1_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>   
            <tr>
                <td>選項2</td>
                <td colspan="3"><input type="text" name="q_2">
                <input type="file" name="q_2_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>   
            <tr>
                <td>選項3</td>
                <td colspan="3"><input type="text" name="q_3">
                <input type="file" name="q_3_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>   
            <tr>
                <td>選項4</td>
                <td colspan="3"><input type="text" name="q_4">
                <input type="file" name="q_4_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>   
            <tr id="tr_edit_5" style="display:none">
                <td>選項5</td>
                <td colspan="3"><input type="text" name="q_5">
                <input type="file" name="q_5_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr> 
            <tr id="tr_edit_6" style="display:none">
                <td>選項6</td>
                <td colspan="3"><input type="text" name="q_6">
                <input type="file" name="q_6_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>
            <tr id="tr_edit_7" style="display:none">
                <td>選項7</td>
                <td colspan="3"><input type="text" name="q_7">
                <input type="file" name="q_7_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>
            <tr id="tr_edit_8" style="display:none">
                <td>選項8</td>
                <td colspan="3"><input type="text" name="q_8">
                <input type="file" name="q_8_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>
            <tr id="tr_edit_9" style="display:none">
                <td>選項9</td>
                <td colspan="3"><input type="text" name="q_9">
                <input type="file" name="q_9_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>
            <tr id="tr_edit_10" style="display:none">
                <td>選項10</td>
                <td colspan="3"><input type="text" name="q_10">
                <input type="file" name="q_10_img" accept="image/*" style="width:100%" onchange="checkfile(this)"></td>
            </tr>
            <tr>
                <td><input type="button" value="展開" onclick="show_tr_edit()"></td>
                <td><input type="button" value="隱藏" onclick="hide_tr_edit()"></td>
                <script>
                    var tr_edit_5_style = document.getElementById('tr_edit_5').style;
                    var tr_edit_6_style = document.getElementById('tr_edit_6').style;
                    var tr_edit_7_style = document.getElementById('tr_edit_7').style;
                    var tr_edit_8_style = document.getElementById('tr_edit_8').style;
                    var tr_edit_9_style = document.getElementById('tr_edit_9').style;
                    var tr_edit_10_style = document.getElementById('tr_edit_10').style;
                    function show_tr_edit() {
                        if(tr_edit_5_style.display != 'none') {
                            if(tr_edit_6_style.display != 'none') {
                                if(tr_edit_7_style.display != 'none') {
                                    if(tr_edit_8_style.display != 'none') {
                                        if(tr_edit_9_style.display != 'none') {
                                            if(tr_edit_10_style.display != 'none') {
                                
                                            }
                                            else {tr_edit_10_style.display = 'table-row';}
                                        }
                                        else {tr_edit_9_style.display = 'table-row';}
                                    }
                                    else {tr_edit_8_style.display = 'table-row';}
                                }
                                else {tr_edit_7_style.display = 'table-row';}
                            }
                            else {tr_edit_6_style.display = 'table-row';}
                        }
                        else {tr_edit_5_style.display = 'table-row';}
                    }
                    function hide_tr_edit() {
                        if(tr_edit_10_style.display != 'table-row') {
                            if(tr_edit_9_style.display != 'table-row') {
                                if(tr_edit_8_style.display != 'table-row') {
                                    if(tr_edit_7_style.display != 'table-row') {
                                        if(tr_edit_6_style.display != 'table-row') {
                                            if(tr_edit_5_style.display != 'table-row') {
                                        
                                            }
                                            else {tr_edit_5_style.display = 'none';}
                                        }
                                        else {tr_edit_6_style.display = 'none';}
                                    }
                                    else {tr_edit_7_style.display = 'none';}
                                }
                                else {tr_edit_8_style.display = 'none';}
                            }
                            else {tr_edit_9_style.display = 'none';}
                        }
                        else {tr_edit_10_style.display = 'none';}
                    }
                </script>
            </tr>
            <tr>
                <td style="text-align:center;"><input type="submit" value="確定新增"></td>
            </tr>
        </form>
    </table>
    <script>
    

       

        function confirmBackup() {
            if(confirm("在匯出後，之前的統計結果將會消失，如需以前的結果，請先備份")) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>
    <footer id="footer" class="wrapper alt">
        <div class="inner">
            <form action="project_export.php" method="POST" onsubmit="return confirmBackup()">
                <input type="hidden" name="account" value="<?php echo $account ?>">
                <input type="hidden" name="project_name" value="<?php echo $project_name ?>">
                <input type="submit" value="匯出">
            </form>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $( document ).ready(function() {
            window.location.replace("#newone");
        });
        // $( document ).ready(function() {
        //     $("#ajax_project").submit(function(e) {

        //     var data = {};
        //     var form = $(this);
        //     $(form).serializeArray().forEach(function(item) {
        //         data[item.name] = item.value;
        //     });
        //     var json = JSON.stringify(data);
        //     var url = form.attr('action');

        //     jQuery.ajax({
        //         type: "POST",
        //         url: 'project_ajax.php',
        //         dataType: 'json',
        //         data: form.serialize(), // serializes the form's elements.
        //         success: function(obj, textStatus)
        //         {
        //             alert(obj.result); // show response from the php script.
        //         }
        //         });

        //     e.preventDefault(); // avoid to execute the actual submit of the form.
        //     });
        // });
    </script>

    </body>
</html>