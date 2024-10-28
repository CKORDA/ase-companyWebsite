<?php

class CSVHelper {
    // Function to read all records from a CSV file
    public static function readCSV($filePath) {
        $rows = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $rows[] = $data;
            }
            fclose($handle);
        }
        return $rows;
    }

    // Function to write a new record to a CSV file
    public static function writeCSV($filePath, $record) {
        $file = fopen($filePath, 'a');
        fputcsv($file, $record);
        fclose($file);
    }

    // Function to update a record in a CSV file
    public static function updateCSV($filePath, $index, $updatedRecord) {
        $rows = self::readCSV($filePath);
        if (isset($rows[$index])) {
            $rows[$index] = $updatedRecord;
            $file = fopen($filePath, 'w');
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        } else {
            throw new Exception("Record not found.");
        }
    }

    // Function to delete a record from a CSV file
    public static function deleteCSV($filePath, $index) {
        $rows = self::readCSV($filePath);
        if (isset($rows[$index])) {
            unset($rows[$index]);
            $file = fopen($filePath, 'w');
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        } else {
            throw new Exception("Record not found.");
        }
    }
}

?>
