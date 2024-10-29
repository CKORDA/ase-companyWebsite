<?php
require_once 'AwardManager.php'; // Include the class file

$filename = 'data/awards.csv';
$awardManager = new AwardManager($filename);

$id = $_GET['id'] ?? null; // Get the ID from the query parameter
$award = null;

if ($id) {
    $award = $awardManager->getAwardById($id); // Fetch the award by ID
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Award Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #007bff;
        }

        .year {
            font-size: 1.5em;
            color: #6c757d;
            margin-bottom: 30px;
        }

        p {
            font-size: 1.2em;
            color: #343a40;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .btn-back {
            font-size: 1.2em;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        .not-found {
            font-size: 1.5em;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($award): ?>
            <h1><?php echo htmlspecialchars($award->title); ?></h1>
            <p class="year"><strong>Year:</strong> <?php echo htmlspecialchars($award->year); ?></p>
            <p><?php echo nl2br(htmlspecialchars($award->description)); ?></p>
            <a href="index.php" class="btn-back">Back to List</a>
        <?php else: ?>
            <p class="not-found">Award not found!</p>
            <a href="index.php" class="btn-back">Back to List</a>
        <?php endif; ?>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
