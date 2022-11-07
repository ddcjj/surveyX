一、程式功能說明：

1.choosePayment.php：選擇付款方式的起始頁面

2.confirmPayment.php：確認送出authOrder的訂單資料，得到authCode，再POST到So-net MMP條款頁

3.authSuccess.php：訂單成功，得到resultCode=ok後，再Request MMP的付款驗證流程

4.authFail.php：訂單失敗

5.authCancel.php：訂單取消

6.common.php:設定檔

二、關於訂單回傳URL
目前把測訂環境的商家交易回傳URL，設定在choosePayment.php的returnUrl參數中
商家可自訂交易回傳的URL，由returnUrl這個參數值來決定