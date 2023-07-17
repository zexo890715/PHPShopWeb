<?php
    session_start();
    require "ConnectDB.php";
    $arr=array(array($_GET["IBSN"],1));
    $c=0;
    if(isset($_SESSION['Array'])){
        foreach($_SESSION['Array'] as &$v){
            if($v[0]==$_GET["IBSN"]){
                $v[1]++;
                $c=1;
                break;
            }
        }
        if($c==0){
            array_push($_SESSION['Array'],array($_GET["IBSN"],1));
        }
    }
    else{
        $_SESSION['Array']=$arr;
    }
    print_r ($_SESSION['Array']);
    #unset($_SESSION['Array']);
	$conn->close();
    #header('Location: shoppingCart.php');
?>