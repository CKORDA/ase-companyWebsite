<?php
function getAwardById($filename, $id) {
    if (($handle = fopen($filename, 'r')) !== false) {
        fgetcsv($handle); 
        while (($data = fgetcsv($handle)) !== false) {
            if ($data[0] == $id) {
                fclose($handle);
                return [
                    'id' => $data[0],
                    'year' => $data[1],    
                    'title' => $data[2],    
                    'description' => $data[3]  
                ];
            }
        }
        fclose($handle);
    }
    return null;
}

$id = $_GET['id'];
$award = getAwardById('data/awards.csv', $id);
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
            <h1><?php echo htmlspecialchars($award['title']); ?></h1>
            <p class="year"><strong>Year:</strong> <?php echo htmlspecialchars($award['year']); ?></p>
            <p><?php echo nl2br(htmlspecialchars($award['description'])); ?></p>
            <a href="index.php" class="btn-back">Back to List</a>
        <?php else: ?>
            <p class="not-found">Award not found!</p>
            <a href="index.php" class="btn-back">Back to List</a>
        <?php endif; ?>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
