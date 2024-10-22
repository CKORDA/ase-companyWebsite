<?php
// detail.php

// Read the products from the JSON file
$productsFile = '../../data/data.json';
$data = json_decode(file_get_contents($productsFile), true);
$products = $data['productsAndServices'];

// Get the product ID from the URL (in this case, we use the product name as ID)
$productName = $_GET['id'];

// Find the product by name
$product = null;
foreach ($products as $item) {
    if ($item['name'] === $productName) {
        $product = $item;
        break;
    }
}

if ($product === null) {
    echo "Product not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - <?php echo $product['name']; ?></title>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
    
    <h3>Applications:</h3>
    <ul>
        <?php foreach ($product['applications'] as $application) : ?>
            <li><?php echo $application['name'] . ": " . $application['description']; ?></li>
        <?php endforeach; ?>
    </ul>
    
    <a href="index.php">Back to List</a>
</body>
</html>
