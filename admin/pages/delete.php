<?php
include_once 'pages.php';

$pageManager = new PageManager();

if (isset($_GET['index'])) {
    $pageManager->deletePage($_GET['index']);
    header("Location: index.php");
    exit;
}
?>
