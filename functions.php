<?php
function readCSV($filename) {
    $csvData = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Read each line of the CSV
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $csvData[] = $data; // Add each row to the array
        }
        fclose($handle); // Close the file after reading
    }
    return $csvData;
}
?>
