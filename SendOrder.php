<?php
session_start();
date_default_timezone_set('Asia/Taipei');
require "ConnectDB.php";
if (isset($_SESSION['user_name'])) {
    $A1 = $_SESSION['會員ID'];
    $A4 = date("Y-m-d");
    $sql = "";
    if (isset($_SESSION['Array'])) {
        foreach ($_SESSION['Array'] as &$v) {
            $A2 = $v[0];
            $A3 = $v[1];
            $sql = "INSERT INTO 訂單(會員ID,ISBN,數量,下單日期)
                VALUES('$A1','$A2','$A3','$A4')";
            $result = mysqli_query($conn, $sql);

            // 準備要發送的通知訊息資料
            $message = array(
                'message' => "\n收到一個新的訂單:\n" .
                "會員ID: $A1\n" .
                "ISBN: $A2\n" .
                "數量: $A3\n" .
                "下單日期: $A4"
            );

            //設定API的Header
            $headers = array(
                'Content-Type: multipart/form-data',
                'Authorization: Bearer LINENOTIFYAPI'
            );

            // 使用 cURL 來發送 POST 請求
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            echo $response;
            curl_close($ch);

            if ($response === false) {
                echo '發送通知失敗。';
            } else {
                echo '通知已發送。';
            }
        }
    }
}
$conn->close();
require "ClearCart.php";
