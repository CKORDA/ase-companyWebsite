<?php
header('Content-Type: application/json');

$jsonData = file_get_contents('data.json');
echo $jsonData;
?>
