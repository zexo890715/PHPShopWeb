<!DOCTYPE html>
<html lang = "utf-8">
<head>
	<title>Shopping Cart Example</title>
	<meta charset = "utf-8">
	<meta name = "viewport" content="width=device-width,initial-scale=1">
	<link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</head>
<body>
	<?php
	session_start();
	require "ConnectDB.php";
	$sql = "SELECT * FROM 資料庫書籍資料";
	?>
	<div class = "container">
		<a href = "shoppingCart.php">查看購物車</a>
		<div style = "text-align: right;">
			<a style = "font-size: 150%;color:red">當前使用者 :
				<?php
				if(isset($_SESSION['user_name'])){
					echo ($_SESSION['user_name'])."<tr><td><a href = Logout.php>(登出)</a></td></tr>";
				}else{
					echo "未登入<tr><td><a href = LoginPage.php>(登入)</a></td></tr>";
				}
				?>
			</a>
			</br>
		</div>
		<table class = "table">
		<th>書名</th>
    	<th>作者</th>
    	<th>譯者</th>
    	<th>出版社</th>
    	<th>出版日期</th>
    	<th>語言</th>
    	<th>定價</th>
    	<th>ISBN</th>
		<th>加入購物車</th>
 		<?php
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				echo "<tr>
				<td>".$row["書名"]."</td>
				<td>".$row["作者"]."</td>
				<td>".$row["譯者"]."</td>
				<td>".$row["出版社"]."</td>
				<td>".$row["出版日期"]."</td>
				<td>".$row["語言"]."</td>
				<td>".$row["定價"]."</td>
				<td>".$row["ISBN"]."</td>
				<td><a href=add.php?IBSN=".$row["ISBN"].">加入購物車</a></td></tr>";
			}
		}
		$conn->close();
		?>
		</table>
	</div>
</body>
</html>
