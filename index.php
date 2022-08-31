<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: *');

$url = $_GET["url"];
$params = "?" . $_SERVER["QUERY_STRING"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url . $params);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set request method to POST
    curl_setopt($ch, CURLOPT_POST, 1);
    // Set query data here with CURLOPT_POSTFIELDS
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
}
$content = trim(curl_exec($ch));
curl_close($ch);
print $content;
?>
