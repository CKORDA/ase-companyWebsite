<?php
require_once 'AwardManager.php'; // Include the class file

$filename = 'data/awards.csv';
$awardManager = new AwardManager($filename);
$awards = $awardManager->readAwards(); // Use the readAwards method from the AwardManager class
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awards</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
            text-align: center; 
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .btn {
            font-size: 1em;
            border: 1px solid #007bff;
            padding: 5px 10px;
            margin: 2px;
        }

        .create-btn {
            font-size: 1.5em;
            margin-top: 20px;
        }

        table {
            font-size: 1.5em;
            width: 80%;
            max-width: 900px;
            margin: 20px auto;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Awards</h1>
        <table class="table table-bordered table-striped mx-auto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Year</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($awards as $award): ?>
                <tr>
                    <td><?php echo htmlspecialchars($award->id); ?></td>
                    <td><?php echo htmlspecialchars($award->year); ?></td>
                    <td><?php echo htmlspecialchars($award->title); ?></td>
                    <td>
                        <div style="display: flex; justify-content: center;">
                            <a href="detail.php?id=<?php echo $award->id; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="edit.php?id=<?php echo $award->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $award->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mb-4">
            <a href="create.php" class="btn btn-success create-btn">Create New Award</a>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
