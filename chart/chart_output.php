<?php
require_once ("jpgraph-4.3.4/jpgraph/jpgraph.php");
require_once ("jpgraph-4.3.4/jpgraph/jpgraph_line.php");

if(isset($_REQUEST['account'])) {
    $account = $_REQUEST['account'];
}
if(isset($_REQUEST['project_name'])) {
    $project_name = $_REQUEST['project_name'];
}
else {
    $project_name = '';
}

$pdo = new PDO('mysql:host=localhost; 
            dbname=surveyx_questionnaire;
            charset=utf8','root','password');
foreach($pdo->query('SELECT column_name FROM information_schema.columns 
    WHERE table_schema = "surveyx_questionnaire" AND table_name = "'.$account.'_'.$project_name.'_q";') as $row) {
    $col_name[] = $row[0];
}

$serverName = "localhost";
$userName = "root";
$password = "password";
$dbname = "surveyx_questionnaire";

$conn = new mysqli($serverName, $userName, $password, $dbname);
if($conn->connect_error) {
    echo "<script>alert('Connection failed : ".$conn->connect_error."');</script>";
    die("Connection failed: " . $conn->connect_error);
}
$sql = 'select count("'.$col_name[0].'") from '.$account.'_q;';
$result = $conn -> query($sql);

$total_q_sum = mysqli_fetch_array($result, MYSQLI_NUM);

$pdo_q = new PDO('mysql:host=localhost; 
                  dbname=surveyx_creator;
                  charset=utf8','root','password');

array_splice($col_name,0,1);

$sql_q = 'select count('.$col_name[0].')';
$i = 1;
$q_no = 1;
foreach($pdo_q->query('select * from question_table where creator_account="'.$account.'";') as $row_q) {
    switch($row_q['q_form']) {
        case '多選':
            for($j=1 ;$j<=10; $j++) {
                if($row_q['q_'.$j] != null) {
                    $sql_q .= ',count(if ('.$col_name[$i].'="on",true,null))';
                    $y_axis_name[] = "question".$q_no."_".$j;
                    $i++;
                }
            } 
            $q_no++;                   
            break;
        case '單選':
            for($j=1 ;$j<=10; $j++) {
                if($row_q['q_'.$j] != null) {
                    $sql_q .= ',count(if ('.$col_name[$i].'="'.$j.'",true,null))';
                    $y_axis_name[] = "question".$q_no."_".$j;
                }
            }
            $i++;
            $q_no++;
            break;
        case '填空':
            $sql_q .= ',count('.$col_name[$i].')';
            $y_axis_name[] = "question".$q_no;
            $i++;
            $q_no++;
            break;
    }
}
$sql_q .= ' from '.$account.'_q;';

$result_q = $conn -> query($sql_q);
$data_q = mysqli_fetch_array($result_q, MYSQLI_NUM);
array_splice($data_q,0,1);

$graph = new Graph(2160,720);
$graph->SetScale("textlin");
$graph->SetShadow();     
$graph->img->SetMargin(60,30,30,70); //設定影象邊距  
   
$graph->graph_theme = null; //設定主題為null，否則value->Show(); 無效  

$lineplot1=new LinePlot($data_q); //建立設定兩條曲線物件  
$lineplot1->value->SetColor("red");  
$lineplot1->value->Show();  
$graph->Add($lineplot1);  //將曲線放置到影象上  
   
$graph->title->Set("統計表");   //設定影象標題  
$graph->xaxis->title->Set("題號"); //設定座標軸名稱  
$graph->yaxis->title->Set("量數");
$graph->title->SetMargin(10);
$graph->xaxis->title->SetMargin(10);
$graph->yaxis->title->SetMargin(15);
   
$graph->title->SetFont(FF_CHINESE); //設定字型
$graph->yaxis->title->SetFont(FF_CHINESE);
$graph->xaxis->title->SetFont(FF_CHINESE);
// $graph->xaxis->SetTickLabels($gDateLocale->GetShortMonth());
$graph->xaxis->SetTickLabels($y_axis_name);
  
$graph->Stroke();  //輸出影象
?>