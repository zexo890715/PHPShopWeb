<?php
    $headers = array(
        'Content-Type: multipart/form-data',
        'Authorization: Bearer C6X0ETd0qeakCGvc5RsRVZc4z57VuGPLxlXy4bpRRIk'
    );
    $message = array(
        'message' => 'Hello'
    );
    $ch = curl_init();
    curl_setopt($ch , CURLOPT_URL , "https://notify-api.line.me/api/notify");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
    $result = curl_exec($ch);
    curl_close($ch);
    require "ClearCart.php";
?>