<!DOCTYPE html>
<html lang="utf-8">
<head>
	<title>Shopping Cart Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	session_start();
    $sum=0;
	require "ConnectDB.php";
    if(isset($_SESSION['Array']))
    #print_r ($_SESSION['Array']);
	?>
	<div class="container">
		<a href="index.php">首頁</a><br>
        <a style="font-size: 150%">購物車中有以下商品 :</a>
		<table class="table">
		<th>書名</th>
    	<th>定價</th>
    	<th>購買數量</th>
    	<th>合計</th>
 		<?php
        if(isset($_SESSION['Array'])){
            foreach($_SESSION['Array'] as &$v){
                $sql="SELECT 書名,定價 FROM 資料庫書籍資料 WHERE ISBN=".$v[0];
                $result=$conn->query($sql);
                if($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["書名"]."</td>
                    <td>".$row["定價"]."</td>
                    <td>".$v[1]."</td>
                    <td>".$row["定價"]*$v[1]."</td></tr>";
                    $sum+=$row["定價"]*$v[1];
                }
            }
        }
        echo "<tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>".$sum."</b></td></tr>";
		$conn->close();
		?>
		</table>
		<a href="ClearCart.php">清空購物車</a>
		<a href="SendOrder.php">確認送出訂單</a>
		<a href="CheckOrder.php">查看訂單</a>
	</div>
</body>
</html>
