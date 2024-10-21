<?php
include_once 'pages.php';

$page = retrievePage($_GET['index']);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $page['name']; ?></title>
</head>
<body>
    <h1><?php echo $page['name']; ?></h1>
    <p><?php echo $page['description']; ?></p>
    <ul>
        <?php foreach ($page['applications'] as $app): ?>
            <li><strong><?php echo $app['name']; ?>:</strong> <?php echo $app['description']; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to List</a>
</body>
</html>
