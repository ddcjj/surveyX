<?php
require_once('surveyx_db.php');
header('Content-Type: application/json');

$checkResult = array();

$question = isset($_POST['question'])?1:0;
$digital = isset($_POST['digital'])?1:0;
$web = isset($_POST['web'])?1:0;
$app = isset($_POST['app'])?1:0;

$sql = $pdo -> prepare('insert into customer values(
    null,
    ?,?,?,?,?,?,
    ?,?,?,?,
    ?
);');
if($sql -> execute([$_POST['name'], $_POST['company'], $_POST['email'], $_POST['tel'],
    $_POST['lf'], $_POST['time'], 
    $question, $digital, $web, $app,
    date("YmdHis")])) 
    $checkResult['result'] = true;
else $checkResult['result'] = false;

echo json_encode($checkResult);
?>