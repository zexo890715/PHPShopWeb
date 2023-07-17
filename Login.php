<table>
    <th>ID</th>
    <th>user</th>
    <th>pwd</th>
<?php
    session_start();
    require "ConnectDB.php";
    #$_SESSION['user_name'];
    #$_SESSION['會員ID'];
    $U = $_POST['帳號'];
    $P = $_POST['密碼'];
    #echo "帳號 : ".$U."</br>";
    #echo "密碼 : ".$P."</br>";
	$sql = "";
	$sql = "SELECT * FROM 書籍會員清單 where 帳號 = '$U' AND 密碼 = '$P'";
    echo $sql;
	$result = $conn->query($sql);
	if ($result != false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $_SESSION['user_name'] = $row["會員名稱"];
            $_SESSION['會員ID'] = $row["會員ID"];
		}
	}
    else{
        unset($_SESSION['user_name']);
        unset($_SESSION['會員ID']);
        echo "查無符合帳密的使用者資料"."<br>";
    }
	$conn->close();
    header('Location: index.php');
?>
</table>