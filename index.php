
<?php
$url = $_POST['url'];
$data = $_POST['data'];
$method = $_POST['method'];
$header = $_POST['header'];
$options = array(
    'http' => array(
        'header'  => $header,
        'method'  => $method,
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
var_dump($result);
?>
