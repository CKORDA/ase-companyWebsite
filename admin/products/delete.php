<?php
// delete.php

// Read the products from the JSON file
$productsFile = '../../data/data.json';
$data = json_decode(file_get_contents($productsFile), true);
$products = $data['productsAndServices'];

// Get the product ID (name) from the URL
$productName = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Find the product by name and remove it
    foreach ($products as $index => $item) {
        if ($item['name'] === $productName) {
            unset($products[$index]);
            break;
        }
    }

    // Reindex the array and update the JSON file
    $data['productsAndServices'] = array_values($products);
    file_put_contents($productsFile, json_encode($data, JSON_PRETTY_PRINT));

    // Redirect to the index page
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product - <?php echo $productName; ?></title>
</head>
<body>
    <h1>Delete Product - <?php echo $productName; ?></h1>
    <p>Are you sure you want to delete this product?</p>
    
    <form method="POST" action="">
        <button type="submit">Yes, Delete</button>
        <a href="index.php">No, Go Back</a>
    </form>
</body>
</html>
