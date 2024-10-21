<?php
include_once 'pages.php';

if (isset($_GET['index'])) {
    deletePage($_GET['index']);
    header("Location: index.php");
    exit;
}
?>
