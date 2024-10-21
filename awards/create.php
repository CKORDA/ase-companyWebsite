<?php

function getMaxIdFromCSV($filename) {
    $maxId = 0;
    if (($handle = fopen($filename, 'r')) !== false) {
        fgetcsv($handle); // Skip the header row
        while (($data = fgetcsv($handle)) !== false) {
            $currentId = intval($data[0]); 
            if ($currentId > $maxId) {
                $maxId = $currentId; 
            }
        }
        fclose($handle);
    }
    return $maxId;
}

function addAwardToCSV($filename, $newAward) {
    if (($handle = fopen($filename, 'a')) !== false) {
        fputcsv($handle, $newAward);
        fclose($handle);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newId = getMaxIdFromCSV('data/awards.csv') + 1; 
    $newAward = [
        $newId, 
        $_POST['year'], 
        $_POST['title'], 
        $_POST['description'] 
    ];
    addAwardToCSV('data/awards.csv', $newAward);
    header('Location: index.php'); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Award</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 600px; 
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #28a745;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            font-size: 1.1em; 
            height: 45px; 
        }

        #description {
            height: 100px; 
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Award</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" class="form-control" id="year" placeholder="Enter award year" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter award title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="5" placeholder="Enter award description" required></textarea>
            </div>
            <button type="submit" class="btn-submit">Create Award</button>
        </form>
        <a href="index.php" class="btn-back">Back to List</a>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
