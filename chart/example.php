<?php
require_once "surveyx_questionnaire_db.php";

foreach($pdo->query('SELECT column_name FROM information_schema.columns 
    WHERE table_schema = "surveyx_questionnaire" AND table_name = "awake_q";') as $row) {
    $col_name[] = $row[0];
}

print_r($col_name);
echo '<br/>';
$sql_q2 = 'select count('.$col_name[0].')';
for($i=1; $i<=3; $i+=1) {
    $sql_q2 .= ',count(if ('.$col_name[8].'='.$i.',true,null))';
}
$sql_q2 .= ' from awake_q;';
$result_q2 = mysqli_query($con, $sql_q2);
$row_q2 = mysqli_fetch_row($result_q2);
echo json_encode($row_q2);
?>