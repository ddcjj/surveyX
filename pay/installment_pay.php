<?php
#! /usr/bin/php -q
require_once ("common.php");

$pdo = new PDO('mysql:host=localhost;
				dbname=surveyx_order;
                charset=utf8','root','password');
$pdo_c = new PDO('mysql:host=localhost;
                dbname=surveyx_creator;
                charset=utf8','root','password');
$sql_c = $pdo_c->prepare('update member_profile set c_rank=1 where account=?');
                
foreach($pdo -> query('select * from orders where mpId="CYC_CITI";') as $row) {
    if((strtotime(date('YmdHis'))-strtotime($row['payDate']))/(60*60*24) > 31) {

        $today = date("Ymd");
        function milliseconds($format = 'u', $utimestamp = null) {
            if (is_null($utimestamp)){
                $utimestamp = microtime(true);
            }
            $timestamp = floor($utimestamp);
            $milliseconds = round(($utimestamp - $timestamp) * 1000000);//改這裡的數值控制毫秒位數
            return $milliseconds;
        }
        // echo milliseconds();
        $ms = milliseconds();
        $orderNum = $today.$ms;

        $data['icpId'] = $row['icpId'];
        $data['icpOrderId'] = $orderNum;
        $data['icpProdId'] = $row['productNo'];
        $data['mpId'] = $row['mpId'];
        $data['memo'] = $row['memo'];
        $data['icpUserId'] = $row['userId'];
        $data['icpProdDesc'] = $row['productName'];
        $data['price'] = $row['price'];
        $data['doAction'] = "authOrderCredit";

        $somp = new Somp();
        $finalAry = $somp->doRequest($method,$data,$apiUrl);
        
        $rtMsg = (string)$finalAry['resultCode'];

        if($rtMsg == "00000") {
            unset($data['doAction']);
            $data['authCode'] = $finalAry['authCode'];
            $data['sonetOrderNoBase'] = $row['sonetOrderNo'];
            $data['icpOrderIdBase'] = $row['orderNo'];
            $data['doAction'] = 'authCycOrder';

            $somp_cyc = new Somp();
            $finalAry_cyc = $somp_cyc->doRequest($method,$data,$apiUrl);
            $rtMsg_cyc = (string)$finalAry_cyc['resultCode'];

            if($rtMsg_cyc == 'ok') {
                if($finalAry_cyc['icpConfirm'] == 'N') {
                    $data_con['icpId'] = $finalAry_cyc['icpId'];
                    $data_con['icpOrderId'] = $finalAry_cyc['icpOrderId'];
                    $data_con['sonetOrderNo'] = $finalAry_cyc['sonetOrderNo'];
                    $data_con['doAction'] = 'confirmOrder';

                    $somp_con = new Somp();
                    $finalAry_con = $somp_con->doRequest($method,$data_con,$apiUrl);
                    $rtMsg_con = (string)$finalAry_con['resultCode'];

                    if($rtMsg_con == '00000') {
                        $sql = $pdo->prepare('update orders set payStatus=?,payDate=? where orderNo=?');
                        if($sql->execute(['定期定額完成', $finalAry_con['confirmDateTime'], $row['orderNo']])) {
                            echo '資料庫更新成功';
                        }
                        else {
                            echo '資料庫更新失敗';
                        }
                    }
                    else 'rtMsg_con = '.$rtMsg_con.'<br>';
                }
                else echo 'finalAry_cyc = '.$finalAry_cyc['icpConfirm'].'<br>';
            }
            else $sql_c->execute([$row['userId']]);

        } else {

            $sql_c->execute([$row['userId']]);

            $data = null;
            $data['resultCode'] = $finalAry['resultCode'];
            $data['resultMesg'] = $finalAry['resultMesg'];
            $actionUrl = "authFail.php";
            $sql_fail = $pdo->prepare('insert into transRecords values(
                                        ?,?,?,?,?)');
            if($sql_fail->execute([$orderNum, $data['mpId'], $data['resultCode'],
                                   $data['resultMesg'], $finalAry['authRelyDateTime']])) {
        
            }


        }

    }

}

?>

<?php



?>

</body>
</html>