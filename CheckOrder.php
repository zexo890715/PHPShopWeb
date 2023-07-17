<!DOCTYPE html>
<html lang="utf-8">
<head>
	<title>Shopping Cart Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</head>
<body>
	<?php
	session_start();
	require "ConnectDB.php";
	?>
	<div class="container">
		<a href="index.php">首頁</a><br>
        <a style="font-size: 150%">訂單有以下商品 :</a>
		<table class="table">
		<th>書名</th>
    	<th>定價</th>
    	<th>購買數量</th>
    	<th>下單日期</th>
    	<th>金額</th>
 		<?php
        $sql="SELECT * FROM 資料庫書籍資料 inner join 訂單 on 資料庫書籍資料.ISBN=訂單.ISBN WHERE 會員ID=".$_SESSION['會員ID']." ORDER BY 下單日期 DESC";
        $result=$conn->query($sql);
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc()){
                echo "<tr>
                <td>".$row["書名"]."</td>
                <td>".$row["定價"]."</td>
                <td>".$row["數量"]."</td>
                <td>".$row["下單日期"]."</td>
                <td>".$row["定價"]*$row["數量"]."</td></tr>";
            }
        }
		$conn->close();
		?>
		</table>
		<a href="shoppingCart.php">返回購物車</a>
	</div>
</body>
</html>
