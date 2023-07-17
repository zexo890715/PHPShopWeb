<?php
    session_start();
    date_default_timezone_set('Asia/Taipei');
    require "ConnectDB.php";
    if(isset($_SESSION['user_name'])){
        $A1 = $_SESSION['會員ID'];
	    $A4 = date("Y-m-d");
        $sql = "";
        if(isset($_SESSION['Array'])){
            foreach($_SESSION['Array'] as &$v){
                $A2 = $v[0];
                $A3 = $v[1];
                $sql = "INSERT INTO 訂單(會員ID,ISBN,數量,下單日期)
                VALUES('$A1','$A2','$A3','$A4')";
                $result = mysqli_query($conn,$sql);
            }
        }
        
    }
	$conn->close();
    require "LineNotify.php";
?>