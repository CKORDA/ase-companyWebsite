<?php
include_once 'pages.php';

$pageManager = new PageManager();
$page = $pageManager->retrievePage($_GET['index']);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($page['name']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($page['name']); ?></h1>
    <p><?php echo htmlspecialchars($page['description']); ?></p>
    <h2>Applications:</h2>
    <ul>
        <?php foreach ($page['applications'] as $app): ?>
            <li>
                <strong><?php echo htmlspecialchars($app['name']); ?>:</strong> 
                <?php echo htmlspecialchars($app['description']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to List</a>
</body>
</html>
