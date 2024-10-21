<?php

function deleteAwardFromCSV($filename, $idToDelete) {
    $awards = [];


    if (($handle = fopen($filename, 'r')) !== false) {
        $header = fgetcsv($handle); 
        $awards[] = $header; 
        while (($data = fgetcsv($handle)) !== false) {
            if ($data[0] != $idToDelete) { 
                $awards[] = $data; 
            }
        }
        fclose($handle);
    }

    if (($handle = fopen($filename, 'w')) !== false) {
        foreach ($awards as $award) {
            fputcsv($handle, $award); 
        }
        fclose($handle);
    }
}

if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    deleteAwardFromCSV('data/awards.csv', $idToDelete);
    header('Location: index.php'); 
    exit();
} else {
    echo "No ID specified for deletion.";
}
?>
