<?php

function loadpage ($index){
    $path='DynamicCompanyWebsite/index.html';
    $content=file_get_contents($path);
    echo $content;
}
function readCSV($filename) {
    $data = [];
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}

?>
