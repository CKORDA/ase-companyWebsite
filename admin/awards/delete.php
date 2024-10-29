<?php
require_once 'AwardManager.php'; // Make sure to include the class file

$filename = 'data/awards.csv';
$awardManager = new AwardManager($filename);

if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];
    $awardManager->deleteAward($idToDelete);
    header('Location: index.php'); 
    exit();
} else {
    echo "No ID specified for deletion.";
}
?>
