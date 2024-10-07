<?php
function readCSV($filename) {
    $csvData = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Read the header row
        $header = fgetcsv($handle);
        
        // Read each line of the CSV and create an associative array
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $csvData[] = array_combine($header, $data); // Combine header with data
        }
        fclose($handle); // Close the file after reading
    }
    return $csvData;
}
?>
