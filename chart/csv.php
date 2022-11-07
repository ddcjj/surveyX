<?php
if(isset($_REQUEST['account'])) {
    $account = $_REQUEST['account'];
}
if(isset($_REQUEST['project_name'])) {
    $project_name = $_REQUEST['project_name'];
}

date_default_timezone_set('Asia/Taipei');

$pdo = new PDO('mysql:host=localhost; 
                dbname=surveyx_questionnaire;
                charset=utf8','root','');

foreach($pdo->query('SELECT column_name FROM information_schema.columns 
    WHERE table_schema = "surveyx_questionnaire" AND table_name = "'.$account.'_'.$project_name.'_q";') as $row) {
    $col_name[] = $row[0];
}

$filename = $account."-". $project_name. "-" . date("Y-m-d H-i-s") . ".csv";
header('Pragma: no-cache');
header('Expires: 0');
header('Content-Disposition: attachment;filename="' . $filename . '";');
header('Content-Type: application/csv; charset=UTF-8');
$csv_arr[] = $col_name;

// foreach($pdo->query('select * from '.$account.'_q;') as $row) {
//     $csv_arr[] = array(
//         str_replace(',', '、', $row['id']),
//         str_replace(',', '、', $row['account']),
//         str_replace(',', '、', $row['c_rank']),
//         str_replace(',', '、', $row['createDate']),
//     );
// }

foreach($pdo->query('select * from '.$account.'_'.$project_name.'_q;') as $row) {
    unset($result_arr);
    for($i=0; $i<count($col_name); $i++) {
        $result_arr[] = $row[$i];
    }
    $csv_arr[] = $result_arr;
}

for ($j = 0; $j < count($csv_arr); $j++) {
    if ($j == 0) {
        //輸出 BOM 避免 Excel 讀取時會亂碼
        echo "\xEF\xBB\xBF";
    }
    echo join(',', $csv_arr[$j]) . PHP_EOL;
} 
?>