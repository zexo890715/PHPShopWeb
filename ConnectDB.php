<?php
    $server = "192.168.0.184";
    $username = "PHPShopWeb";
    $password = "5D7a2v5i8D@5";
    $dbname = "PHPShopWeb";

    $conn = new mysqli($server,$username,$password,$dbname);

    mysqli_query($conn,"SET NAMES 'UTF8'");

    if($conn->connect_error){
        die("連線失敗 : ".$conn->connect_error);
    }else{
        #echo "連線成功";
    }
    #echo "<br>";
?>