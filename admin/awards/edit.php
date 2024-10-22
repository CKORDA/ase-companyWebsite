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

function updateAwardById($filename, $id, $updatedAward) {
    $rows = [];
    if (($handle = fopen($filename, 'r')) !== false) {
        $header = fgetcsv($handle); 
        $rows[] = $header;
        while (($data = fgetcsv($handle)) !== false) {
            if ($data[0] == $id) {
                $rows[] = [$id, $updatedAward['year'], $updatedAward['title'], $updatedAward['description']];
            } else {
                $rows[] = $data;
            }
        }
        fclose($handle);
    }

    if (($handle = fopen($filename, 'w')) !== false) {
        foreach ($rows as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}

$id = $_GET['id'];
$award = getAwardById('data/awards.csv', $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedAward = [
        'year' => $_POST['year'],
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];
    updateAwardById('data/awards.csv', $id, $updatedAward);
    header('Location: detail.php?id=' . $id);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Award</title>
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
            max-width: 500px;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Award</h1>

        <?php if ($award): ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="year" class="form-control" id="year" value="<?php echo htmlspecialchars($award['year']); ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo htmlspecialchars($award['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="5" required><?php echo htmlspecialchars($award['description']); ?></textarea>
            </div>
            <button type="submit" class="btn-submit">Update Award</button>
        </form>
        <a href="detail.php?id=<?php echo $id; ?>" class="btn-back">Back to Award</a>
        <?php else: ?>
            <p>Award not found!</p>
            <a href="index.php" class="btn-back">Back to List</a>
        <?php endif; ?>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
