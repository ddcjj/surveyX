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
    $project_name = '';
}

$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=surveyx_creator;charset=utf8','root',$password);

foreach($pdo -> query('select project_title, bgImgName, bg_type, logoImgName, ga_head, ga_body, fb_code
                     from project_table where 
                     project_account="'.htmlspecialchars($account).'" and 
                     project_name="'.htmlspecialchars($project_name).'";') as $row) {
    $project_title = $row['project_title'];
    $bgImgName = $row['bgImgName'];
    $bg_type = $row['bg_type'];
    $logoImgName = $row['logoImgName'];
    $ga_head = $row['ga_head'];
    $ga_body = $row['ga_body'];
    $fb_code = $row['fb_code'];
}
switch($bg_type) {
    case 'bg_fix':
        $bg_attachment = 'fixed';
        break;
    case 'bg_slide':
        $bg_attachment = '';
        break;
}
$filename = 'survey/'.$account.'/'.$project_name.'.php';
$fp = fopen($filename, 'w');
$question_content = 
"<?php 
    \$pdo = new PDO('mysql:host=localhost;dbname=surveyx_creator;charset=utf8','root','".$password."');
    foreach(\$pdo->query('select c_rank from member_profile where account=\"$account\";') as \$row) {
        \$rank = \$row['c_rank'];
    }
    if(\$rank == 2) {
    
    }
    else if(\$rank == 1 && isset(\$_SESSION['account'])) {
        echo '<script>alert(\"畫面預覽\");</script>';
    }
    else {
        echo '<script>alert(\"未開通\");</script>';
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../../index.html>';
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    ".$ga_head."
    <title>".$project_title."</title>
    <meta charset='utf-8'/>\n<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'/>
<link rel='stylesheet' href='../assets/css/main.css' />
    ".$fb_code."
</head>
<body class='landing is-preload'>
<div id=\"page-wrapper\" style=\"background: url('images/$bgImgName');background-position:center;background-attachment: $bg_attachment;\">
    <section id='banner'>
        <img src='images/".$logoImgName."' width='100%'>
        <ul class='actions special'>
            <li><a href='#main' class='button primary'>START</a></li>
        </ul>
    </section>
    <section id=\"main\" class=\"container\">\n
        <form action='output_".$project_name.".php' method='POST'>";



$filename_output = 'survey/'.$account.'/output_'.$project_name.'.php';
$question_output = "
<!DOCTYPE HTML>
<html>
<head>
".$ga_head."
<title>".$project_title."</title>
<meta charset='utf-8'/>\n<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'/>
<link rel='stylesheet' href='../assets/css/main.css' />
".$fb_code."
</head>
<body class='landing is-preload'>
<?php\n";

// $"."val = mysql_query('select 1 from 'table_name' LIMIT 1');

// if($"."val !== FALSE)
// {
//    //DO SOMETHING! IT EXISTS!
// }
// else
// {
//     //I can't find it...
// }\n";


$i = 0; //計算有幾大題
$count = 0; //計算有幾小題
$db_question = 'id int auto_increment primary key, createDate datetime';
$db_statistics_question = 'date("YmdHis")';
foreach($pdo -> query('select * from question_table where creator_account="'.htmlspecialchars($account).'" 
                        and project_name="'.htmlspecialchars($project_name).'";') as $row) {
    $i += 1;
    $total_num = $row['count(*)'];

    switch($row['q_form']) {
        case '單選':
            $option_type = 'single';
            break;
        case '多選':
            $option_type = 'multiple';
            break;
        case '填空':
            $option_type = '" style="display:none';
            break;
        case '展示':
            $option_type = '" style="display:none';
            break;
    }

    $question_content = $question_content.
    "\n".'<section class="box special" id="question_'.$i.'">
        <header class="major">';
    
    switch($row['q_form']) {
        case '單選':
            $type_name = 'radio';
            $db_question .= ', question'.$i.' varchar(5)';
            $db_statistics_question .= ', $question'.$i;
            $count += 1;

            $question_content .= 
            '<h2 class="css_h2">'.$row['q_title'].'('.$i.'/'.$total_num.')
                <br>
                <span class="css_cover_'.$option_type.'">'.$row['q_form'].'</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower">';

            //單選input範圍 start
            for($j=1; $j<=10; $j++) {
                if($row['q_'.$j] != '') {
                    $question_content = $question_content.
                    "\n".'<input type="'.$type_name.'" id="question'.$i.'_'.$j.'" name="question'.$i.'" value="'.$j.'">
                    <label for="question'.$i.'_'.$j.'">'.$row['q_'.$j].'</label>';  
                    // if(file_exists('C:/xampp/htdocs/hyperspace/survey/'.$account.'/images/q_'.$i.'_'.$j.'.jpg')) { //Windows
                    if(file_exists('/var/www/html/survey/'.$account.'/images/'.$project_name.'_'.$i.'_'.$j.'.jpg')) { //Linux
                        $question_content .= '<label for="question'.$i.'_'.$j.'"><img src="images/'.$project_name.'_'.$i.'_'.$j.'.jpg" width="180px" height="auto"></label>';
                    }
                }
                
            }
            //單選input範圍 end

            $question_output .= '
            if(isset($_REQUEST["question'.$i.'"])) {
                $question'.$i.' = $_REQUEST["question'.$i.'"];
            } else { $question'.$i.' = ""; }';

            break;
        case '填空':
            $type_name = 'text';
            $db_question .= ', question'.$i.' varchar(100)';
            $db_statistics_question .= ', $question'.$i;
            $count += 1;

            $question_content .= 
            '<h2 class="css_h2">'.$row['q_title'].'('.$i.'/'.$total_num.')
                <br>
                <span class="css_cover_'.$option_type.'">'.$row['q_form'].'</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower">';

            $question_content = $question_content.
                    '<div class="col-12">
                    <input type="'.$type_name.'" id="question'.$i.'" name="question'.$i.'">';
                    if(file_exists('C:/xampp/htdocs/hyperspace/survey/'.$account.'/images/q_'.$i.'_'.$j.'.jpg')) { //Windows
                    // if(file_exists('/var/www/html/survey/'.$account.'/images/'.$project_name.'_'.$i.'_1.jpg')) { //Linux
                        $question_content .= '<label for="question'.$i.'"><img src="images/'.$project_name.'_'.$i.'_1.jpg" width="180px" height="auto"></label>';
                    }
                    $question_content .= '</div>';

            $question_output .= '
            if(isset($_REQUEST["question'.$i.'"])) {
                $question'.$i.' = $_REQUEST["question'.$i.'"];
            } else { $question'.$i.' = ""; }';

            break;
        case '展示':
            $question_content .= '<section><div>'."\n";
            if(file_exists('C:/xampp/htdocs/hyperspace/survey/'.$account.'/images/q_'.$i.'_'.$j.'.jpg')) { //Windows
            // if(file_exists('/var/www/html/survey/'.$account.'/images/'.$project_name.'_'.$i.'_1.jpg')) {
                $question_content .= 
                    '<img src="images/'.$project_name.'_'.$i.'_1.jpg" class="css_image"/>';
            }
            $question_content .= 
            '<h3>'.$row['q_title'].'
            </h3>';
                
            break;

        case '多選':
            $type_name = 'checkbox';

            $question_content .= 
            '<h2 class="css_h2">'.$row['q_title'].'('.$i.'/'.$total_num.')
                <br>
                <span class="css_cover_'.$option_type.'">'.$row['q_form'].'</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower">';

            for($k=1; $k<=10; $k++) {
                if($row['q_'.$k] != '') {
                    $db_question .= ', question'.$i.'_'.$k.' varchar(5)';
                    $db_statistics_question .= ', $question'.$i.'_'.$k;
                    $count += 1;

                    //多選input範圍
                    $question_content = $question_content.
                    '<input type="'.$type_name.'" id="question'.$i.'_'.$k.'" name="question'.$i.'_'.$k.'">
                    <label for="question'.$i.'_'.$k.'">'.$row['q_'.$k].'</label>';
                    if(file_exists('C:/xampp/htdocs/hyperspace/survey/'.$account.'/images/q_'.$i.'_'.$j.'.jpg')) { //Windows
                    // if(file_exists('/var/www/html/survey/'.$account.'/images/'.$project_name.'_'.$i.'_'.$j.'.jpg')) { //Linux
                        $question_content .= '<label for="question'.$i.'_'.$j.'"><img src="images/'.$project_name.'_'.$i.'_'.$j.'.jpg" width="180px" height="auto"></label>';
                    }

                    $question_output .= '
                    if(isset($_REQUEST["question'.$i.'_'.$k.'"])) {
                        $question'.$i.'_'.$k.' = $_REQUEST["question'.$i.'_'.$k.'"];
                    } else { $question'.$i.'_'.$k.' = ""; }'."\n";
                }
            }

            break;
    }
    
                
                $question_content = $question_content.
                "\n".'</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_'.($i+1).'" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>';
}

$question_content_end = "\n<section class='box special' id='question_".($i+1)."'>
                            <header class='major'>
                                <ul class='actions special'>
                                    <input type='submit' name='submit' class='button submit'>
                                </ul>
                            </header>
                        </section>\n</form>\n</section>\n</div>
                        \n<script src='../assets/js/jquery.min.js'></script>
                        <script src='../assets/js/jquery.dropotron.min.js'></script>
                        <script src='../assets/js/jquery.scrollex.min.js'></script>
                        <script src='../assets/js/browser.min.js'></script>
                        <script src='../assets/js/breakpoints.min.js'></script>
                        <script src='../assets/js/util.js'></script>
                        <script src='../assets/js/main.js'></script>
                        \n</body>\n</html>";
$question_content = $question_content.$question_content_end;

fwrite($fp, $question_content);
fclose($fp);

$q_mark_No = '';
for($j=0; $j<$count; $j++) {
    $q_mark_No .= ', ?';
}

$question_output .= "
    \$pdo_q = new PDO('mysql:host=localhost; 
    dbname=surveyx_questionnaire; 
    charset=utf8','root','".$password."');
    date_default_timezone_set('Asia/Taipei');
    \n\$sql_q = \$pdo_q->prepare('insert into ".$account."_".$project_name."_q values(null ,? ".$q_mark_No.")');
    if(\$sql_q->execute([".$db_statistics_question."])){

    }?>\n</div>
    <div id=\"page-wrapper\" style=\"background: url('images/$bgImgName');\">
			<!-- Banner -->
            <section class=\"css_div\">
				<img src=\"images/".$logoImgName."\" width=\"100%\">
			</section>
			<!-- Main -->
				<section id=\"main\" class=\"container\">

					<section class=\"box special\">
						<header class=\"major\">
							<h2 class=\"css_h2\">感謝您撥空填寫問卷！
								<br/>
								歡迎點選下⽅加好友
								<br/>
								獲得第一手資訊！
							</h2>
							<div>
								<ul class=\"box\">
									<li><a href=\"$ga_body\" class=\"button primary\">加好友</a></li>
								</ul>
							</div>
						</header>
					</section>

				</section>
		</div>

    <!-- Scripts -->
        <script src=\"../assets/js/jquery.min.js\"></script>
        <script src=\"../assets/js/jquery.dropotron.min.js\"></script>
        <script src=\"../assets/js/jquery.scrollex.min.js\"></script>
        <script src=\"../assets/js/browser.min.js\"></script>
        <script src=\"../assets/js/breakpoints.min.js\"></script>
        <script src=\"../assets/js/util.js\"></script>
        <script src=\"../assets/js/main.js\"></script>
</body>
</html>";
    //last_edit
$fp_output = fopen($filename_output, 'w');
fwrite($fp_output, $question_output);
fclose($fp_output);

$serverName = "localhost";
$userName= "root";
$password_db = $password;
$dbname = "surveyx_questionnaire";

$conn = new mysqli($serverName, $userName, $password_db, $dbname);
if ($conn->connect_error) {
    echo "<script>alert('Connection failed : ".$conn->connect_error."');</script>";
    die("Connection failed: " . $conn->connect_error);
}
$sql_d = "drop table if exists surveyx_questionnaire.".$account."_".$project_name."_q;\n";
if($conn->query($sql_d) === TRUE) {
    
}
$sql = "create table ".htmlspecialchars($account)."_".$project_name."_q (
    ".$db_question."
);";

if($conn->query($sql) === TRUE) {
    echo "<script>alert('create table success');</script>";
}
else {
    echo "<script>alert('create table failed".$conn->error."');</script>";
}
$conn->close();

?>



<iframe src="<?php echo $filename; ?> " width="900px" height="600px">

</iframe>

    </body>
</html> 