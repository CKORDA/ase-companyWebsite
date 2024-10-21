<?php
function readJSON($filePath) {
    $jsonData = file_get_contents($filePath);
    return json_decode($jsonData, true);
}

?>
