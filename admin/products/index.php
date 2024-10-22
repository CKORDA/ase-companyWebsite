<?php
// index.php

// Read the products from the JSON file
$productsFile = '../../data/data.json';
$data = json_decode(file_get_contents($productsFile), true);

// Check if the decoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error decoding JSON: ' . json_last_error_msg();
    exit;
}

// Check if productsAndServices key exists and is an array
if (!isset($data['productsAndServices']) || !is_array($data['productsAndServices'])) {
    echo 'Invalid data format in JSON file.';
    exit;
}

$products = $data['productsAndServices'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            margin: 0 5px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #2196F3;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .btn-create {
            background-color: #4CAF50;
            margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Products and Services</h1>

    <a href="create.php" class="btn btn-create">Create New Product</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td>
                        <a href="detail.php?id=<?php echo urlencode($product['name']); ?>" class="btn">Details</a>
                        <a href="edit.php?id=<?php echo urlencode($product['name']); ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?php echo urlencode($product['name']); ?>" class="btn btn-delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
