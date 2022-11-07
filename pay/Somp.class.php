<?php
class Somp {
	/**
	* @param string "post"或是"soap"，決定與API的溝通方式採用HttpPost或是Soap協定
	* @param string 傳輸到API的資料內容，必須要有doAction欄位決定要執行的Function
	* @param string API的路徑
	* @return Array
	*/
	function doRequest($method,$data,$apiUrl){
		switch($method) {
			case "post" :
				/**
				* 用php_curl模組送出Post資料，需要在php.ini中啟用php_curl模組
				*/
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $apiUrl);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($ch, CURLOPT_POST, 1);
				$postfield = "";
				foreach ($data as $k=>$v) {
					$postfield .= "$k=".urlencode($v)."&";
				}
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postfield);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $postfield);
				$strReturn = curl_exec($ch);
				curl_close($ch);

				/**
				* 將回傳的結果處理後以Association Array的方式傳回
				*/
				$finalAry = $this->getResult($strReturn);
				break;
			case "soap" :
				/**
				* 在PHP4之下，需採用NuSoap的Soap Library來呼叫Web Service
				* 由於需要nusoap能夠支援UTF-8，所以必須對NuSoap的原始碼進行部份的修改。
				*/
				require_once("nusoap/nusoap.php");
				$client = new nusoap_client($apiUrl, "wsdl");

				/**
				* 取出陣列中的doAction的鍵值，決定要執行Service的哪一個Function，並把doAction從陣列中移除
				*/
				$doAction = $data["doAction"];
				unset($data["doAction"]);
				
				foreach($data as $key => $val){
					//$$key = $val;
					$stdObj->$key = $val;
				}
				
				$data = null;
				$data['params'] = $stdObj;
				
				/**
				* 呼叫執行Service的Function，並依照Function的種類來取得不同分類的結果
				*/
				$rtClass = $client->call($doAction, $data);

				if ($client->fault) {
					$rtClass = null;
					$rtObj->resultMesg = $client->getError();
				} else {
					if ($client->getError()) {
						$rtClass = null;
						$rtObj->resultMesg = $client->getError();
					} else {
						if($doAction == "authOrder"){
							$rtObj = $rtClass["authOrderResult"];
						}else if($doAction == "confirmOrder"){
							$rtObj = $rtClass["confirmOrderResult"];
						}else{
							$rtClass = null;
							$rtObj = null;
						}
					}
				}

				/**
				* 處理結果後傳回給主程式
				*/
				$finalAry = $this->getResult($rtObj, "soap");
				break;
			default :
				$finalAry = "";
				break;
		}
		return $finalAry;
	}

	function getResult($result,$method = "post"){
		switch ($method){
			case "post" :
				$rtAry = explode("\t",$result);
				$keyAry = explode("|",$rtAry[0]);
				$valueAry = explode("|",$rtAry[1]);
				$finalAry = array();
				for ($i=0; $i<count($keyAry); $i++) {
					$finalAry[$keyAry[$i]] = $valueAry[$i];
				}
				break;
			case "soap" :
				if($result != null){
					foreach($result as $rKey => $rVal){
						$finalAry[$rKey] = $rVal;
					}
				}
				break;
			default :
				$finalAry = null;
				break;
		}
		return $finalAry;
	}

}

?>