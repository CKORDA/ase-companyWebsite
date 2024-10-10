<?php
function readCSV($filePath) {
    $csvData = array_map('str_getcsv', file($filePath));
    $headers = array_shift($csvData);
    $data = [];
    foreach ($csvData as $row) {
        $data[] = array_combine($headers, $row);
    }
    return $data;
}

?>
