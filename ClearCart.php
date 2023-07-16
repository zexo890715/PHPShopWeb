<?php
    session_start();
    unset($_SESSION['Array']);
    header('Location: shoppingCart.php');
?>