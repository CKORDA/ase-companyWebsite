<?php
// create.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the products from the JSON file
    $productsFile = '../../data/data.json';
    $data = json_decode(file_get_contents($productsFile), true);
    
    // Get the product details from the form
    $newProduct = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'applications' => []  // Add applications if needed
    ];

    // Add the new product to the array
    $data['productsAndServices'][] = $newProduct;

    // Write the updated data back to the JSON file
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
    <title>Create Product</title>
</head>
<body>
    <h1>Create New Product</h1>
    <form method="POST" action="">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>
        
        <!-- You can add fields for applications if necessary -->
        
        <button type="submit">Create Product</button>
    </form>
    
    <a href="index.php">Back to List</a>
</body>
</html>
